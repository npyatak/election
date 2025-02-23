<?php
use yii\helpers\Url;
use yii\helpers\Html;
use frontend\assets\AppAsset;

use common\models\Candidate;
use common\models\Settings;

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

    <?php $share = isset($this->params['share']) ? $this->params['share'] : Yii::$app->params['defaultShare'];?>

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
                            <li><a href="<?=Url::toRoute(['site/candidates'])?>">Кандидаты</a></li>
                            <li><a href="<?=Url::toRoute(['site/calendar']);?>">Календарь выборов</a></li>
                            <?php if(Yii::$app->settings->get('mainPage') == Settings::INDEX_ORIGINAL):?>
                            <li><a href="<?=Url::toRoute(['site/rating']);?>">Рейтинги</a></li>
                            <?php endif;?>
                            <li><a href="<?=Url::toRoute(['site/faq']);?>">Что нужно знать</a></li>
                            <li><a href="<?=Url::toRoute(['site/test']);?>">Тест</a></li>
                            <li><a href="http://tass.ru/vybory-prezidenta-rf-2018" target="_blank">Новости</a></li>
                            <li><a href="<?=Url::toRoute(['site/inauguration']);?>">Инаугурация</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
	    
        <?= $content ?>
    </div>
    

    <?php if(!in_array(Yii::$app->controller->action->id, ['test', 'calendar', 'error'])):?>
    <footer>
        <div class="container">
            <div class="vertical-title">Будь в курсе</div>
            <div class="footer-inner clearfix">
                <div class="pull-left">
                    <h4>ТАСС в социальных сетях</h4>
                    <div class="share-wrap">
                        <a rel="nofollow" href="https://vk.com/tassagency" class="share-btn" target="_blank"><i class="fa fa-vk"></i></a>
                        <a rel="nofollow" href="https://www.facebook.com/tassagency" class="share-btn" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a rel="nofollow" href="https://twitter.com/tass_agency" class="share-btn" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a rel="nofollow" href="https://t.me/tass_agency" class="share-btn" target="_blank"><i class="fa fa-telegram"></i></a>
                    </div>
                </div>
                <div class="pull-right">
                    <div class="right">
                        <div class="copyright-blocks">
                            <div class="copyright">
                                <p>
                                    <span class="title">Над проектом работали:</span> автор:&nbsp;Дмитрий&nbsp;Трунов, редактор:&nbsp;Александр&nbsp;Бычков, продюсер:&nbsp;Антон&nbsp;Дуковский, иллюстраторы: Константин Каковкин, Екатерина Седогина, дизайнер:&nbsp;Илья&nbsp;Чикунов.<br>
                                    Проект подготовлен при участии редакции ТАСС-Досье.
                                </p>
                            </div>
                            <div class="copyright">
                                <p>
                                    <span>Источники:</span>
                                    <a rel="nofollow" href="https://2018.yavlinsky.ru/" target="_blank">2018.yavlinsky.ru</a>,
                                    <a rel="nofollow" href="http://cikrf.ru/" target="_blank">cikrf.ru</a>,
                                    <a rel="nofollow" href="http://www.duma.gov.ru/" target="_blank">duma.gov.ru</a>,
                                    <a rel="nofollow" href="http://grudininkprf.ru/" target="_blank">grudininkprf.ru</a>,
                                    <a rel="nofollow" href="http://komros.info/" target="_blank">komros.info</a>,
                                    <a rel="nofollow" href="https://kprf.ru/" target="_blank">kprf.ru</a>,
                                    <a rel="nofollow" href="http://kremlin.ru/" target="_blank">kremlin.ru</a>,
                                    <a rel="nofollow" href="https://ldpr.ru/" target="_blank">ldpr.ru</a>,
                                    <a rel="nofollow" href="https://rost.ru/" target="_blank">rost.ru</a>,
                                    <a rel="nofollow" href="http://roststrategy.ru/" target="_blank">roststrategy.ru</a>,
                                    <a rel="nofollow" href="https://sobchakprotivvseh.ru/" target="_blank">sobchakprotivvseh.ru</a>,
                                    <a rel="nofollow" href="http://sovhozlenina.ru/" target="_blank">sovhozlenina.ru</a>,
                                    <a rel="nofollow" href="https://wciom.ru/" target="_blank">wciom.ru</a>,
                                    <a rel="nofollow" href="https://www.yabloko.ru/" target="_blank">yabloko.ru</a>,
                                    <a rel="nofollow" href="https://www.yavlinsky.ru/" target="_blank">yavlinsky.ru</a>,
                                    Пресс-служба президента РФ, 
                                    Пресс-служба Президентской библиотеки
                                </p>
                            </div>
                            <div class="copyright">
                                <p>
                                    ТАСС информационное агентство (св-во о регистрации СМИ № 03247 выдано 02 апреля 1999 г. Государственным комитетом Российской Федерации по печати). Отдельные публикации могут содержать информацию, не предназначенную для пользователей до 16 лет.<br>
                                    <b>&#169;</b> ТАСС 2018
                                </p>
                            </div>
                        </div>
                        <div class="footer-logo">
                            <a rel="nofollow" href="http://tass.ru" target="_blank"></a>
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
