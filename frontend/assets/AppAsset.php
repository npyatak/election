<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/bootstrap-select.min.css',
        'css/font-awesome.min.css',
        'css/owl.carousel.min.css',
        'css/slick.css',
        'css/slick-theme.css',
        'css/preload.css',
        'css/core.css?v=190318',
        'css/main.css?v=190318',
    ];
    public $js = [
        'js/bootstrap.min.js',
        'js/bootstrap-select.js',
        'js/owl.carousel.min.js',
        'js/slick.min.js',
        'js/main.js?v=190318',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
