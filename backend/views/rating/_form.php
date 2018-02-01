<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use common\components\ElfinderInput;
?>

<div class="add-form">
    <?php $form = ActiveForm::begin();?>

    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'title')->textInput() ?>
        </div>
        <div class="col-sm-5">
            <?= $form->field($model, 'subtitle')->textInput() ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'date')->textInput() ?>
        </div>
    </div>

    <?= $form->field($model, 'text')->textarea() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
