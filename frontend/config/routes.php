<?php

use yii\web\GroupUrlRule as GUR;

return [
    'rest-data' => [
        'class' => GUR::className(),
        'prefix' => 'rest-data',
        'routePrefix' => 'rest-data',
        'rules' => [
            'kesalahan' => 'error',
            'user-address/<noid>' => 'user-address'
        ]
    ],
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
            'atur-ulang-kata-sandi' => 'rest-password',
            'daftar-pesanan' => 'order-list',
            'profil' => 'profile',
            'barang-pesanan/<order_list_no>' => 'order-item',
            'konfirmasi-pesanan/<order_list_no>' => 'order-confirm',
            'konfirmasi-pesanan' => 'order-confirm',
            'cetak/<id>' => 'print'
        ]
    ],
    'gallery' => [
        'class' => GUR::className(),
        'prefix' => 'galeri',
        'routePrefix' => 'gallery',
        'rules' => [
            'kesalahan' => 'error',
            'detail/<alias>' => 'detail',
            'hal/<page:\d+>/per-hal/<per-page:\d+>' => 'index',
            '/' => 'index',
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
            'merek/<brand>/kategori/<category>/harga-min/<price_min>/harga-maks/<price_max>/hal/<page:\d+>/per-hal/<per-page:\d+>' => 'index',
            'merek/<brand>/kategori/<category>/harga-min/<price_min>/harga-maks/<price_max>' => 'index',
            'merek/<brand>/harga-min/<price_min>/harga-maks/<price_max>/hal/<page:\d+>/per-hal/<per-page:\d+>' => 'index',
            'merek/<brand>/harga-min/<price_min>/harga-maks/<price_max>' => 'index',
            'kategori/<category>/harga-min/<price_min>/harga-maks/<price_max>/hal/<page:\d+>/per-hal/<per-page:\d+>' => 'index',
            'kategori/<category>/harga-min/<price_min>/harga-maks/<price_max>' => 'index',
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
            'buang/<cart_id>' => 'remove',
            'buang-semua' => 'remove-all',
            'checkout' => "checkout",
            'metode-pembayaran' => "payment-method"
        ]
    ],
    'product-custom' => [
        'class' => GUR::className(),
        'prefix' => 'produk-kustom',
        'routePrefix' => 'product-custom',
        'rules' => [
            'kesalahan' => 'error',
            '/' => 'index',
            'hapus/<no>' => 'remove'
        ]
    ],
];