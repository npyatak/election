<?php
use yii\helpers\Html;

$this->title = 'Изменить кандидата: ' . $model->nameAndSurname;
$this->params['breadcrumbs'][] = ['label' => 'Кандидаты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nameAndSurname, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>

<div class="update">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'quotationModels' => $quotationModels,
        'perkModels' => $perkModels,
        'thesisModels' => $thesisModels,
    ]) ?>
</div>
