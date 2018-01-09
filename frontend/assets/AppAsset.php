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
        'css/article-page.css',
        'css/article-preview-page.css',
        'css/fonts.css',
        'css/infographic-page.css',
        'css/jwplayer.css',
        'css/main-page.css',
        'css/styles.css',
    ];
    public $js = [
        'js/player/jwplayer.js',
        'js/main.js',
        'js/infographic.js',
        'js/psb-nav.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
