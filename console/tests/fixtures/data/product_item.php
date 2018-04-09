<?php

use Faker\Factory;

$faker = Factory::create('id_ID');

$countNo = 1;
$countNo2 = 1;

for ($i = 1; $i <= 12; $i++) {
    if ($countNo2 < 10) {
        $no2 = 'PRDCTCTGRY000000000000' . $countNo2++;
    } elseif ($countNo2 < 100) {
        $no2 = 'PRDCTCTGRY00000000000' . $countNo2++;
    }

    for ($j = 1; $j <= 5; $j++) {
        if ($countNo < 10) {
            $no = 'PRDCTITM000000000000' . $countNo++;
        } elseif ($countNo < 100) {
            $no = 'PRDCTITM00000000000' . $countNo++;
        } elseif ($countNo < 1000) {
            $no = 'PRDCTITM0000000000' . $countNo++;
        }

        $name = $faker->words(3);
        $word = ucwords(implode(' ', $name));
        $itm = [
            'no' => $no,
            'product_category_no' => $no2,
            'name' => $word,
            'alias' => strtolower(implode('-', $name)),
            'description' => '<p>' . implode('</p><p>', $faker->paragraphs(5)) . '</p>',
            'status' => 1,
            'discount' => 0,
            'in_stock' => $faker->randomDigit,
            'price' => $faker->numberBetween(15000, 300000),
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ];
        $itms[] = $itm;
    }
}

return $itms;