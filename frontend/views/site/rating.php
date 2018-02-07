<?php
use yii\helpers\Url;

use common\models\RatingGroup;
use common\models\RatingItem;
?>

<div class="rating-page">
    <div class="rating-page_top">
        <div class="container">
            <div class="tabs owl-carousel">
                <?php foreach ($ratings as $rating):?>
                    <div class="tab">
                        <a href="<?=Url::current(['group' => in_array($group, $rating->groupIds) ? $group : $rating->groupIds[0]]);?>" 
                            class="r_group <?=count($rating->groupIds) > 1 ? 'show-rating-cat' : '';?> <?=in_array($group, $rating->groupIds) ? 'active' : '';?>" 
                            id="<?=count($rating->groupIds) > 1 ? 'groupsTab' : '';?>"
                            data-group="<?=in_array($group, $rating->groupIds) ? $group : $rating->groupIds[0];?>"
                        >
                            <h4><?=$rating->title;?></h4>
                            <div class="question-icon_wrap">
                                <?php if($rating->subtitle):?>
                                    <span class="tab-span"><?=$rating->subtitle;?></span>
                                <?php endif;?>
                                <div class="question-icon">
                                    <i></i>
                                    <div class="question-popup">
                                        <p><?=$rating->text;?></p>
                                        <span class="question-close">Закрыть</span>
                                    </div>
                                </div>
                            </div>
                            <p>Опрос ВЦИОМ <?=$rating->date;?></p>
                        </a>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
    <div class="rating-page_bottom">
        <div class="mobile-rating-cat">
            <div class="container">
                <select class="selectpicker" data-style="btn-white" id="groups-select">
                    <?php $subcategoryLabels = RatingGroup::getSubCategoryArray();
                    foreach ($ratingGroups as $key => $groups):?>
                        <?php if($subcategoryLabels[$key] != ''):?>
                            <option value="" disabled="disabled"><?=$subcategoryLabels[$key];?>:</option>
                        <?php endif;?>
                        <?php foreach ($groups as $g):?>
                            <option data-group="<?=$g['id'];?>" value=""><?=$g['title'];?></option>
                        <?php endforeach;?>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <div class="container">
            <div id="rating-cat" class="owl-carousel <?=in_array($group, $ratingGroupIds) ? 'transform' : '';?>">
                <?php foreach ($ratingGroups as $key => $groups):?>
                    <div class="item">
                        <div class="rating-cat_title"><?=$subcategoryLabels[$key] != '' ? $subcategoryLabels[$key].':' : '';?></div>
                        <div class="rating-cat_els">
                            <?php foreach ($groups as $g):?>
                                <a href="<?=Url::current(['group' => $g['id']]);?>" class="r_group rating-cat_el <?=$group == $g['id'] ? 'active' : '';?>" data-group="<?=$g['id'];?>">
                                    <?=$g['title'];?>
                                </a>
                            <?php endforeach;?>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
            <div class="tab-content">
                <?php foreach ($candidates as $c):?>
                    <?php $score = isset($resultsArray[$group]) && isset($resultsArray[$group]['c'][$c->id]) ? $resultsArray[$group]['c'][$c->id] : 0;?>
                    <div class="rating-candidate type-candidate" data-candidate="<?=$c['id'];?>">
                        <a href="<?=$c->url;?>"><h4><?=$c->nameAndSurname;?></h4></a>
                        <span class="rating-percent <?=$score ? '' : 'off';?>">
                            <span class="percent" data-score="<?=$score;?>">
                                <?php if($score):?>
                                    <?=$score;?>%
                                <?php else:?>
                                    <div class="question-icon">
                                        <i></i>
                                        <div class="question-popup">
                                            <p>Опрос не проводился</p>
                                            <span class="question-close">Закрыть</span>
                                        </div>
                                    </div>
                                <?php endif;?>
                            </span>
                        </span>
                        <div class="rating-line">
                            <span style="width: <?=$score;?>"></span>
                        </div>
                    </div>
                <?php endforeach;?>
                <?php foreach (RatingItem::getAdditionalArray() as $key => $item):?>
                    <?php $score = isset($resultsArray[$group]) && isset($resultsArray[$group]['a'][$key]) ? $resultsArray[$group]['a'][$key] : 0;?>
                    <div class="rating-candidate type-additional" data-additional="<?=$key;?>">
                        <h4><?=$item;?></h4>
                        <span class="rating-percent <?=$score ? '' : 'off';?>">
                            <span class="percent" data-score="<?=$score;?>">
                                <?php if($score):?>
                                    <?=$score;?>%
                                <?php else:?>
                                    <div class="question-icon">
                                        <i></i>
                                        <div class="question-popup">
                                            <p>Опрос не проводился</p>
                                            <span class="question-close">Закрыть</span>
                                        </div>
                                    </div>
                                <?php endif;?>
                            </span>
                        </span>
                        <div class="rating-line">
                            <span style="width: <?=$score;?>"></span>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>

