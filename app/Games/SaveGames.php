<?php

namespace App\Games;

use App\Games\Attributes\SaveGenres;
use App\Games\Attributes\SavePlatforms;
use App\Games\Attributes\SaveStores;
use App\Helpers\Services\GameService;
use App\Models\Game;
use App\Models\Images;
use Illuminate\Support\Collection;
use Nette\Utils\Image;

class SaveGames
{
    public function __construct(
        private GameService   $gameHelpers,
        private SaveGenres    $saveGenres,
        private SavePlatforms $savePlatforms,
        private SaveStores    $saveStores,
        private SaveImages    $saveImages,
        private RawgAPI       $rawgAPI,
    )
    {
    }

    /**
     * @param RawgGame $rawgGame
     * @param Collection<RawgGameScreenshot> $gameScreenshots
     * @param Collection<RawgStoreDTO> $storeLinks
     * @return Game
     */
    public function storeGames(RawgGame   $rawgGame, Collection $gameScreenshots,
                               Collection $storeLinks): Game
    {
        $game = Game::create([
            'slug' => $rawgGame->slug,
            'name' => $rawgGame->name,
            'released' => $rawgGame->released,
            'rawg_id' => $rawgGame->rawgId,
        ]);

        $game->save();

        $this->saveImages->saveScreenshots($gameScreenshots, $rawgGame->backgroundImage, $game->id);
        $this->savePlatforms->store($rawgGame, $game->id);
        $this->saveGenres->store($rawgGame, $game->id);
        $this->saveStores->store($storeLinks, $game->id);

        return $game;
    }

    public function updateGames(RawgGame $rawgGame): Game
    {
        $game = $this->gameHelpers->gameByRawgId($rawgGame->rawgId);

        $game->slug = $rawgGame->slug;
        $game->name = $rawgGame->name;
        $game->released = $rawgGame->released;
        $game->rawg_id = $rawgGame->rawgId;
        $game->save();

        return $game;
    }

    public function storeNewGame(int $rawgId): Game
    {
        return $this->storeGames(
            $this->rawgAPI->gameSearchById($rawgId),
            $this->rawgAPI->getGameAtrributes($rawgId, GameAttributes::Screenshots),
            $this->rawgAPI->getGameAtrributes($rawgId, GameAttributes::Stores)
        );
    }
}
