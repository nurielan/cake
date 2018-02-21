<?php

return [
    'user1' => [
        'no' => 'USR0000000000001',
        'username' => 'SuperAdmin',
        'auth_key' => \Yii::$app->getSecurity()->generateRandomKey(),
        'password_hash' => \Yii::$app->getSecurity()->generatePasswordHash('superadmin@cake.co.id'),
        'email' => 'superadmin@cake.co.id',
        'role' => 1,
        'status' => 11,
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
    ],
    'user2' => [
        'no' => 'USR0000000000002',
        'username' => 'Admin',
        'auth_key' => \Yii::$app->getSecurity()->generateRandomKey(),
        'password_hash' => \Yii::$app->getSecurity()->generatePasswordHash('admin@cake.co.id'),
        'email' => 'admin@cake.co.id',
        'role' => 2,
        'status' => 11,
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
    ],
    'user3' => [
        'no' => 'USR0000000000003',
        'username' => 'CustomerTest',
        'auth_key' => \Yii::$app->getSecurity()->generateRandomKey(),
        'password_hash' => \Yii::$app->getSecurity()->generatePasswordHash('customertest@cake.co.id'),
        'email' => 'customertest@cake.co.id',
        'role' => 6,
        'status' => 11,
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
    ]
];