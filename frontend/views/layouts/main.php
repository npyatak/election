<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Url;
use yii\helpers\Html;
use frontend\assets\AppAsset;

use common\models\Candidate;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7"> -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?=Yii::$app->name;?> - <?=Html::encode($this->title);?></title>
    <?php $this->head() ?>
    <?php if($_SERVER['HTTP_HOST'] !== 'election.local'):?>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-KX9ZXT');</script>
    <!-- End Google Tag Manager -->
    <?php endif;?>
</head>
<body>
<?php $this->beginBody() ?>

    <?php $share = isset($this->params['share']) ? $this->params['share'] : ['text' => '', 'title' => 'title', 'url' => Url::current([], true), 'image' => '', 'twitter' => ''];?>

    <?php if($_SERVER['HTTP_HOST'] !== 'election.local'):?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KX9ZXT"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php endif;?>

    <div id="loaders">
        <div class="loader-container square-rotate-3d">
            <div class="loader">
                <div class="square"></div>
            </div>
        </div>
    </div>

    <div class="wrapper">
        <div class="main-menu">
            <div class="main-menu_inner">
                <div class="pull-left">
                    <a href="http://tass.ru" target="_blank" class="logo"></a>
                    <div class="slogan"><a href="/">Выборы президента России</a></div>
                </div>
                <div class="pull-right">
                    <ul class="main-menu_buttons">
                        <li><a href="" class="main-menu_btn"><i class="fa fa-bars"></i></a></li>
                        <li><a href="" class="main-share_btn"><i class="fa fa-share-alt"></i></a>
                            <div class="share-buttons"><?=\frontend\widgets\share\ShareWidget::widget(['share' => $share]);?></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="hidden-menu">
            <div id="hidden-menu_btn">
                <i class="fa fa-close"></i>
            </div>
            <div class="hidden-menu_inner">
                <div class="container">
                    <div class="left">
                        <ul>
                            <li><a href="<?=Url::home();?>">Главная</a></li>
                            <li><a href="<?=Url::home();?>#candidates">Кандидаты</a></li>
                            <li><a href="<?=Url::toRoute(['site/calendar']);?>">Календарь выборов</a></li>
                            <!-- <li><a href="<?=Url::toRoute(['site/rating']);?>">Рейтинги</a></li> -->
                            <li><a href="<?=Url::toRoute(['site/faq']);?>">Что нужно знать</a></li>
                            <li><a href="<?=Url::toRoute(['site/test']);?>">Тест</a></li>
                            <li><a href="http://tass.ru/vybory-prezidenta-rf-2018" target="_blank">Новости ТАСС</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
	    
        <?= $content ?>
    </div>
    

    <?php if(!in_array(Yii::$app->controller->action->id, ['test', 'calendar'])):?>
    <footer>
        <div class="container">
            <div class="vertical-title">Будь в курсе</div>
            <div class="footer-inner clearfix">
                <div class="pull-left">
                    <h4>ТАСС в социальных сетях</h4>
                    <div class="share-wrap">
                        <a href="https://vk.com/tassagency" class="share-btn" target="_blank"><i class="fa fa-vk"></i></a>
                        <a href="https://www.facebook.com/tassagency" class="share-btn" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="https://twitter.com/tass_agency" class="share-btn" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="https://t.me/tass_agency" class="share-btn" target="_blank"><i class="fa fa-telegram"></i></a>
                    </div>
                </div>
                <div class="pull-right">
                    <div class="right">
                        <div class="copyright">
                            <p>Над проектом работали:</p>
                            <ul>
                                <li>Автор: Дмитрий Трунов</li>
                                <li>Редактор: Александр Бычков</li>
                                <li>Продюсер: Антон Дуковский</li>
                                <li>Иллюстратор: Константин Каковкин</li>
                                <li>Дизайнер: Илья Чикунов</li>
                            </ul>
                        </div>
                        <div class="copyright">
                            <p>Источники:</p>
                            <p><a href="http://tass.ru/tass-dos-e-biografii" target="_blank">ТАСС-Досье</a>,
                                <a href="https://2018.yavlinsky.ru/" target="_blank">2018.yavlinsky.ru</a>,
                                <a href="http://cikrf.ru/" target="_blank">cikrf.ru</a>,
                                <a href="http://www.duma.gov.ru/" target="_blank">duma.gov.ru</a>,
                                <a href="http://grudininkprf.ru/" target="_blank">grudininkprf.ru</a>,
                                <a href="http://komros.info/" target="_blank">komros.info</a>,
                                <a href="https://kprf.ru/" target="_blank">kprf.ru</a>,
                                <a href="http://kremlin.ru/" target="_blank">kremlin.ru</a>,
                                <a href="https://ldpr.ru/" target="_blank">ldpr.ru</a>,
                                <a href="https://rost.ru/" target="_blank">rost.ru</a>,
                                <a href="http://roststrategy.ru/" target="_blank">roststrategy.ru</a>,
                                <a href="https://sobchakprotivvseh.ru/" target="_blank">sobchakprotivvseh.ru</a>,
                                <a href="http://sovhozlenina.ru/" target="_blank">sovhozlenina.ru</a>,
                                <a href="https://wciom.ru/" target="_blank">wciom.ru</a>,
                                <a href="https://www.yabloko.ru/" target="_blank">yabloko.ru</a>,
                                <a href="https://www.yavlinsky.ru/" target="_blank">yavlinsky.ru</a>
                            </p>
                        </div>
                        <div class="footer-logo">
                            <a href="http://tass.ru" target="_blank"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <?php endif;?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
