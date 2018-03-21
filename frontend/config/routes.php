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
    'gallery' => [
        'class' => GUR::className(),
        'prefix' => 'galeri',
        'routePrefix' => 'gallery',
        'rules' => [
            'kesalahan' => 'error',
            '' => 'index',
            'detail/<alias>' => 'detail'
        ]
    ],
    'blog' => [
        'class' => GUR::className(),
        'prefix' => 'blog',
        'routePrefix' => 'blog',
        'rules' => [
            'kesalahan' => 'error',
            '' => 'index',
            'detail/<alias>' => 'detail'
        ]
    ],
    'product' => [
        'class' => GUR::className(),
        'prefix' => 'produk',
        'routePrefix' => 'product',
        'rules' => [
            'kesalahan' => 'error',
            '' => 'index',
            'indeks/merek/<brand>' => 'index',
            'indeks/merek/<brand>/kategori/<category>' => 'index',
            'detail/<alias>' => 'detail',
        ]
    ]
];