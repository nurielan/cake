<?php

use yii\web\GroupUrlRule as GUR;

return [
    'site' => [
        'class' => GUR::className(),
        'prefix' => '',
        'routePrefix' => 'site',
        'rules' => [
            'beranda' => 'index',
            'masuk' => 'login',
            'keluar' => 'logout',
            'profil' => 'profile'
        ]
    ],
    'rest-data' => [
        'class' => GUR::className(),
        'prefix' => 'rest-data',
        'routePrefix' => 'rest-data',
        'rules' => [
            'user-address' => 'user-address',
            'user-address/<noid>' => 'user-address'
        ]
    ],
];