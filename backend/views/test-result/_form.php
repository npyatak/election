<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use common\components\ElfinderInput;
?>

<div class="add-form">
    <?php $form = ActiveForm::begin();?>

    <div class="row">
        <div class="col-md-1">
            <?= $form->field($model, 'range_start')->textInput();?>
        </div>
        <div class="col-sm-1">
            <?= $form->field($model, 'range_end')->textInput() ?>
        </div>
        <div class="col-sm-10">
            <?= $form->field($model, 'title')->textInput() ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
