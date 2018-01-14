<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Календарь';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="index">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить событие в календарь', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                [
                    'attribute' => 'date',
                    'value' => function($data) {
                        return $data->viewDate;
                    },
                    //'filter' => Html::activeDropDownList($searchModel, 'category', Card::getCategoryArray(), ['prompt'=>'']),
                ],
                'title',
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
