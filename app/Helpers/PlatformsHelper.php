<?php

namespace App\Helpers;

class PlatformsHelper
{

    private array $params = [
        'Xbox' => '<i class="fa-brands fa-xbox" style="color: white"></i>',
        'PlayStation' => '<i class="fa-brands fa-playstation" style="color: white"></i>',
        'PS' => '<i class="fa-brands fa-playstation"  style="color: white"></i>',
        'PSP' => '<i class="fa-brands fa-playstation" style="color: white"></i>',
        'PC' => '<i class="fa-brands fa-steam" style="color: white"></i>',
        'Nintendo' => '<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Micrologo_Nintendo.svg/130px-Micrologo_Nintendo.svg.png?20110827055529"
                        class="w-full h-full object-center">',
        'Wii' => '<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Micrologo_Nintendo.svg/130px-Micrologo_Nintendo.svg.png?20110827055529"
                        class="w-full h-full object-center">',
        'Linux' => '<i class="fa-brands fa-linux" style="color: white"></i>',
        'Android' => '<i class="fa-brands fa-android" style="color: white"></i>',
        'iOS' => '<i class="fa-brands fa-apple" style="color: white"></i>',
        'macOS' => '<i class="fa-brands fa-apple" style="color: white"></i>',
        'Classic' => '<i class="fa-brands fa-apple" style="color: white"></i>',
        'na' => '<i class="fas fa-ban" style="color: white"></i>',
        'Web' => '<i class="fa-solid fa-globe" style="color: white"></i>',
        'Neo' => '',
        'Dreamcast' => '',
        'SNES' => '',
        'GameCube' => '',
        'SEGA' => '',
        'Game' => '',
        'Commodore' => '',
        'Atari' => '',
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
