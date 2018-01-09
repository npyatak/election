<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;

use common\models\Card;

$this->title = 'Карточки';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="index">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить карточку', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                'id',
                'title',
                [
                    'attribute' => 'category',
                    'value' => function($data) {
                        return $data->categoryArray[$data->category];
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'category', Card::getCategoryArray(), ['prompt'=>'']),
                ],
                [
                    'attribute' => 'show_on_main',
                    'format' => 'raw',
                    'value' => function($data) {
                        return $data->getShowOnMainArray()[$data->show_on_main];
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'show_on_main', Card::getShowOnMainArray(), ['prompt'=>''])
                ], 
                [
                    'class' => 'yii\grid\ActionColumn',
                    // 'buttons' => [
                    //     'view' => function ($url, $model) {
                    //         $url = Yii::$app->urlManagerFrontEnd->createUrl(['event/'.$model->id]);
                    //         return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                    //             'title' => 'Просмотр'
                    //         ]);
                    //     },
                    // ]
                ],
            ],
        ]); ?>
    <?php Pjax::end(); ?>
</div>
