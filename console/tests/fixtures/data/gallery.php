<?php

use Faker\Factory;

$faker = Factory::create('id_ID');
$datas = [];

for ($i = 1; $i <= 12; $i++) {
    $name = $faker->sentence(3);

    $datas[] = [
        'name' => $name,
        'alias' => strtolower(str_replace(' ', '-', $name)),
        'description' => $faker->text(),
        'status' => 1,
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
    ];
}

return $datas;