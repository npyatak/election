<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class IndexVoterParticipationAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/index_voter_participation.css',
        'js/tooltip/tooltip-helper.min.css',
    ];
    public $js = [
        'js/tooltip/tooltip-helper.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
