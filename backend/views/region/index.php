<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;

use common\models\Region;

$this->title = 'Регионы';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="index">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить регион', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'rowOptions'=>function($model){
                if($model->status === Region::STATUS_OPENED) {
                    return ['class' => 'success'];
                } elseif($model->status === Region::STATUS_CLOSED) {
                    return ['class' => 'danger'];
                }
            },
            'columns' => [
                'id',
                'title',
                'voter_participation',
                'timeFormatted',
                [
                    'attribute' => 'status',
                    'format' => 'raw',
                    'value' => function($data) {
                        return $data->getStatusArray()[$data->status];
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'status', Region::getStatusArray(), ['prompt'=>''])
                ], 

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{rating} {update}',
                    'buttons' => [
                        'rating' => function ($url, $model) {
                            $url = Url::toRoute(['/rating/multiple-input', 'region_id' => $model->id]);
                            return Html::a('<span class="glyphicon glyphicon-list"></span>', $url, [
                                'title' => 'Рейтинги'
                            ]);
                        },
                    ]
                ],
            ],
        ]); ?>
    <?php Pjax::end(); ?>
</div>
