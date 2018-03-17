
<?php
$regionIdsArr = [];
foreach ($regions as $region) {
    $regionIdsArr[$region['id']] = ['title' => $region['title'], 'text' => $region['text']];
}

$script = "
    window.regionIdsArr = '".json_encode($regionIdsArr)."';
    window.regionResultsArr = '".json_encode($regionResultsArr)."';
";

$this->registerJs($script, yii\web\View::POS_HEAD);
?>