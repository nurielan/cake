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
    public $baseUrl = '@web/adminlte';
    public $css = [
        'bower_components/font-awesome/css/font-awesome.min.css',
        'bower_components/Ionicons/css/ionicons.min.css',
        'dist/css/AdminLTE.min.css',
        'dist/css/skins/_all-skins.min.css',
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic',
        'dist/css/sweetalert.min.css'
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
        'bower_components/jquery-slimscroll/jquery.slimscroll.min.js',
        'bower_components/fastclick/lib/fastclick.js',
        'dist/js/adminlte.min.js',
        'dist/js/sweetalert.min.js'
    ];
    public $depends = [
        'backend\assets\AppAsset'
    ];
}