<?php 
$script = "
    var ratingResults = ".json_encode($resultsArray).";
    //console.log(ratingResults);

    $('.r_group').on('click', function(e) {
        group = $(this).attr('data-group');
        showGroupValue(group);
        if($(this).hasClass('rating-cat_el')) {
            $('#groupsTab').attr('href', '".Url::toRoute(['site/rating'])."?group='+group);
            $('#groupsTab').attr('data-group', group);
        } else {
            if($(this).hasClass('show-rating-cat')) {
                $('.rating-cat_el').removeClass('active');
                $('.rating-cat_el[data-group='+group+']').addClass('active');
            }
        }
    });
    
    $('#groups-select').on('change', function(e) {
        group = $(this).find('option:selected').data('group');
        showGroupValue(group);
        $('#groupsTab').attr('data-group', group);
        $('#groupsTab').attr('href', '".Url::toRoute(['site/rating'])."?group='+group);
    });
    
    var owl = $('.tabs');
    owl.owlCarousel({
        loop: false,
        autoplay: false,
        dots: false,
        navText: ['<i class=\"fa fa-angle-left\"></i>','<i class=\"fa fa-angle-right\"></i>'],
        responsive: {
            0: {
                margin: 0,
                items: 1,
                nav: true,
                touchDrag: true,
                mouseDrag: true,
            },
            1150: {
                margin: 0,
                items: 3,
                touchDrag: false,
                mouseDrag: false
            }
        }
    });   
    
    owl.on('changed.owl.carousel', function(event) {
        var index = event.item.index;
        group = $('.tab:eq('+index+')').find('a').data('group');
        $('body').find('.mobile-rating-cat').removeClass('transform');

        showGroupValue(group);
        $('#groupsTab').attr('href', '".Url::toRoute(['site/rating'])."?group='+group);
    });

    function showGroupValue(group) {
        window.history.pushState(null, '', '".Url::toRoute(['site/rating'])."?group='+group);
        if(typeof ratingResults[group] !== 'undefined') {
            $.each($('.rating-candidate'), function(key, value) {
                if(typeof $(this).data('candidate') !== 'undefined') {
                    score = ratingResults[group]['c'][$(this).data('candidate')];
                } else {
                    score = ratingResults[group]['a'][$(this).data('additional')];
                }
                if(score) {
                    $(this).find('.percent').html(score+'%');
                    $(this).find('.rating-line span').css({'width': score+'%'});
                } else {
                    $(this).find('.percent').html('<div class=\"question-icon\">'+
                            '<i></i>'+
                            '<div class=\"question-popup\">'+
                                '<p>Опрос не проводился</p>'+
                                '<span class=\"question-close\">Закрыть</span>'+
                            '</div>'+
                        '</div>');
                }
                $(this).find('.percent').attr('data-score', score);
            });
        } else {
            $('.rating-candidate').find('.percent').html('0');
            $('.rating-candidate').find('.rating-line span').css({'width': '0'});
        }
        orderResults();
    }

    function orderResults() {
        var orderRatingsCandidates = $('.rating-candidate.type-candidate').sort(function (a, b) {
            valueA = isNaN(parseInt($(a).find('.percent').data('score'))) ? 0 : parseInt($(a).find('.percent').data('score'));
            valueB = isNaN(parseInt($(b).find('.percent').data('score'))) ? 0 : parseInt($(b).find('.percent').data('score'));
            
            return valueA < valueB;
        });
        var orderRatingsAdditional = $('.rating-candidate.type-additional').sort(function (a, b) {
            return parseInt($(a).find('.percent').text()) < parseInt($(b).find('.percent').text());
        });
        $('.tab-content').html(orderRatingsCandidates);
        $('.tab-content').append(orderRatingsAdditional);
    }
    
    orderResults();
";

$this->registerJs($script, yii\web\View::POS_END);?>
