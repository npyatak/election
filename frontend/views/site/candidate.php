<div class="candidate-detail">
    <div class="candidate-detail_top">
        <div class="container">
            <div class="left">
                <div class="inner">
                    <h1><?=$candidate->name;?> <br><?=$candidate->surname;?></h1>
                    <p class="intro"><?=$candidate->status;?></p>
                </div>
            </div>
            <div class="right">
                <div class="inner">
                    <img src="/images/icons/fat-boy-smilingWhite.svg" alt="<?=$candidate->name;?> <?=$candidate->surname;?>">
                </div>
                <span class="play"><i class="fa fa-play"></i></span>
            </div>
            <div class="bottom">
                <div class="candidate-detail_info">
                    <div class="candidate-percent">
                        <span class="number"><?=isset($ratingResults[$candidate->id]) ? $ratingResults[$candidate->id]['score'] : '';?>%</span>
                        <span class="place"><?=$candidatePlace;?> место из <?=count($ratingResults);?></span>
                    </div>
                    <div class="candidate-rating">
                        <p><?=$rating->subtitle;?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="candidate-detail_middle">
        <div class="container">
            <div class="left">
                <div class="inner">
                    <div class="biography">
                        <?=$candidate->bio;?>
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="candidate-statistics">
                    <div class="inner">
                        <?=$candidate->facts;?>
                    </div>
                    <div class="right-sw"></div>
                </div>

                <?php if($candidate->quotations):?>
                <div class="candidate-quotes">
                    <div class="inner">
                        <h3 class="candidate-quotes_title">Известные цитаты</h3>
                        <div id="candidate-quotes" class="owl-carousel">
                            <?php foreach ($candidate->quotations as $q):?>
                                <div class="item">
                                    <h3 class="quotes-text"><?=$q->text;?></h3>
                                    <p class="quotes-date"><?=$q->caption;?></p>
                                </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                    <div class="right-sw"></div>
                </div><div class="right-sw"></div>
                <?php endif;?>

                <?php if($candidate->perks):?>
                <div class="candidate-hobbies">
                    <div class="inner">
                        <h3 class="candidate-hobbies_title">Увлечения и таланты</h3>
                        <div id="candidate-hobbies" class="owl-carousel">
                            <?php foreach ($candidate->perks as $key => $perk):?>
                                <?php if($key % 2 == 0):?>
                                <div class="item">
                                    <div class="top">
                                        <?php if($perk->image):?>
                                            <div class="candidate-hobbies_img">
                                                <img src="<?=$perk->image;?>">
                                            </div>
                                        <?php endif;?>
                                        <h3 class="candidate-hobbies_title"><?=$perk->text;?></h3>
                                    </div>
                                <?php else:?>
                                    <div class="bottom">
                                        <?php if($perk->image):?>
                                            <div class="candidate-hobbies_img">
                                                <img src="<?=$perk->image;?>">
                                            </div>
                                        <?php endif;?>
                                        <h3 class="candidate-hobbies_title"><?=$perk->text;?></h3>
                                    </div>
                                </div>
                                <?php endif;?>
                            <?php endforeach;?>
                        </div>
                    </div>
                    <div class="right-sw"></div>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>

<?php if($candidate->theses):?>
<div class="slick-slider_wrap">
    <div class="container">
        <div class="slick-slider">
            <?php foreach ($candidate->theses as $thesis):?>
                <div class="item">
                    <div class="container-grid">
                        <div class="slick-slider_title">
                            <h3><?=$thesis->title;?></h3>
                        </div>
                        <div class="slick-slider_text">
                            <h2 class="h1"><?=$thesis->text;?></h2>
                        </div>
                        <div class="slick-slider_caption">
                            <span><?=$thesis->caption;?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
        <div class="right-sw"></div>
    </div>
</div>
<?php endif;?>

<div class="candidates">
    <div class="container">
        <div class="vertical-title">Кандидаты</div>
        <div class="candidates-inner">
            <?php foreach ($candidates as $c):?>
                <a href="<?=$c->url;?>" class="candidates-item">
                    <div class="candidates-img">
                        <img src="<?=$c->image;?>" alt="<?=$c->nameAndSurname;?>">
                    </div>
                    <div class="candidate"><h4><?=$c->nameAndSurname;?></h4></div>
                </a>
            <?php endforeach;?>
        </div>
    </div>
</div>