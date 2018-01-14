<?php
use yii\helpers\Html;

$this->title = 'Изменить событие в календаре: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Календарь', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>

<div class="update">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
