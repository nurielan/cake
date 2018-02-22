<?php

use yii\web\GroupUrlRule as GUR;

return [
    'site' => [
        'class' => GUR::className(),
        'prefix' => 'situs',
        'routePrefix' => 'site',
        'rules' => [
            'beranda' => 'index',
            'masuk' => 'login',
            'keluar' => 'logout'
        ]
    ],
    'main/backend' => [
        'class' => GUR::className(),
        'prefix' => 'dasbor',
        'routePrefix' => 'main/backend',
        'rules' => [
            'beranda' => 'index',
            'masuk' => 'login',
            'keluar' => 'logout'
        ]
    ]
];