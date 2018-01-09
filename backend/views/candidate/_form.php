<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\components\ElfinderInput;
use common\components\CKEditor;
use unclead\multipleinput\TabularInput;

use common\models\CandidateQuotation;
?>

<div class="form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
    	<div class="col-md-4">
		    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
		</div>
    	<div class="col-md-4">
		    <?= $form->field($model, 'second_name')->textInput(['maxlength' => true]) ?>
		</div>
    	<div class="col-md-4">
		    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>
		</div>
	</div>

    <div class="row">
    	<div class="col-md-6">
		    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>
		</div>
    	<div class="col-md-4">
            <?= $form->field($model, 'image')->widget(ElfinderInput::className());?>
		</div>
	</div>

	<?= $form->field($model, 'bio')->widget(CKEditor::className(), [
	    'editorOptions' => \mihaildev\elfinder\ElFinder::ckeditorOptions('elfinder', [
            'allowedContent' => true,
	    	'preset' => 'textEditor'
	    ])
    ]);?>

	<?= $form->field($model, 'facts')->widget(CKEditor::className(), [
	    'editorOptions' => \mihaildev\elfinder\ElFinder::ckeditorOptions('elfinder', [
            'allowedContent' => true,
	    	'preset' => 'textEditor'
	    ])
    ]);?>

    <div class="block">
    	<h3>Цитаты</h3>
    	<div class="items">
	    	<?php if(isset($quotationModels) && !empty($quotationModels)) {
	    		foreach ($quotationModels as $i => $q) {
	    			echo $this->render('items/quotation', ['model' => $q, 'i' => $i]);
	    		}
	    	}?>
	    </div>
	    <a href="#" data-class="Quotation" class="add-item">Добавить</a>
    </div>

    <div class="block">
    	<h3>Увлечения и таланты</h3>
    	<div class="items">
	    	<?php if(isset($perkModels) && !empty($perkModels)) {
	    		foreach ($perkModels as $i => $q) {
	    			echo $this->render('items/perk', ['model' => $q, 'i' => $i]);
	    		}
	    	}?>
	    </div>
	    <a href="#" data-class="Perk" class="add-item">Добавить</a>
    </div>

    <div class="block">
    	<h3>Тезисы</h3>
    	<div class="items">
	    	<?php if(isset($thesisModels) && !empty($thesisModels)) {
	    		foreach ($thesisModels as $i => $q) {
	    			echo $this->render('items/thesis', ['model' => $q, 'i' => $i]);
	    		}
	    	}?>
	    </div>
	    <a href="#" data-class="Perk" class="add-item">Добавить</a>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php $script = "
    $(document).on('click', '.add-item', function() {
        var modelClass = $(this).data('class');
        var i = $(this).closest('.block').find('.item').length;
        var container = $(this).closest('.block').find('.items');

        $.ajax({
            type: 'GET',
            url: '".Url::toRoute(['/candidate/add-item'])."',
            data: 'modelClass='+modelClass+'&i='+i,
            success: function (data) {
            	container.append(data);
            }
        });

        return false;
    });

    $(document).on('click', '.block .remove', function() {
    	$(this).closest('.item').remove();

    	return false;
    });
";
$this->registerJs($script, yii\web\View::POS_END);?>