<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use common\components\ElfinderInput;
?>

<div class="add-form">
    <?php $form = ActiveForm::begin();?>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'title')->textInput() ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'subtitle')->textInput() ?>
        </div>
    </div>

    <?= $form->field($model, 'text')->textarea() ?>
    
    <hr>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'share_title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'share_image')->widget(ElfinderInput::className());?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-7">
            <?= $form->field($model, 'share_text')->textarea() ?>
        </div>
        <div class="col-md-5">
            <?= $form->field($model, 'share_twitter')->textInput();?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
