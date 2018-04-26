<?php

use Faker\Factory;

$faker = Factory::create();
$countNo = 1;
$countNo2 = 1;

function tagNo($no) {
    if ($no < 10) {
        $no3 = 'BLGTAG000000000000' . $no;
    }

    return $no3;
}

for ($i = 1; $i <= 5; $i++) {
    if ($countNo2 < 10) {
        $no2 = 'BLGCTGRY000000000000' . $countNo2++;
    } elseif ($countNo2 < 100) {
        $no2 = 'BLGCTGRY00000000000' . $countNo2++;
    }

    for ($j = 1; $j <= 15; $j++) {
        if ($countNo < 10) {
            $no = 'BLGITM000000000000' . $countNo++;
        } elseif ($countNo < 100) {
            $no = 'BLGITM00000000000' . $countNo++;
        }

        $name = $faker->words(3);
        $word = ucwords(implode(' ', $name));
        $blgitm = [
            'no' => $no,
            'blog_category_no' => $no2,
            'blog_tag_no' => tagNo($faker->numberBetween(1, 5)),
            'name' => $word,
            'alias' => strtolower(implode('-', $name)),
            'description' => '<p>' . implode('</p><p>', $faker->paragraphs(5)) . '</p>',
            'status' => 1,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ];
        $blgitms[] = $blgitm;
    }
}

return $blgitms;