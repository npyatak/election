<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class IndexFirstHoursAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/index_first_hours.css?v=190318',
    ];
    public $js = [
    ];
    public $depends = [
        'frontend\assets\AppAsset',
    ];
}
