<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
//use unclead\multipleinput\TabularInput;

$this->title = 'Добавить значения. Рейтинг: '.$rating->title.'. Группа: '.$group->title;
$this->params['breadcrumbs'][] = ['label' => 'Значения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="create">
    <h1><?= Html::encode($this->title) ?></h1>
    <hr>

    <?php $form = ActiveForm::begin();?>
        <?php $candidatesArray = ArrayHelper::map($candidates, 'id', 'surname');
        foreach ($models as $key => $model):?>
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="right">
                    <?php if($model->candidate_id) {
                        echo $candidatesArray[$model->candidate_id];
                        echo Html::activeHiddenInput($model, "[$key]candidate_id");
                    } elseif($model->additional_id) {
                        echo $additionalIds[$model->additional_id];
                        echo Html::activeHiddenInput($model, "[$key]additional_id");
                    }?>
                    </h4>
                    <?php if($model->id) {
                        echo Html::activeHiddenInput($model, "[$key]id");
                    }?>
                </div>
                <div class="col-sm-6">
                    <div class="form-group <?=$model->hasErrors("score") ? 'has-error' : '';?>">
                        <?= Html::activeTextInput($model, "[$key]score", ['class' => 'form-control']) ?>
                        <?= Html::error($model, "[$key]score", ['class' => 'help-block']);?>
                    </div>
                </div>
            </div>
        <?php endforeach;?>

        <?php
        // echo TabularInput::widget([
        // 	'rendererClass' => '\common\components\CustomTableRenderer',
        // 	'removeButtonOptions' => [
        // 		'label' => 'X',
        // 	],
        //     'addButtonOptions' => [
        //         'label' => 'Добавить',
        //         'class' => 'btn btn-primary hide'
        //     ],
        //     'addButtonPosition' => TabularInput::POS_FOOTER,
        //     'models' => $models,
        //     'columns' => [
        //         [
        //             'name'  => 'id',
        //             'type'  => 'hiddenInput',
        //         ],

        //         [
        //             'name'  => 'candidate_id',
        //             'type'  => 'dropDownList',
        //             'title' => 'Кандидат',
        //             //'defaultValue' => 1,
        //             'items' => [null => ''] + ArrayHelper::map($candidates, 'id', 'surname'),
        //         ],
        //         [
        //             'name'  => 'additional_id',
        //             'type'  => 'dropDownList',
        //             'title' => 'Дополнительно',
        //             //'defaultValue' => 1,
        //             'items' => [null => ''] + $additionalIds,
        //         ],
        //         [
        //         	'title' => 'Процент',
        //         	'name' => 'score',
        //             'enableError' => true
        //         ],
        //     ],
        // ]) 
        ?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>