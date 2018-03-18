<?php

use Faker\Factory;

$faker = Factory::create('id_ID');
$datas = [];

for ($i = 1; $i <= 3; $i++) {
    $name = $faker->words(3);
    $word = ucwords(implode(' ', $name));

    $datas[] = [
        'name' => $word,
        'alias' => strtolower(implode('-', $name)),
        'description' => '<p>' . implode('</p><p>', $faker->paragraphs(5)) . '</p>',
        'created_at' => date_format($faker->dateTime(), 'Y-m-d h:i:s'),
        'updated_at' => date_format($faker->dateTime(), 'Y-m-d h:i:s')
    ];
}

return $datas;