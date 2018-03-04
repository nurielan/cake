<?php

use Faker\Factory;

$faker = Factory::create('id_ID');

$countNo = 1;

for ($i = 1; $i <= 4; $i++) {
    for ($j = 1; $j <= 3; $j++) {
        if ($countNo < 10) {
            $no = 'PRDCTCTGRY000000000000' . $countNo++;
        } elseif ($countNo < 100) {
            $no = 'PRDCTCTGRY00000000000' . $countNo++;
        }

        $name = ucwords($faker->word);
        $cat = [
            'no' => $no,
            'product_brand_no' => 'PRDCTBRND000000000000' . $i,
            'name' => $name,
            'alias' => strtolower($name),
            'description' => '<p>' . implode('</p><p>', $faker->paragraphs(2)) . '</p>',
            'status' => 1,
            'discount' => 0,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ];
        $cats[] = $cat;
    }
}

return $cats;