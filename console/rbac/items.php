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
    ],
    'admin' => [
        'type' => 1,
    ],
    'superadmin' => [
        'type' => 1,
        'children' => [
            'admin',
        ],
    ],
];
