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
                    <a href="" class="btn btn-green btn-h50 btn-w240">Календарь выборов</a>
                </div>
                <div class="right-block">
                    <img src="/images/icons/kreml.svg" alt="Kreml">
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
                        <div id="news-slider" class="owl-carousel">
                            <div class="news-item">
                                <div class="news-item_date">18 декабря, 11:24</div>
                                <div class="news-item_title">
                                    <a href="">Памфилова дала старт президентской избирательной кампании</a>
                                </div>
                            </div>
                            <div class="news-item">
                                <div class="news-item_date">18 декабря, 11:24</div>
                                <div class="news-item_title">
                                    <a href="">Памфилова назвала бессмысленными попытки публичного давления на ЦИК</a>
                                </div>
                            </div>
                            <div class="news-item">
                                <div class="news-item_date">18 декабря, 11:24</div>
                                <div class="news-item_title">
                                    <a href="">Инициативная группа по выдвижению Путина в президенты соберется 26 декабря на ВДНХ</a>
                                </div>
                                <a href="" class="all-news">Все новости</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="right-info">
                <div class="right-title">
                    <h4><?=$rating->title;?></h4>
                    <p><?=$rating->subtitle;?></p>
                </div>
                <div class="right-content">
                    <ul>
                        <?php foreach ($ratingResults as $result):?>
                            <?php $title = $result['candidate_id'] ? $candidates[$result['candidate_id']]->surname : RatingItem::getAdditionalArray()[$result['additional_id']];?>
                            <li>
                                <div class="left-li"><?=$title;?></div>
                                <div class="right-li"><?=$result['score'];?>%</div>
                            </li>
                        <?php endforeach;?>
                    </ul>
                    <a href="" class="btn btn-h50 btn-w200 btn-purple">Подробнее</a>
                </div>
            </div>
            <div class="tests">
                <div class="test-item">
                    <h3 class="test-title"><?=$testText->title;?></h3>
                    <div class="test-text"><p><?=$testText->subtitle;?></p></div>
                    <a href="<?=Url::toRoute(['site/test']);?>" class="btn btn-h50 btn-w200 btn-white"><?=$testText->button_title;?></a>
                    <?php if($testText->image):?>
                        <div class="test-image">
                            <img src="<?=$testText->image;?>" alt="Amphora">
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
        <div class="vertical-title">Что нужно знать?</div>
        <div class="faq-inner">
            <?php foreach ($cards as $card):?>
	            <a href="<?=$card->url;?>" class="faq-item">
	                <h3><?=$card->title;?></h3>
	            </a>
	        <?php endforeach;?>
        </div>
        <div class="faq-bottom">
            <div>
                <a href="<?=Url::toRoute(['site/cards']);?>">Все вопросы<i class="fa fa-angle-right"></i></a>
            </div>
        </div>
    </div>
</div>