<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

use common\models\Candidate;

$this->title = 'Кандидаты';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="index">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить кандидата', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                'id',
                'alias',
                'name',
                'second_name',
                'surname',
                'status',
                [
                    'attribute' => 'active',
                    'format' => 'raw',
                    'value' => function($data) {
                        return $data->getActiveArray()[$data->active];
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'active', Candidate::getActiveArray(), ['prompt'=>''])
                ],
                [
                    'attribute' => 'image',
                    'header' => 'Изображение',
                    'format' => 'raw',
                    'value' => function($data) {
                        return $data->image ? Html::img($data->imageUrl, ['width' => '200']) : '';
                    },
                ],

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update} {delete}'
                ],
            ],
        ]); ?>
    <?php Pjax::end(); ?>
</div>
