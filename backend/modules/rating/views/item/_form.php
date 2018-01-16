<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;

use common\models\Rating;
use common\models\Candidate;
use common\models\RatingGroup;
?>

<div class="add-form">
    <?php $form = ActiveForm::begin();?>

    <div class="row">
        <?php if(!$rating_id):?>
        <div class="col-sm-6">
			<?= $form->field($model, 'rating_id')->dropDownList(ArrayHelper::map(Rating::find()->all(), 'id', 'title'), ['prompt' => 'Выберите...']) ?>
		</div>
        <?php endif;?>
        <?php if(!$group_id):?>
        <div class="col-sm-6">
			<?= $form->field($model, 'rating_group_id')->dropDownList(ArrayHelper::map(RatingGroup::find()->all(), 'id', 'title'), ['prompt' => 'Выберите...']) ?>
		</div>
        <?php endif;?>
	</div>

    <div class="row">
        <div class="col-sm-6 <?=$model->additional_id ? 'hide': '';?>">
    		<?= $form->field($model, 'candidate_id')->dropDownList(ArrayHelper::map(Candidate::find()->all(), 'id', 'surname'), ['prompt' => 'Выберите...']) ?>
		</div>
        <div class="col-sm-6 <?=$model->candidate_id ? 'hide': '';?>">
    		<?= $form->field($model, 'additional_id')->dropDownList($model->additionalArray, ['prompt' => 'Выберите...']) ?>
		</div>
	</div>
    
    <?= $form->field($model, 'score')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<?php 
$script = "
	
";

$this->registerJs($script, yii\web\View::POS_END);?>