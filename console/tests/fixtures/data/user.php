<?php

return [
    'user1' => [
        'no' => 'USR0000000000001',
        'username' => 'SuperAdmin',
        'auth_key' => \Yii::$app->getSecurity()->generateRandomKey(),
        'password_hash' => \Yii::$app->getSecurity()->generatePasswordHash('superadmin@cakeaway.id'),
        'email' => 'superadmin@cakeaway.id',
        'role' => 1,
        'status' => 11,
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
    ],
    'user2' => [
        'no' => 'USR0000000000002',
        'username' => 'Admin',
        'auth_key' => \Yii::$app->getSecurity()->generateRandomKey(),
        'password_hash' => \Yii::$app->getSecurity()->generatePasswordHash('admin@cakeaway.id'),
        'email' => 'admin@cakeaway.id',
        'role' => 2,
        'status' => 11,
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
    ],
    'user3' => [
        'no' => 'USR0000000000003',
        'username' => 'CustomerTest',
        'auth_key' => \Yii::$app->getSecurity()->generateRandomKey(),
        'password_hash' => \Yii::$app->getSecurity()->generatePasswordHash('customer.test@cakeaway.id'),
        'email' => 'customer.test@cakeaway.id',
        'role' => 6,
        'status' => 11,
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
    ]
];