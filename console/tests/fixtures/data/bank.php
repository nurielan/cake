<?php

use Faker\Factory;

$faker = Factory::create('id_ID');

return [
    [
        'name' => 'BCA',
        'account_number' => $faker->bankAccountNumber,
        'account_name' => 'Cake BCA',
        'branch' => 'Pasir Kaliki',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
    ],
    [
        'name' => 'BNI',
        'account_number' => $faker->bankAccountNumber,
        'account_name' => 'Cake BNI',
        'branch' => 'Pasir Kaliki',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
    ],
    [
        'name' => 'BRI',
        'account_number' => $faker->bankAccountNumber,
        'account_name' => 'Cake BRI',
        'branch' => 'Pasir Kaliki',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
    ],
];