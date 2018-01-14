<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;

use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
?>

<div class="add-form">
    <?php $form = ActiveForm::begin();?>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'date')->widget(DatePicker::className());?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'date_to')->widget(DatePicker::className());?>
        </div>
    </div>

    <?= $form->field($model, 'text')->widget(CKEditor::className(),[
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',
        [
            'preset' => 'full',
            'allowedContent' => true,
        ]),
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
