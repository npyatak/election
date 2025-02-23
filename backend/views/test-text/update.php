<?php
use yii\helpers\Html;

$this->title = 'Изменить тексты: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Тексты теста', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>

<div class="update">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
