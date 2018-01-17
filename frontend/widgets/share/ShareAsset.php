<?php

namespace frontend\widgets\share;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class ShareAsset extends AssetBundle
{
    //public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    ];
    public $js = [
        'src/js/share.js',
    ];
    public $depends = [
        'frontend\assets\AppAsset',
    ];
}
