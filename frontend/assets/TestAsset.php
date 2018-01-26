<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class TestAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/css-circular-prog-bar.css',
        'js/bookBlock/bookblock.css',
        //'css/test-page.css',
    ];
    public $js = [
        'js/bookBlock/modernizr.custom.js',
        'js/test.js',
        'js/bookBlock/jquery.bookblock.js',
        'js/bookBlock/jquerypp.custom.js',
        'js/bookBlock/bookblock.js',
    ];
    public $depends = [
        'frontend\assets\AppAsset',
    ];
}
