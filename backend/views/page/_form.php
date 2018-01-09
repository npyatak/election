<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;

use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

use common\models\Category;
?>

<div class="add-form">
    <?php $form = ActiveForm::begin();?>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'subtitle')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'menu_title')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Category::find()->all(), 'id', 'title'), ['prompt' => 'Выберите...']) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'imageFile')->fileInput() ?>
        </div>
    </div>

    <?= $form->field($model, 'preview')->textarea();?>

    <?= $form->field($model, 'text')->widget(CKEditor::className(),[
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',
        [
            'preset' => 'full',
            'allowedContent' => true,
        ]),
    ]);
    ?>

    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'share_title')->textInput() ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'shareImageFile')->fileInput() ?>
        </div>
    </div>

    <?= $form->field($model, 'share_text')->textarea();?>

    <div class="row">
        <div class="col-sm-2">
            <?= $form->field($model, 'status')->dropDownList($model->statusArray, ['class'=>'']) ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($model, 'is_page')->dropDownList($model->isPageArray, ['class'=>'']) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
