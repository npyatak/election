<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use unclead\multipleinput\TabularInput;
?>

<div class="form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment')->textarea() ?>

	<hr>

    <h4>Ответы</h4>
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
	    'models' => $answerModels,
	    'columns' => [
	        [
	            'name'  => 'id',
	            'type'  => 'hiddenInput',
	        ],
	        [
	        	'title' => 'Заголовок',
	        	'name' => 'title',
                'enableError' => true
	        ],
	        [
	        	'title' => 'Правильный ответ',
	        	'name' => 'is_right',
	            'type'  => 'checkbox',
	        ],
	        [
	        	'title' => 'Комментарий',
	        	'name' => 'comment',
	        ],
	    ],
	]) ?>

	<hr>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
