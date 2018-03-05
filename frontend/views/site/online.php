<?php
use frontend\assets\OnlineAsset;

use common\models\Candidate;

OnlineAsset::register($this);
?>

<div class="fh-page hide-mobile">
    <div class="fh-page__header">
        <div class="left-part">
            <div class="text">
                <h1 class="text__title">
                    Первые избирательные <br/>
                    участки открылись <br/>
                    на Камчатке и Чукотке
                </h1>
                <p class="text__subtitle">
                    В Москве еще поздняя ночь, избирательные участки начнут работу через $ часов
                </p>
            </div>
        </div>
        <div class="right-part">
            <div class="online-block">
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
                        Следите за выборами вместе с нами в прямом эфире 24 на 7, 2к18. Заголовок трансляции и все такое.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="fh-page__middle">
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
        <div class="right-part">
            <div class="right-part__content">
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
</div>
<div class="fh-page hide-desktop">
    <div class="fh-page__header">
        <div class="left-part">
            <div class="text">
                <h1 class="text__title">
                    Первые избирательные <br/>
                    участки открылись <br/>
                    на Камчатке и Чукотке
                </h1>
                <p class="text__subtitle">
                    В Москве еще поздняя ночь, избирательные участки начнут работу через $ часов
                </p>
            </div>
        </div>
    </div>
    <div class="online-block">
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
                Следите за выборами вместе с нами в прямом эфире 24 на 7, 2к18. Заголовок трансляции и все такое.
            </p>
        </div>
        <button class="online-btn">
            Читать трансляцию
        </button>
    </div>
    <div class="fh-page__middle">
        <!-- взять слайдер из главной страницы -->
        <div class="right-part">
            <div class="right-part__content">
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
        <div class="left-part">
            <div class="left-part__content">
                <?php foreach ($candidates as $c):?>
                    <a href="<?=$c->url;?>" class="candidates-item">
                        <div class="candidates-img">
                            <img src="<?=$c->imageUrl;?>" alt="<?=$c->nameAndSurname;?>">
                        </div>
                        <div class="candidate">
                            <h4><?=$c->nameAndSurname;?></h4>
                        </div>
                    </a>
                <?php endforeach;?>
            </div>
        </div>
    </div>        
</div>