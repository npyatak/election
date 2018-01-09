<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class TestAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/test-page.css',
    ];
    public $js = [
        'js/test.js',
    ];
    public $depends = [
        'frontend\assets\AppAsset',
    ];
}
