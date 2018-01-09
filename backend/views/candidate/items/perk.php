<?php
use yii\helpers\Html;
use common\components\ElfinderInput;
?>

<div class="row item">
	<div class="col-md-6">
		<div class="form-group <?=$model->hasErrors("text") ? 'has-error' : '';?>">
			<?= Html::activeLabel($model, "[$i]text", ['class' => 'control-label']) ?>
			<?= Html::activeTextarea($model, "[$i]text", ['class' => 'form-control', 'rows' => 2]) ?>
			<?= Html::error($model, "[$i]text", ['class' => 'help-block']);?>
		</div>
	</div>
	<div class="col-md-5">
		<div class="form-group <?=$model->hasErrors("image") ? 'has-error' : '';?>">
			<?= Html::activeLabel($model, "[$i]image", ['class' => 'control-label']) ?>
			<?= ElfinderInput::widget([
			    'model' => $model,
			    'attribute' => "[$i]image",
			]);?>
			<?= Html::error($model, "[$i]image", ['class' => 'help-block']);?>
		</div>
	</div>
	<div class="col-md-1">
		<a href="#" class="remove" title="Удалить"><span class="glyphicon glyphicon-remove"></span></a>
	</div>
</div>