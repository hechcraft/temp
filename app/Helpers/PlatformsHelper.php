<?php

namespace App\Helpers;

use App\Games\RawgPlatformDTO;
use Illuminate\Support\Collection;

class PlatformsHelper
{
    /**
     * @var array|string[]
     */
    private array $params = [
        'Xbox' => 'fa-brands fa-xbox',
        'PlayStation' => 'fa-brands fa-playstation',
        'PS' => 'fa-brands fa-playstation',
        'PSP' => 'fa-brands fa-playstation',
        'PC' => 'fa-brands fa-steam',
        'Nintendo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Micrologo_Nintendo.svg/130px-Micrologo_Nintendo.svg.png?20110827055529',
        'Wii' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Micrologo_Nintendo.svg/130px-Micrologo_Nintendo.svg.png?20110827055529',
        'Linux' => 'fa-brands fa-linux',
        'Android' => 'fa-brands fa-android',
        'iOS' => 'fa-brands fa-apple',
        'macOS' => 'fa-brands fa-apple',
        'Classic' => 'fa-brands fa-apple',
        'na' => 'fa-solid fa-ban',
        'Web' => 'fa-solid fa-globe',
        'GameCube' => '',
        'Genesis' => '',
        'Game' => '',
        'SNES' => '',
    ];

    /**
     * @param Collection<RawgPlatformDTO> $platforms
     * @return array|string[]
     */
    public function printPlatforms(Collection $platforms): array
    {
        $platformsIcon = array();
        foreach ($platforms as $platform) {
            $platformName = explode(' ', trim($platform->name));
            if (array_key_exists($platformName[0], $this->params)) {
                $platformsIcon[$platformName[0]] = $this->params[$platformName[0]];
            } else {
                $platformsIcon['na'] = $this->params['na'];
            }
        }

        return array_unique($platformsIcon);
    }
}
