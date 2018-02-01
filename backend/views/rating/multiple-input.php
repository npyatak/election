<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'Добавить значения. Группа: '.$group->title;
$this->params['breadcrumbs'][] = ['label' => 'Рейтинги', 'url' => Url::toRoute(['/rating/index'])];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="create">
    <h1><?= Html::encode($this->title) ?></h1>
    <hr>

    <?php $form = ActiveForm::begin();?>
        <?php $candidatesArray = ArrayHelper::map($candidates, 'id', 'surname');
        foreach ($models as $key => $model):?>
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="right">
                    <?php if($model->candidate_id) {
                        echo $candidatesArray[$model->candidate_id];
                        echo Html::activeHiddenInput($model, "[$key]candidate_id");
                    } elseif($model->additional_id) {
                        echo $additionalIds[$model->additional_id];
                        echo Html::activeHiddenInput($model, "[$key]additional_id");
                    }?>
                    </h4>
                    <?php if($model->id) {
                        echo Html::activeHiddenInput($model, "[$key]id");
                    }?>
                </div>
                <div class="col-sm-6">
                    <div class="form-group <?=$model->hasErrors("score") ? 'has-error' : '';?>">
                        <?= Html::activeTextInput($model, "[$key]score", ['class' => 'form-control']) ?>
                        <?= Html::error($model, "[$key]score", ['class' => 'help-block']);?>
                    </div>
                </div>
            </div>
        <?php endforeach;?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>