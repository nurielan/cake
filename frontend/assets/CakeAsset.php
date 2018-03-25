<?php
/**
 * Created by PhpStorm.
 * User: Nurilan
 * Date: 16/03/2018
 * Time: 19:36
 */

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main frontend application asset bundle.
 */
class CakeAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/cake';
    public $css = [
        ['href' => 'images/favicon-32x32.png', 'rel' => 'shortcut icon'],
        'stylesheets/css/font-family.css',
        'stylesheets/css/responsive.css',
        'stylesheets/css/slick.css',
        'stylesheets/css/slick-theme.css',
        'stylesheets/css/style.css',
        'stylesheets/css/animate.css',
        'stylesheets/css/global.css',
        'stylesheets/css/effect2.css',
        'javascripts/fancybox/jquery.fancybox.css',
        'stylesheets/css/sweetalert.min.css',
        'javascripts/jquery-ui-1.12.1.custom/jquery-ui.min.css'
    ];
    public $js = [
        [
            'url' => 'javascripts/html5shiv.min.js',
            'position' => View::POS_HEAD,
            'condition' => 'lte IE9'
        ],
        [
            'url' => 'javascripts/respond.min.js',
            'position' => View::POS_HEAD,
            'condition' => 'lte IE9'
        ],
        [
            'url' => 'javascripts/modernizr.custom.js',
            'position' => View::POS_HEAD,
        ],
        'javascripts/jquery-ui-1.12.1.custom/jquery-ui.min.js',
        'javascripts/typeahead/typeahead.jquery.min.js',
        'javascripts/typeahead/typeahead.bundle.min.js',
        //'javascripts/typeahead/bootstrap3-typeahead.min.js',
        'javascripts/sweetalert.min.js',
        'javascripts/fancybox/jquery.fancybox.pack.js',
        'javascripts/slick.js',
        'javascripts/wow/wow.js',
        'javascripts/custom.js',
        'javascripts/classie.js',
        'javascripts/pathLoader.js',
        'javascripts/main.js',
        'javascripts/site.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'frontend\assets\AppAsset'
    ];
}