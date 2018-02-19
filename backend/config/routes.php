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
    ]
];