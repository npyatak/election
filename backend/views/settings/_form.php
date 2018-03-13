<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\components\CKEditor;

use common\models\Settings;
?>

<div class="admin-form">

    <?php $form = ActiveForm::begin(['enableClientValidation' => true]); ?>

    <?php if($model->isNewRecord) {
    	echo $form->field($model, 'key')->textInput();
    } ?>

    <?= $form->field($model, 'title')->textInput() ?>

    <?php if($model->type == Settings::TYPE_EDITOR) {
        echo $form->field($model, 'value')->widget(CKEditor::classname(), [
            'editorOptions' => \mihaildev\elfinder\ElFinder::ckeditorOptions('elfinder', [
                'allowedContent' => true,
                'preset' => 'basic'
            ])
        ]);
    } elseif($model->type == Settings::TYPE_IMAGE) {
        echo $form->field($model, 'imageFile')->fileInput();
    } elseif($model->type == Settings::TYPE_DROPDOWN_LIST) {
        $attr = $model->key.'Array';
        echo $form->field($model, 'value')->dropDownList($model->$attr);
    } else {
        echo $form->field($model, 'value')->textInput();
    }
    ?>

    <?php if($model->isNewRecord) {
        echo $form->field($model, 'type')->textInput();
    }?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>