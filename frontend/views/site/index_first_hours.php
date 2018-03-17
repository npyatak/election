<?php
use frontend\assets\IndexFirstHoursAsset;

use common\models\Candidate;

IndexFirstHoursAsset::register($this);
?>

<div class="fh">
	<div class="fh-header">
		<div class="fh-left">
			<img src="<?=Yii::$app->settings->get('mainPageFirstResultsImage');?>"/>
	        <div class="text">
	            <h1 class="text__title">
	                <?=Yii::$app->settings->get('mainPageFirstResultsTitle');?>
	            </h1>
	            <p class="text__subtitle">
                    <?=Yii::$app->settings->get('mainPageFirstResultsText');?>
	            </p>
	        </div>
		</div>
		<div class="fh-right hide-mobile">
            <?php if(Yii::$app->settings->get('mainPageOnlineBlockText') != ''):?>
    			<a href="<?=Yii::$app->settings->get('mainPageOnlineBlockLink');?>" target="_blank" class="online-wrapper">
    	            <div class="onl-block" id="hide-mobile">
    	                <div class="top">
    	                    <h1 class="top__title">
    	                        Онлайн
    	                        <div class="top__oval">
    	                            <div class="oval-inner"></div>
    	                        </div>
    	                    </h1>
    	                </div>
    	                <div class="bottom">
    	                    <p class="bottom__text">
    	                    	<?=Yii::$app->settings->get('mainPageOnlineBlockText');?>
    	                    </p>
    	                </div>
    	            </div>
    	        </a>
            <?php endif;?>
		</div>
	</div>
    <?php if(Yii::$app->settings->get('mainPageOnlineBlockText') != ''):?>
    	<div class="fh-right hide-desktop">
    		<a class="online-wrapper" id="hide-desktop">
                <div class="onl-block" id="hide-desktop">
                    <div class="top">
                        <h1 class="top__title">
                            Онлайн
                            <div class="top__oval">
                                <div class="oval-inner"></div>
                            </div>
                        </h1>
                    </div>
                    <div class="bottom">
                        <p class="bottom__text">
                            <?=Yii::$app->settings->get('mainPageOnlineBlockText');?>
                        </p>
                    </div>
                    <a href="<?=Yii::$app->settings->get('mainPageOnlineBlockLink');?>" class="online-btn hide-desktop">
                        Читать трансляцию
                    </a>
                </div>
            </a>
    	</div>
    <?php endif;?>
	<div class="fh-page__middle">
		<div class="news right-part__content hide-desktop">
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
        <div class="left-part">
            <div class="left-part__content">
                <div class="left-part__title">
                    <h2 class="title">
                        Кандидаты
                    </h2>
                </div>
                <?php foreach ($candidates as $c):?>
                    <a href="<?=$c->url;?>" class="candidates-item">
                        <div class="candidates-img">
                            <img src="<?=$c->imageUrl;?>" alt="<?=$c->nameAndSurname;?>">
                        </div>
                        <div class="candidate">
                            <h4><?=$c->nameAndSurname;?></h4>
                            <?php if($c->active == Candidate::QUIT):?>
                            <p>
                                Выбыла из президентской гонки
                            </p>
                            <?php endif;?>
                        </div>
                    </a>
                <?php endforeach;?>
            </div>
        </div>
        <div class="right-part__content hide-mobile">
            <div class="right-part__title">
                <h2 class="title">
                    Новости
                </h2>
            </div>
            
            <?php if($news):?>
                <?php foreach ($news as $n):?>
                    <a href="<?=$n->url;?>" class="news-item">
                        <p class="item__time"><?=$n->viewDate;?></p>
                        <p class="item__text"><?=$n->title;?></p>                   
                    </a>
                <?php endforeach;?>
            <?php endif;?>
        </div>
    </div>  
</div>


