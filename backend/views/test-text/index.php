<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;

use common\models\Card;

$this->title = 'Тексты теста';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="index">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить тексты', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                'id',
                'title',
                'subtitle',
                [
                    'attribute' => 'image',
                    'header' => 'Изображение',
                    'format' => 'raw',
                    'value' => function($data) {
                        return $data->image ? Html::img($data->image, ['width' => '200']) : '';
                    },
                ],
                'button_title',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update} {delete}'
                ],
            ],
        ]); ?>
    <?php Pjax::end(); ?>
</div>
