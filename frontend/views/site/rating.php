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
                        <a href="<?=Url::current(['group' => $rating->groupIds[0]]);?>" class="r_group <?=count($rating->groupIds) > 1 ? 'show-rating-cat' : '';?> <?=in_array($group, $rating->groupIds) ? 'active' : '';?>" data-group="<?=$rating->groupIds[0];?>">
                            <h4><?=$rating->title;?></h4>
                            <div class="question-icon_wrap">
                                <?php if($rating->subtitle):?>
                                    <span class="tab-span"><?=$rating->subtitle;?></span>
                                <?php endif;?>
                                <span class="question-icon popup-open"></span>
                                <div class="question-popup">
                                    <p><?=$rating->text;?></p>
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
                    <?php $score = isset($results[$group]) && isset($results[$group]['c'][$c->id]) ? $results[$group]['c'][$c->id] : 0;?>
                    <div class="rating-candidate" data-candidate="<?=$c['id'];?>">
                        <a href="<?=$c->url;?>"><h4><?=$c->nameAndSurname;?></h4></a>
                        <span class="rating-percent"><span class="percent"><?=$score;?></span>%</span>
                        <div class="rating-line">
                            <span style="width: <?=$score;?>%"></span>
                        </div>
                    </div>
                <?php endforeach;?>
                <?php foreach (RatingItem::getAdditionalArray() as $key => $item):?>
                    <?php $score = isset($results[$group]) && isset($results[$group]['a'][$key]) ? $results[$group]['a'][$key] : 0;?>
                    <div class="rating-candidate" data-additional="<?=$key;?>">
                        <h4><?=$item;?></h4>
                        <span class="rating-percent"><span class="percent"><?=$score;?></span>%</span>
                        <div class="rating-line">
                            <span style="width: <?=$score;?>%"></span>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>

<?php 
$script = "
    var results = ".json_encode($results).";
    //console.log(results);

    $('.r_group').on('click', function(e) {
        group = $(this).attr('data-group');
        showGroupValue(group);
        if($(this).hasClass('rating-cat_el')) {
            $('#groupsTab').attr('href', '".Url::toRoute(['site/rating'])."?group='+group);
            $('#groupsTab').attr('data-group', group);
        } else {
            if($(this).hasClass('show-rating-cat')) {
                $('.rating-cat_el[data-group='+group+']').addClass('active');
            }
        }
    });
    $('#groups-select').on('change', function(e) {
        group = $(this).find('option:selected').data('group');
        showGroupValue(group);
    });

    function showGroupValue(group) {
        window.history.pushState(null, '', '".Url::toRoute(['site/rating'])."?group='+group);
        if(typeof results[group] !== 'undefined') {
            $.each($('.rating-candidate'), function(key, value) {
                if(typeof $(this).data('candidate') !== 'undefined') {
                    score = results[group]['c'][$(this).data('candidate')];
                } else {
                    score = results[group]['a'][$(this).data('additional')];
                }
                $(this).find('.percent').html(score);
                $(this).find('.rating-line span').css({'width': score+'%'});
            });
        } else {
            $('.rating-candidate').find('.percent').html('0');
            $('.rating-candidate').find('.rating-line span').css({'width': '0'});
        }
    }
";

$this->registerJs($script, yii\web\View::POS_END);?>
