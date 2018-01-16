<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use unclead\multipleinput\TabularInput;
use common\components\CKEditor;
?>

<div class="form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <div class="row">
    	<div class="col-md-6">
			<?= $form->field($model, 'comment_right')->widget(CKEditor::className(), [
			    'editorOptions' => \mihaildev\elfinder\ElFinder::ckeditorOptions('elfinder', [
		            'allowedContent' => true,
			    	'preset' => 'textEditor'
			    ])
		    ]);?>
    	</div>
    	<div class="col-md-6">
			<?= $form->field($model, 'comment_wrong')->widget(CKEditor::className(), [
			    'editorOptions' => \mihaildev\elfinder\ElFinder::ckeditorOptions('elfinder', [
		            'allowedContent' => true,
			    	'preset' => 'textEditor'
			    ])
		    ]);?>
    	</div>
    </div>

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
	        ]
	    ],
	]) ?>

	<hr>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
