<?php
use yii\helpers\Url;

use common\models\RatingItem;
?>

<header>
    <div class="container">
        <div class="left">
            <div class="top">
                <div class="left-block">
                    <h1>18 марта 2018</h1>
                    <h2>День выборов президента России</h2>
                    <a href="<?=Url::toRoute(['site/calendar']);?>" class="btn btn-green btn-h50 btn-w240">Календарь выборов</a>
                </div>
                <div class="right-block">
                    <img src="/images/icons/kremlin_general.svg" alt="Kremlin">
                </div>
            </div>
            <div class="bottom">
                <div class="header-timeLine">
                    <div class="header-timeLine_top">
                        <?php foreach ($calendar as $c):?>
                            <div class="item">
                                <a href="<?=$c->url;?>"><?=$c->viewDate;?></a>
                            </div>
                        <?php endforeach;?>
                    </div>
                    <div class="header-timeLine_middle">
                        <div class="dotted"></div>
                        <div class="green-dot"></div>
                        <span class="dot dot-1"></span>
                        <span class="dot dot-2"></span>
                        <span class="dot dot-3"></span>
                        <span class="dot dot-4"></span>
                    </div>
                    <div class="header-timeLine_bottom">
                        <?php foreach ($calendar as $c):?>
                            <div class="item">
                                <p><?=$c->title;?></p>
                            </div>
                        <?php endforeach;?>
                    </div>
                    <div class="left-sw"></div>
                </div>
                <div class="news">
                    <div><h4 class="title">Новости</h4></div>
                    <div class="news_inner">
                        <?php if($news):?>
                            <div id="news-slider" class="owl-carousel">
                                <?php foreach ($news as $n):?>
                                    <div class="news-item">
                                        <div class="news-item_date"><?=$n->viewDate;?></div>
                                        <div class="news-item_title">
                                            <a href="<?=$n->url;?>" target="_blank"><?=$n->title;?></a>
                                        </div>
                                        <a href="http://tass.ru/vybory-prezidenta-rf-2018" class="all-news" target="_blank">Все новости</a>
                                    </div>
                                <?php endforeach;?>
                            </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="right-info">
                <div class="right-title">
                    <h4>
                        <?=$rating->title;?>
                        <div class="question-icon">
                            <i></i>
                            <div class="question-popup">
                                <p><?=$rating->text;?></p>
                                <span class="question-close">Закрыть</span>
                            </div>
                        </div>
                    </h4>
                    <p>Опрос ВЦИОМ <?=$rating->date;?></p>
                </div>
                <div class="right-content">
                    <ul>
                        <?php foreach ($ratingResults as $result):?>
                            <?php $title = $result['candidate_id'] ? $candidates[$result['candidate_id']]->surname : RatingItem::getAdditionalArray()[$result['additional_id']];?>
                            <li>
                                <div class="left-li"><?=$title;?></div>
                                <div class="right-li <?php if($result['no_poll']):?>off<?php endif;?>">
                                    <?php if($result['no_poll']):?>
                                        <div class="question-icon">
                                            <i></i>
                                            <div class="question-popup">
                                                <p>Опрос не проводился</p>
                                                <span class="question-close">Закрыть</span>
                                            </div>
                                        </div>
                                    <?php else:?>
                                        <?=$result['score'].'%';?>
                                    <?php endif;?>
                                </div>
                            </li>
                        <?php endforeach;?>
                    </ul>
                    <a href="<?=Url::toRoute(['site/rating']);?>" class="btn btn-h50 btn-w200 btn-purple">Подробнее</a>
                </div>
            </div>
            <div class="tests">
                <div class="test-item">
                    <h3 class="test-title"><?=$testText->title;?></h3>
                    <div class="test-text"><p><?=$testText->subtitle;?></p></div>
                    <a href="<?=Url::toRoute(['site/test']);?>" class="btn btn-h50 btn-w200 btn-white"><?=$testText->button_title;?></a>
                    <?php if($testText->image):?>
                        <div class="test-image">
                            <img src="<?=$testText->image;?>">
                        </div>
                    <?php endif?>
                </div>
            </div>
        </div>
    </div>
</header>

<?=$this->render('_candidates', ['candidates' => $candidates]);?>

<div class="faq">
    <div class="container">
        <div class="vertical-title">Что нужно знать <span>о выборах</span></div>
        <div class="faq-inner">
            <?php foreach ($cards as $card):?>
	            <a href="<?=$card->url;?>" class="faq-item">
	                <h4><?=$card->title;?></h4>
	            </a>
	        <?php endforeach;?>
        </div>
        <div class="faq-bottom">
            <div>
                <a href="<?=Url::toRoute(['site/faq']);?>">Все вопросы<i class="fa fa-angle-right"></i></a>
            </div>
        </div>
    </div>
</div>
<style>
    .main-menu .slogan {
        display: none;
    }
    .main-menu.shadow .slogan {
        display: block;
    }
    @media (max-width: 767px){
        .main-menu .slogan {
            display: block !important;
        }
    }
</style>