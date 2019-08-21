<?php

use App\Enums\UserRolesEnum;

return [
    UserRolesEnum::ADMIN => [
        'users' => [
            'admin',
            'client',
        ],
    ],

    UserRolesEnum::CLIENT => [
        'users' => [
            'admin',
            'client',
        ],
    ]
];