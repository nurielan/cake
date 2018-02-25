<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main backend application asset bundle.
 */
class AdminLteAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/assets/adminlte';
    public $css = [
        'font-awesome/css/font-awesome.min.css',
        'Ionicons/css/ionicons.min.css',
        'dist/css/AdminLTE.min.css',
        'dist/css/skins/_all-skins.min.css',
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic'
    ];
    public $js = [
        [
            'url' => 'dist/js/html5shiv.min.js',
            'position' => View::POS_HEAD,
            'condition' => 'lte IE9'
        ],
        [
            'url' => 'dist/js/respond.min.js',
            'position' => View::POS_HEAD,
            'condition' => 'lte IE9'
        ],
        'jquery-slimscroll/jquery.slimscroll.min.js',
        'fastclick/lib/fastclick.js',
        'dist/js/adminlte.min.js'
    ];
    public $depends = [
        'backend\assets\AppAsset'
    ];
}
