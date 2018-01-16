<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;

use common\models\Rating;
use common\models\Candidate;
use common\models\RatingGroup;
use common\models\RatingItem;

$this->title = 'Значения';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="index">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить значение', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                'id',
                [
                    'attribute' => 'rating_id',
                    'value' => function($data) {
                        return $data->rating_id ? $data->rating->title : '';
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'rating_id', ArrayHelper::map(Rating::find()->all(), 'id', 'title'), ['prompt'=>'']),
                ],
                [
                    'attribute' => 'rating_group_id',
                    'value' => function($data) {
                        return $data->rating_group_id ? $data->ratingGroup->title : '';
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'rating_group_id', ArrayHelper::map(RatingGroup::find()->all(), 'id', 'title'), ['prompt'=>'']),
                ],
                [
                    'attribute' => 'candidate_id',
                    'value' => function($data) {
                        return $data->candidate_id ? $data->candidate->surname : '';
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'candidate_id', ArrayHelper::map(Candidate::find()->all(), 'id', 'surname'), ['prompt'=>'']),
                ],
                [
                    'attribute' => 'additional_id',
                    'value' => function($data) {
                        return $data->additional_id ? RatingItem::getAdditionalArray()[$data->additional_id] : '';
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'additional_id', RatingItem::getAdditionalArray(), ['prompt'=>'']),
                ],

                'score',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update} {delete}'
                ],
            ],
        ]); ?>
    <?php Pjax::end(); ?>
</div>
