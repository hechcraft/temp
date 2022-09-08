<?php

namespace Games\Attributes;

use App\Games\Attributes\SavePlatforms;
use App\Games\RawgPlatformDTO;
use Tests\Feature\FeatureTestCase;
use Tests\TestCase;

class SavePlatformTest extends FeatureTestCase
{
    public function test_save_platforms()
    {
        $savePlatforms = app(SavePlatforms::class);

        $platforms = collect([
            new RawgPlatformDTO(7, 'Nintendo Switch', 'nintendo-switch', 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Micrologo_Nintendo.svg/130px-Micrologo_Nintendo.svg.png?20110827055529'),
            new RawgPlatformDTO(186, 'Xbox Series S/X', 'xbox-series-x', 'fa-brands fa-xbox'),
        ]);

        $savePlatforms->store($platforms, 10);

        $this->assertDatabaseHas('game_platforms', [
            'game_id' => 10,
            'platform_id' => 7,
        ]);

        $this->assertDatabaseHas('game_platforms', [
            'game_id' => 10,
            'platform_id' => 186,
        ]);
    }
}
