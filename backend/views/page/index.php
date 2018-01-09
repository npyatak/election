<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;

use common\models\Page;
use common\models\Category;

$this->title = 'Страницы';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="index">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить страницу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                'id',
                'alias',
                'title',
                [
                    'attribute' => 'category_id',
                    'value' => function($data) {
                        return $data->category->title;
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'category_id', ArrayHelper::map(Category::find()->all(), 'id', 'title'), ['prompt'=>'']),
                ],
                [
                    'attribute' => 'status',
                    'format' => 'raw',
                    'value' => function($data) {
                        return $data->getStatusArray()[$data->status];
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'status', Page::getStatusArray(), ['prompt'=>''])
                ], 
                [
                    'attribute' => 'image',
                    'format' => 'raw',
                    'value' => function($data) {
                        return Html::img($data->imageUrl, ['width' => '200px']);
                    }
                ],
                /*[
                    'attribute' => 'is_page',
                    'format' => 'raw',
                    'value' => function($data) {
                        return $data->getIsPageArray()[$data->is_page];
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'is_page', Page::getIsPageArray(), ['prompt'=>''])
                ],*/

                [
                    'class' => 'yii\grid\ActionColumn',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            $url = Yii::$app->urlManagerFrontEnd->createUrl(['event/'.$model->id]);
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                'title' => 'Просмотр'
                            ]);
                        },
                    ]
                ],
            ],
        ]); ?>
    <?php Pjax::end(); ?>
</div>
