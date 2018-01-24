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
		    <?= $form->field($model, 'status')->textInput() ?>
		</div>
        <div class="col-md-3">
            <?= $form->field($model, 'alias')->textInput() ?>
        </div>
    	<div class="col-md-3">
            <?= $form->field($model, 'image')->widget(ElfinderInput::className());?>
		</div>
	</div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'video_list_1')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'video_list_2')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

	<?= $form->field($model, 'bio_1')->widget(CKEditor::className(), [
	    'editorOptions' => \mihaildev\elfinder\ElFinder::ckeditorOptions('elfinder', [
            'allowedContent' => true,
	    	'preset' => 'textEditor'
	    ])
    ]);?>

    <?= $form->field($model, 'bio_2')->widget(CKEditor::className(), [
        'editorOptions' => \mihaildev\elfinder\ElFinder::ckeditorOptions('elfinder', [
            'allowedContent' => true,
            'preset' => 'textEditor'
        ])
    ]);?>

    <?= $form->field($model, 'bio_3')->widget(CKEditor::className(), [
        'editorOptions' => \mihaildev\elfinder\ElFinder::ckeditorOptions('elfinder', [
            'allowedContent' => true,
            'preset' => 'textEditor'
        ])
    ]);?>

    <?= $form->field($model, 'bio_4')->widget(CKEditor::className(), [
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

    <hr>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'share_title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'share_image')->widget(ElfinderInput::className());?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-7">
            <?= $form->field($model, 'share_text')->textarea() ?>
        </div>
        <div class="col-md-5">
            <?= $form->field($model, 'share_twitter')->textInput();?>
        </div>
    </div>

    <hr>
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
	    <a href="#" data-class="Thesis" class="add-item">Добавить</a>
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