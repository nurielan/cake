<?php

use Faker\Factory;

$faker = Factory::create();
$countNo = 1;

for ($i = 1; $i <= 5; $i++) {
    if ($countNo < 10) {
        $no = 'BLGTAG000000000000' . $countNo++;
    }

    $name = $faker->words(3);
    $word = ucwords(implode(' ', $name));
    $blgcat = [
        'no' => $no,
        'name' => $word,
        'alias' => strtolower(implode('-', $name)),
        'description' => '<p>' . implode('</p><p>', $faker->paragraphs()) . '</p>',
        'status' => 1,
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
    ];
    $blgcats[] = $blgcat;
}

return $blgcats;