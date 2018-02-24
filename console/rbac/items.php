<?php
return [
    'createPost' => [
        'type' => 2,
    ],
    'updatePost' => [
        'type' => 2,
    ],
    'deletePost' => [
        'type' => 2,
    ],
    'customer' => [
        'type' => 1,
        'ruleName' => 'userGroup',
    ],
    'admin' => [
        'type' => 1,
        'ruleName' => 'userGroup',
        'children' => [
            'customer',
        ],
    ],
    'superadmin' => [
        'type' => 1,
        'ruleName' => 'userGroup',
        'children' => [
            'admin',
            'customer',
        ],
    ],
];
