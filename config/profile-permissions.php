<?php

use App\Enums\UserRolesEnum;

return [
    UserRolesEnum::ADMIN => [
        'users' => [
            'index', 'create', 'store', 'edit', 'update', 'show', 'destroy'
        ],
    ]
];