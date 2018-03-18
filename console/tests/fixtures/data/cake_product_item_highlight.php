<?php

use Faker\Factory;

$faker = Factory::create('id_ID');
$datas = [];

for ($i = 1; $i <= 5; $i++) {
    $datas[] = [
        'product_item_no' => 'PRDCTITM000000000000' . $i,
        'created_at' => date_format($faker->dateTime(), 'Y-m-d h:i:s'),
        'updated_at' => date_format($faker->dateTime(), 'Y-m-d h:i:s')
    ];
}

return $datas;