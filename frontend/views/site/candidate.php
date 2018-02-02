<?php 
use yii\helpers\Url;

use common\models\Candidate;

$this->registerJsFile(Url::toRoute('js/player/jwplayer.js'), ['depends' => [\yii\web\JqueryAsset::className()]]);

$this->params['share'] = [
    'text' => $candidate->share_text, 'title' => $candidate->share_title, 'url' => Url::current([], true), 'image' => Url::to($candidate->share_image, true), 'twitter' => $candidate->share_twitter
];?>

<div class="candidate-detail">
    <div class="candidate-detail_top">
        <div class="container">
            <div class="left">
                <div class="inner">
                    <h1><?=$candidate->name;?> <br><?=$candidate->surname;?></h1>
                    <p class="intro"><?=$candidate->status;?></p>
                    <div class="bottom">
                        <div class="candidate-detail_info">
                            <div class="candidate-percent">
                                <?php if($candidate->active == Candidate::QUIT):?>
                                    <span class="">Выбыл(а) из президентской гонки</span>
                                <?php else:?>
                                    <span class="number"><?=isset($ratingResults[$candidate->id]) ? $ratingResults[$candidate->id]['score'] : '';?>%</span>
                                    <span class="place"><?=$candidatePlace;?> место из <?=count($ratingResults);?></span>
                                <?php endif;?>
                            </div>
                            <div class="candidate-rating">
                                <p>Рейтинг кандидата по данным ВЦИОМ от <?=$rating->date;?></p>
                                <div class="question-icon popup-open">
                                    <div class="question-popup">
                                        <p><?=$rating->text;?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="inner">
                    <img src="<?=$candidate->image;?>" alt="<?=$candidate->name;?> <?=$candidate->surname;?>">
                </div>
                <?php if($candidate->video_list_1 || $candidate->video_list_2):?>
                    <span class="play"><i class="fa fa-play"></i><span class="text">Видео</span></span>
                <?php endif;?>
            </div>
            <div class="bottom">
                <div class="candidate-detail_info">
                    <div class="candidate-percent">
                        <span class="number"><?=isset($ratingResults[$candidate->id]) ? $ratingResults[$candidate->id]['score'] : '';?>%</span>
                        <span class="place"><?=$candidatePlace;?> место из <?=count($ratingResults);?></span>
                    </div>
                    <div class="candidate-rating">
                        <p>Рейтинг кандидата по данным <?=$rating->subtitle;?></p>
                        <span class="question-icon popup-open"></span>
                        <div class="question-popup">
                            <p><?=$rating->text;?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="candidate-detail_middle">
        <div class="desktop">
            <div class="container">
                <div class="left">
                    <div class="inner">
                        <div class="biography">
                            <div class="block"><?=$candidate->bio_1;?></div>
                            <div class="block"><?=$candidate->bio_2;?></div>
                            <div class="block"><?=$candidate->bio_3;?></div>
                            <div class="block"><?=$candidate->bio_4;?></div>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <?php if($candidate->facts):?>
                        <div class="candidate-statistics">
                            <div class="inner">
                                <?=$candidate->facts;?>
                            </div>
                            <div class="right-sw"></div>
                        </div>
                    <?php endif;?>
                    <?php if($candidate->theses):?>
                        <div class="candidate-quotes">
                            <div class="inner">
                                <div id="candidate-quotes" class="owl-carousel">
                                    <?php foreach ($candidate->theses as $t):?>
                                        <div class="item">
                                            <h3 class="candidate-quotes_title"><?=$t->title;?></h3>
                                            <h3 class="quotes-text"><?=$t->text;?></h3>
                                            <div class="quotes-date"><?=$t->caption;?></div>
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
                                                    <h3 class="candidate-hobbies_title"><?=$perk->text;?></h3>
                                                    <?php if($perk->image):?>
                                                        <div class="candidate-hobbies_img">
                                                            <img src="<?=$perk->image;?>">
                                                        </div>
                                                    <?php endif;?>
                                                </div>
                                        <?php else:?>
                                                <div class="bottom">
                                                    <h3 class="candidate-hobbies_title"><?=$perk->text;?></h3>
                                                    <?php if($perk->image):?>
                                                        <div class="candidate-hobbies_img">
                                                            <img src="<?=$perk->image;?>">
                                                        </div>
                                                    <?php endif;?>
                                                </div>
                                            </div>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                    <?php if(count($candidate->perks) % 2 == 1):?>
                                            </div>
                                    <?php endif;?>
                                </div>
                            </div>
                            <div class="right-sw"></div>
                        </div>
                    <?php endif;?>

                </div>
            </div>
        </div>
        <div class="mobile">
            <div class="container left">
                <div class="mobile-block">
                    <div class="biography">
                        <div class="block"><?=$candidate->bio_1;?></div>
                    </div>
                    <?php if($candidate->facts):?>
                        <div class="candidate-statistics">
                            <div class="inner">
                                <?=$candidate->facts;?>
                            </div>
                            <div class="right-sw"></div>
                        </div>
                    <?php endif;?>
                </div>
                <div class="mobile-block">
                    <div class="biography">
                        <div class="block"><?=$candidate->bio_2;?></div>
                    </div>
                    <?php if($candidate->quotations):?>
                        <div class="candidate-quotes">
                            <div class="inner">
                                <h3 class="candidate-quotes_title">Известные цитаты</h3>
                                <div id="candidate-quotes_mobile" class="owl-carousel">
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
                </div>
                <div class="mobile-block">
                    <div class="biography">
                        <div class="block"><?=$candidate->bio_3;?></div>
                    </div>
                    <?php if($candidate->perks):?>
                        <div class="candidate-hobbies">
                            <div class="inner">
                                <h3 class="candidate-hobbies_title">Увлечения и таланты</h3>
                                <div id="candidate-hobbies_mobile">
                                    <?php foreach ($candidate->perks as $key => $perk):?>
                                        <?php if($key % 2 == 0):?>
                                            <div class="item">
                                            <div class="top">
                                                <h3 class="candidate-hobbies_title"><?=$perk->text;?></h3>
                                                <?php if($perk->image):?>
                                                    <div class="candidate-hobbies_img">
                                                        <img src="<?=$perk->image;?>">
                                                    </div>
                                                <?php endif;?>
                                            </div>
                                        <?php else:?>
                                            <div class="bottom">
                                                <h3 class="candidate-hobbies_title"><?=$perk->text;?></h3>
                                                <?php if($perk->image):?>
                                                    <div class="candidate-hobbies_img">
                                                        <img src="<?=$perk->image;?>">
                                                    </div>
                                                <?php endif;?>
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
                <div class="mobile-block">
                    <div class="biography">
                        <div class="block"><?=$candidate->bio_4;?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?=$this->render('_candidates', ['candidates' => $candidates]);?>

<div class="video-modal">
    <div class="play-close"><i class="fa fa-close"></i></div>
    <div class="video-modal_inner">
        <div id="candidate-video"></div>
    </div>
</div>

<?php 
$script = "
    $(document).ready(function () {
        jwplayer.key='btTjXiuYZsRbqAVggNOhFFVcP3mvO2KkI2kx4w==';
            jwplayer('candidate-video').setup({
                'width': '100%',
                'aspectratio': '16:9',
                'bufferlength': '3',
                'stretching': 'uniform',
                'primary': 'flash',
                'autostart': 'false',
                'duration': '',
                'playlist': [{
                    'image': '/frontend/web/images/footer_gallery_img_new.jpg',
                    'sources': [
                        {file: '".$candidate->video_list_1."'},
                        {file: '".$candidate->video_list_2."'},
                    ]
                }]
            });
    })
";

$this->registerJs($script, yii\web\View::POS_END);?>
