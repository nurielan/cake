<?php

use Faker\Factory;

$faker = Factory::create('id_ID');

$countNo = 1;

function itemNo($num) {
    if ($num < 10) {
        $no = 'PRDCTITM000000000000' . $num;
    } elseif ($num < 100) {
        $no = 'PRDCTITM00000000000' . $num;
    }

    return $no;
}

for ($i = 1; $i <= 15; $i++) {
    if ($countNo < 10) {
        $no = 'PRDCTPKG000000000000' . $countNo++;
    } elseif ($countNo < 100) {
        $no = 'PRDCTPKG00000000000' . $countNo++;
    }

    $name = ucwords($faker->word);
    $pkg = [
        'no' => $no,
        'name' => $name,
        'alias' => strtolower($name),
        'description' => '<p>' . implode('</p><p>', $faker->paragraphs(5)) . '</p>',
        'status' => $faker->numberBetween(0, 1),
        'tax' => 10,
        'in_stock' => $faker->randomDigit,
        'price' => $faker->numberBetween(30000, 600000),
        'product_item_1' => itemNo($faker->numberBetween(1, 60)),
        'product_item_2' => itemNo($faker->numberBetween(1, 60)),
        'product_item_3' => itemNo($faker->numberBetween(1, 60)),
        'product_item_4' => itemNo($faker->numberBetween(1, 60)),
        'product_item_5' => itemNo($faker->numberBetween(1, 60)),
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
    ];
    $pkgs[] = $pkg;
}

return $pkgs;