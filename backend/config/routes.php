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
    'order-list' => [
        'class' => GUR::className(),
        'prefix' => 'daftar-pesanan',
        'routePrefix' => 'order-list',
        'rules' => [
            '' => 'index',
            'lihat/<id>' => 'view',
            'ubah/<id>' => 'update',
            'hapus/<id>' => 'delete',
            'status/no/<no>/aksi/<action>' => 'status',
            'cetak/<id>' => 'print'
        ]
    ]
];