<?php

use yii\web\GroupUrlRule as GUR;

return [
    'site' => [
        'class' => GUR::className(),
        'prefix' => '',
        'routePrefix' => 'site',
        'rules' => [
            'kesalahan' => 'error',
            'beranda' => 'index',
            'log-masuk' => 'login',
            'log-keluar' => 'logout',
            'kontak' => 'contact',
            'tentang' => 'about',
            'mendaftar' => 'signup',
            'permintaan-atur-ulang-kata-sandi' => 'request-password-reset',
            'atur-ulang-kata-sandi' => 'rest-password'
        ]
    ],
    'shop' => [
        'class' => GUR::className(),
        'prefix' => 'beli',
        'routePrefix' => 'shop',
        'rules' => [
            'kesalahan' => 'error',
            'beranda' => 'index',
            'detil/<alias>' => 'detail'
        ]
    ],
    'gallery' => [
        'class' => GUR::className(),
        'prefix' => 'galeri',
        'routePrefix' => 'gallery',
        'rules' => [
            'kesalahan' => 'error',
            'beranda' => 'index',
            'detil/<alias>' => 'detail'
        ]
    ],
    'blog' => [
        'class' => GUR::className(),
        'prefix' => 'blog',
        'routePrefix' => 'blog',
        'rules' => [
            'kesalahan' => 'error',
            'beranda' => 'index',
            'detil/<alias>' => 'detail'
        ]
    ]
];