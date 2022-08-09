<?php

namespace App\Helpers;

class PlatformsHelper
{

    private array $params = [
        'Xbox' => '<i class="fa-brands fa-xbox"></i>',
        'PlayStation' => '<i class="fa-brands fa-playstation"></i>',
        'PS' => '<i class="fa-brands fa-playstation"></i>',
        'PSP' => '<i class="fa-brands fa-playstation"></i>',
        'PC' => '<i class="fa-brands fa-steam"></i>',
        'Nintendo' => '<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Micrologo_Nintendo.svg/130px-Micrologo_Nintendo.svg.png?20110827055529"
                        class="w-full h-full object-center" style="filter: grayscale(100%);">',
        'Wii' => '<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Micrologo_Nintendo.svg/130px-Micrologo_Nintendo.svg.png?20110827055529"
                        class="w-full h-full object-center" style="filter: grayscale(100%);">',
        'Linux' => '<i class="fa-brands fa-linux"></i>',
        'Android' => '<i class="fa-brands fa-android"></i>',
        'iOS' => '<i class="fa-brands fa-apple"></i>',
        'macOS' => '<i class="fa-brands fa-apple"></i>',
        'Classic' => '<i class="fa-brands fa-apple"></i>',
        'na' => '<i class="fas fa-ban"></i>',
        'Web' => '<i class="fa-solid fa-globe"></i>',
        'Neo' => '',
        'Dreamcast' => '',
        'SNES' => '',
        'GameCube' => '',
        'SEGA' => '',
    ];

    public function printPlatforms($platforms)
    {
        if (is_null($platforms)) {
            return $this->params['na'];
        }

        $platformsIcon = array();
        foreach ($platforms as $platform) {
            foreach ($platform as $item) {
                $platformName = explode(' ', trim(data_get($item, 'name')));
                array_push($platformsIcon, $this->params[$platformName[0]]);
            }
        }

        return array_unique($platformsIcon);
    }
}
