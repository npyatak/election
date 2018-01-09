<?php
use yii\helpers\Html;
use common\components\CKEditor;
?>

<div class="row item">
	<div class="col-md-5">
		<div class="form-group <?=$model->hasErrors("text") ? 'has-error' : '';?>">
			<?= Html::activeLabel($model, "[$i]text", ['class' => 'control-label']) ?>
			<?= Html::activeTextarea($model, "[$i]text", ['class' => 'form-control', 'rows' => 7]) ?>
			<?= Html::error($model, "[$i]text", ['class' => 'help-block']);?>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group <?=$model->hasErrors("caption") ? 'has-error' : '';?>">
			<?= Html::activeLabel($model, "[$i]caption", ['class' => 'control-label']) ?>
			<?=CKEditor::widget([
			    'model' => $model,
			    'attribute' => "[$i]caption",
			    'editorOptions' => [
		            'allowedContent' => true,
			    	'preset' => 'linkOnly'
			    ]
		    ]);?>
			<?= Html::error($model, "[$i]caption", ['class' => 'help-block']);?>
		</div>
	</div>
	<div class="col-md-1">
		<a href="#" class="remove" title="Удалить"><span class="glyphicon glyphicon-remove"></span></a>
	</div>
</div>