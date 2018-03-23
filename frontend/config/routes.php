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
            '/' => 'index',
            'detail/<alias>' => 'detail'
        ]
    ],
    'blog' => [
        'class' => GUR::className(),
        'prefix' => 'blog',
        'routePrefix' => 'blog',
        'rules' => [
            'kesalahan' => 'error',
            '/' => 'index',
            'detail/<alias>' => 'detail'
        ]
    ],
    'product' => [
        'class' => GUR::className(),
        'prefix' => 'produk',
        'routePrefix' => 'product',
        'rules' => [
            'kesalahan' => 'error',
            'merek/<brand>/kategori/<category>/hal/<page:\d+>/per-hal/<per-page:\d+>' => 'index',
            'merek/<brand>/kategori/<category>' => 'index',
            'merek/<brand>/hal/<page:\d+>/per-hal/<per-page:\d+>' => 'index',
            'merek/<brand>' => 'index',
            'hal/<page:\d+>/per-hal/<per-page:\d+>' => 'index',
            '/' => 'index',
            'detail/<alias>' => 'detail',
        ]
    ],
    'cart' => [
        'class' => GUR::className(),
        'prefix' => 'keranjang',
        'routePrefix' => 'cart',
        'rules' => [
            'kesalahan' => 'error',
            '/' => 'index',
            'taruh' => 'put',
            'ubah' => 'update',
            'buang' => 'remove'
        ]
    ],
];