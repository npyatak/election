<?php
use yii\helpers\Html;

$this->title = 'Добавить кандидата';
$this->params['breadcrumbs'][] = ['label' => 'Кандидаты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="create">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'quotationModels' => $quotationModels,
        'perkModels' => $perkModels,
        'thesisModels' => $thesisModels,
    ]) ?>
</div>
