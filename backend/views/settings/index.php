<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

use common\models\Settings;

$this->title = 'Настройки';
$this->params['breadcrumbs'][] = $this->title;
?>

<div>
    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>    
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'key',
                'title',
                [
                    'attribute' => 'value',
                    'contentOptions' => [
                        'style' => 'max-width: 300px; overflow: hidden;'
                    ],
                    'value' => function($data) {
                        if($data->type == Settings::TYPE_DROPDOWN_LIST) {
                            $attr = $data->key.'Array';
                            return $data->$attr[$data->value];
                        }
                        return $data->value;
                    }
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update}',
                ],
            ],
        ]); ?>
    <?php Pjax::end(); ?>
</div>
