<?php

namespace App\Constants;

class UploadPaths
{
    public const PATHS = [
        'SITE_LOGO' => [
            'path' => 'uploads/settings/logo',
            'prefix' => 'logo'
        ],
        'SITE_FAVICON' => [
            'path' => 'uploads/settings/favicon',
            'prefix' => 'favicon'
        ],
        'DEFAULT_IMAGE' => [
            'path' => 'uploads/settings/default',
            'prefix' => 'default'
        ],
        'DESTINATION_IMAGE' => [
            'path' => 'uploads/destinations/images',
            'prefix' => 'image'
        ],
    ];
}
