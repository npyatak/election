<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use unclead\multipleinput\TabularInput;

$this->title = 'Добавить значения. Рейтинг: '.$rating->title.'. Группа: '.$group->title;
$this->params['breadcrumbs'][] = ['label' => 'Значения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="create">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin();?>
        <?= TabularInput::widget([
        	'rendererClass' => '\common\components\CustomTableRenderer',
        	'removeButtonOptions' => [
        		'label' => 'X',
        	],
            'addButtonOptions' => [
                'label' => 'Добавить',
                'class' => 'btn btn-primary'
            ],
            'addButtonPosition' => TabularInput::POS_FOOTER,
            'models' => $models,
            'columns' => [
                [
                    'name'  => 'id',
                    'type'  => 'hiddenInput',
                ],

                [
                    'name'  => 'candidate_id',
                    'type'  => 'dropDownList',
                    'title' => 'Кандидат',
                    //'defaultValue' => 1,
                    'items' => [null => ''] + ArrayHelper::map($candidates, 'id', 'surname'),
                ],
                [
                    'name'  => 'additional_id',
                    'type'  => 'dropDownList',
                    'title' => 'Дополнительно',
                    //'defaultValue' => 1,
                    'items' => [null => ''] + $additionalIds,
                ],
                [
                	'title' => 'Процент',
                	'name' => 'score',
                    'enableError' => true
                ],
            ],
        ]) ?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>