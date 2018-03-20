<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class InaugurationAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/inauguration.css?v=200318',
    ];
    public $js = [
    ];
    public $depends = [
        'frontend\assets\AppAsset',
    ];
}
