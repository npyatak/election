<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;

use common\models\RatingGroup;

$this->title = 'Рейтинги';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="index">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить рейтинг', ['create'], ['class' => 'btn btn-success']) ?>
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
                    'header' => 'Быстрое добавление в группы',
                    'format' => 'raw',
                    'value' => function($data) use($groups) {
                        $arr = [];
                        foreach ($groups as $group) {
                            $arr[] = Html::a($group->title, Url::toRoute(['/rating/item/multiple-input', 'rating_id' => $data->id, 'group_id' => $group->id]));
                        }
                        return implode('<br>', $arr);
                    }
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update} {delete}'
                ],
            ],
        ]); ?>
    <?php Pjax::end(); ?>
</div>
