<?php

namespace App\Helpers;

class PlatformsHelper
{

    private array $params = [
        'Xbox' => 'fa-xbox',
        'PlayStation' => 'fa-playstation',
        'PS' => 'fa-playstation',
        'PSP' => 'fa-playstation',
        'PC' => 'fa-steam',
        'Nintendo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Micrologo_Nintendo.svg/130px-Micrologo_Nintendo.svg.png?20110827055529',
        'Wii' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Micrologo_Nintendo.svg/130px-Micrologo_Nintendo.svg.png?20110827055529',
        'Linux' => 'fa-linux',
        'Android' => 'fa-android',
        'iOS' => 'fa-apple',
        'macOS' => 'fa-apple',
        'Classic' => 'fa-apple',
        'na' => 'fa-ban',
        'Web' => 'fa-globe',
        'GameCube' => '',
        'Genesis' => '',
        'Game' => '',
        'SNES' => '',
    ];

    public function printPlatforms($platforms)
    {
        $platformsIcon = array();
        foreach ($platforms as $platform) {
                $platformName = explode(' ', trim(data_get($platform, 'platform.name')));
                if (array_key_exists($platformName[0], $this->params)){
                    $platformsIcon[$platformName[0]] = $this->params[$platformName[0]];
                } else {
                    $platformsIcon['na'] = $this->params['na'];
                }
        }

        return array_unique($platformsIcon);
    }
}
