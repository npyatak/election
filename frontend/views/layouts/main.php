<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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

    <?php if($_SERVER['HTTP_HOST'] !== 'election.local'):?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KX9ZXT"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php endif;?>

    <div class="wrapper">
        <div class="main-menu">
            <div class="main-menu_inner">
                <div class="pull-left">
                    <a href="" class="logo"></a>
                </div>
                <div class="pull-right">
                    <ul class="main-menu_buttons">
                        <li><a href="" class="main-menu_btn"><i class="fa fa-bars"></i></a></li>
                        <li><a href="" class="main-share_btn"><i class="fa fa-share-alt"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
	    
        <?= $content ?>
    </div>
    


    <?php if(Yii::$app->controller->action->id !== 'test'):?>
    <footer>
        <div class="container">
            <div class="vertical-title">Будь в курсе</div>
            <div class="footer-inner clearfix">
                <div class="pull-left">
                    <h4>ТАСС в социальных сетях</h4>
                    <div class="share-wrap">
                        <a href="https://vk.com/tassagency" class="share-btn" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="https://www.facebook.com/tassagency" class="share-btn" target="_blank"><i class="fa fa-vk"></i></a>
                        <a href="https://twitter.com/tass_agency" class="share-btn" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="https://t.me/tass_agency" class="share-btn" target="_blank"><i class="fa fa-telegram"></i></a>
                    </div>
                </div>
                <div class="pull-right">
                    <div class="right">
                        <div class="copyright">
                            <p>Копирайты про ТАСС, откуда взяли данные рейтингов, фотки ну и вот это вот всё</p>
                        </div>
                        <div class="footer-logo">
                            <a href=""></a>
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
