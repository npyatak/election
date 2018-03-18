<?php 
use yii\helpers\Url;

use common\models\Candidate;

$this->registerJsFile(Url::toRoute('js/player/jwplayer.js'), ['depends' => [\yii\web\JqueryAsset::className()]]);

$this->params['share'] = [
    'text' => $candidate->share_text, 'title' => $candidate->share_title, 'image' => $candidate->share_image, 'twitter' => $candidate->share_twitter
];?>
<style>
@media screen and (min-width: 1280px) {
 .stickydiv {
        position: fixed!important;
        top: 0;
        z-index: 6;
        margin-top: 12px;
        right: 0;
    }
    .candidate-quotes {
        max-width: 600px;
    }
    .candidate-quotes .owl-nav {
        /*right: -100px;*/
        right: 0px;
    }
    .candidate-hobbies {
        max-width: 600px;
    }
    .candidate-hobbies .owl-nav {
        /*right: -50px;*/
        right: 0px;
    } 
}
   
</style>
<!-- <script src="/frontend/web/js/jquery-3.2.1.min.js" type="text/javascript"></script> -->
<!-- <script src="/frontend/web/js/jquery.scrollorama.js" type="text/javascript"></script> -->
<div class="candidate-detail">
    <div class="candidate-detail_top">
        <div class="container">
            <div class="left" id="left_top_offset">
                <div class="inner">
                    <h1><?=$candidate->name;?> <br><?=$candidate->surname;?></h1>
                    <p class="intro"><?=$candidate->status;?></p>
                    <div class="bottom">
                        <div class="candidate-detail_info">
                            <div class="candidate-percent <?php if(!$candidate->active == Candidate::QUIT || !$candidatePlace):?>off<?php endif;?>">
                                <?php if($candidate->active == Candidate::QUIT):?>
                                    <span class="candidate-off">Выбыл из президентской гонки</span>
                                <?php elseif(!$candidatePlace):?>
                                    <span class="candidate-off">Опрос не проводился</span>
                                <?php else:?>
                                    <span class="number"><?=isset($ratingResults[$candidate->id]) ? $ratingResults[$candidate->id]['score'] : '';?>%</span>
                                    <span class="place"><?=$candidatePlace;?> место из <?=count($ratingResults);?></span>
                                <?php endif;?>
                            </div>
                            <?php if ($candidate->active != Candidate::QUIT && $candidatePlace):?>
                            <div class="candidate-rating">
                                <p><?=$rating->date;?></p>
                            </div>
                            <?php endif;?>
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
                    <div class="candidate-percent <?php if($candidate->active != Candidate::QUIT || !$candidatePlace):?>off<?php endif;?>">
                        <?php if($candidate->active == Candidate::QUIT):?>
                            <span class="candidate-off">Выбыл из президентской гонки</span>
                        <?php elseif(!$candidatePlace):?>
                            <span class="candidate-off">Опрос не проводился</span>
                        <?php else:?>
                            <span class="number"><?=isset($ratingResults[$candidate->id]) ? $ratingResults[$candidate->id]['score'] : '';?>%</span>
                            <span class="place"><?=$candidatePlace;?> место из <?=count($ratingResults);?></span>
                        <?php endif;?>
                    </div>
                    <?php if ($candidate->active != Candidate::QUIT && $candidatePlace):?>
                    <div class="candidate-rating">
                        <p><?=$rating->date;?></p>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
    <div class="candidate-detail_middle">
        <div class="desktop">
            <div class="container">
                <div class="left">
                    <div class="inner" id="end">
                        <div class="biography">
                            <div class="block" id="left_1"><?=$candidate->bio_1;?></div>
                            <div class="block" id="left_2"><?=$candidate->bio_2;?></div>
                            <div class="block" id="left_3"><?=$candidate->bio_3;?></div>
                            <div class="block" id="left_4"><?=$candidate->bio_4;?></div>
                        </div>
                    </div>
                </div>
                <div class="right" id="right_1">
                    <?php if($candidate->facts):?>
                        <div class="candidate-statistics" >
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
                                <div id="candidate-quotes_mobile" class="owl-carousel">
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
            // var left_top_offset = $('#left_top_offset').height() + 150;
            // var left = $('#end');
            // var left_height = left.height();
            // var left_offset = left.offset().top;

            // var right = $('#right_1');
            // var right_height = right.height();

            // var right_side_height = 0;

            // right.children().each(function () {
            //     if (!$(this).hasClass('right-sw')) {
            //         right_side_height = right_side_height + $(this).height();
            //     }
            // });
            // var lastScrollTop = 0;
            // $(window).scroll(function() {
            //     var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
            //     var pos = $(window).scrollTop();

            //     if (width >= 1280) {

            //         var top_1 = $('#left_1').offset().top
            //         var h_1 = $('.candidate-statistics').height() + 90
            //         var top_2 = $('#left_2').offset().top
            //         var h_2 = $('.candidate-quotes').height() + 90
            //         if ($('#left_3')) {
            //             var top_3 = $('#left_3').offset().top
            //             var h_3 = $('.candidate-hobbies').height() + 90
            //         }
            //         if ($('#left_4')) {
            //             var top_3 = $('#left_3').offset().top
            //             var h_3 = $('.candidate-hobbies').height() + 90
            //             var top_4 = $('#left_4').offset().top
            //         }
            //         if ($('.candidate-hobbies').length === 0) {
            //             console.log('1');
            //             $('#right_1').css('transition', 'all ease-in .5s');

            //             var end2 = $('.candidate-quotes').offset().top + $('.candidate-quotes').height() + 50

            //             var end = $('#candidates').offset().top
            //             if (pos >= top_1 && pos < top_4) {

            //                 $('#right_1').css('transition', 'all ease-in .5s');
            //                 $('#right_1').css('z-index', '0');
            //                 $('#right_1').addClass('stickydiv');

            //             } else if (pos >= top_1 && pos >= top_4) {

            //                 $('#right_1').css('z-index', '0');
            //                 $('#right_1').css('transform', 'translateY(-' + ( h_1) + 'px)');

            //             } else {

            //                 $('#right_1').css('z-index', '0');
            //                 $('#right_1').removeClass('stickydiv');
            //                 $('#right_1').css('transform', 'translateY(0px)');

            //             }
            //             if (end2 >= end) {

            //                 $('#right_1').css('z-index', '-1');
                            
            //             } else $('#right_1').css('z-index', '0');


            //         } else if ($('.candidate-hobbies').length !== 0) {
            //             console.log('2');

            //             $('#right_1').css('transition', 'all ease-in .5s');

            //             var end2 = $('.candidate-hobbies').offset().top + $('.candidate-hobbies').height() + 50

            //             var end = $('#candidates').offset().top
            //             if (pos >= top_1 && pos < top_2 && pos < top_3 && pos < top_4) {

            //                 $('#right_1').css('z-index', '0');
            //                 $('#right_1').addClass('stickydiv');

            //             } else if (pos >= top_1 && pos >= top_2 && pos < top_3 && pos < top_4) {

            //                 $('#right_1').css('z-index', '0');
            //                 $('#right_1').css('transform', 'translateY(-' + h_1 + 'px)');

            //             } else if (pos >= top_1 && pos >= top_2 && pos >= top_3 && pos < top_4) {

            //                 $('#right_1').css('z-index', '0');
            //                 $('#right_1').css('transform', 'translateY(-' + (h_1 + h_2) + 'px)');

            //             } else if (pos >= top_1 && pos >= top_2 && pos >= top_3 && pos >= top_4) {

            //                 $('#right_1').css('transform', 'translateY(-' + (h_1 + h_2 + h_3) + 'px)');

            //             } else {

            //                 $('#right_1').css('z-index', '0');
            //                 $('#right_1').removeClass('stickydiv');
            //                 $('#right_1').css('transform', 'translateY(0px)');

            //             }
            //             if (end2 >= end) {

            //                 $('#right_1').css('z-index', '-1');
                            
            //             } else $('#right_1').css('z-index', '0');


            //         }
                    
                   
            //     }
            // });
    })
";

$this->registerJs($script, yii\web\View::POS_END);?>
