<?php

use Faker\Factory;

$faker = Factory::create('id_ID');
$datas = [];

for ($i = 1; $i <= 3; $i++) {

    if ($i % 2 == 0) {
        $name = $faker->firstName('male') . ' ' . $faker->lastName;
        $gender = 1;
    } else {
        $name = $faker->firstName('female') . ' ' . $faker->lastName;
        $gender = 2;
    }

    $datas[] = [
        'fullname' => $name,
        'username' => strtolower(str_replace(' ', '-', $name)),
        'gender' => $gender,
        'description' => '<p>' . implode('</p><p>', $faker->paragraphs(5)) . '</p>',
        'created_at' => date_format($faker->dateTime(), 'Y-m-d h:i:s'),
        'updated_at' => date_format($faker->dateTime(), 'Y-m-d h:i:s')
    ];
}

return $datas;