<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */

/* @var $exception Exception */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = $name;
$this->context->layout = 'error';

$this->registerCssFile(Url::toRoute('css/404.css'));
?>

<div class="not-found">
    <h1 class="not-found__title">Страница не найдена</h1>
    <p class="not-found__subtitle">
        Такой страницы не существует. Возможно неверно указан адрес или страница удалена.
    </p>
    <a href="<?=Url::home();?>" class="btn btn-green btn-h40 btn-w200" style="font-size: 16px;">
        На главную
    </a>
</div>