<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use kartik\datetime\DateTimePicker;

use common\models\Region;
?>

<div class="add-form">
    <?php $form = ActiveForm::begin();?>

    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'text')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'timeFormatted')->widget(
                DateTimePicker::className(), [
                    'removeButton' => false,
                    'pluginOptions' => [
                        // 'startView'=>'year',
                        //'minViewMode'=>'months',
                        'format' => 'dd.mm.yyyy hh.ii',
                        'todayHighlight' => true,
                        'autoclose' => true
                    ]
                ]
            );?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'voter_participation')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'status')->dropDownList(Region::getStatusArray(), ['prompt' => 'Выберите...']) ?>
        </div>
    </div>

    <?//= $form->field($model, 'data')->textarea();?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
