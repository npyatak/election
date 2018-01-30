<?php
use yii\helpers\Url;

use common\models\RatingGroup;
use common\models\RatingItem;
?>

<div class="rating-page">
    <div class="rating-page_top">
        <div class="container">
            <div class="tabs owl-carousel">
                <div class="tab">
                    <a href="<?=Url::current(['group' => 1]);?>" class="r_group <?=$group == 1 ? 'active' : '';?>" data-group="1">
                        <h4>Рейтинг кандидатов</h4>
                        <div class="question-icon_wrap">
                            <span class="question-icon popup-open"></span>
                            <div class="question-popup">
                                <p>
                                    Результаты ответа на вопрос: "Если бы президентские выборы проводились в ближайшее воскресенье, за кого бы вы проголосовали?" (В % от числа опрошенных, допускается один ответ.)
                                    Опрос ВЦИОМ проводится методом ежедневного интервью 1000 респондентов в возрасте от 18 лет не менее чем в 80 регионах РФ. 40% номеров случайным образом отбираются из стационарных диапазонов, 60% — из мобильных. Максимальный размер ошибки для такой выборки с вероятностью 95% не превышает 3,2%.
                                </p>
                            </div>
                        </div>
                        <p>Опрос <?=$rating->subtitle;?></p>
                    </a>
                </div>
                <div class="tab">
                    <a id="groupsTab" href="<?=Url::current(['group' => 3]);?>" class="r_group show-rating-cat <?=!in_array($group, [1, 2]) ? 'active' : '';?>" data-group="3">
                        <h4>Рейтинг кандидатов</h4>
                        <div class="question-icon_wrap">
                            <span class="tab-span">среди отдельных социальных групп</span> <span class="question-icon popup-open"></span>
                            <div class="question-popup">
                                <p>
                                    Результаты ответа на вопрос: "Если бы президентские выборы проводились в ближайшее воскресенье, за кого бы вы проголосовали?" (В % от числа опрошенных, допускается один ответ.)
                                    Опрос ВЦИОМ проводится методом ежедневного интервью 1000 респондентов в возрасте от 18 лет не менее чем в 80 регионах РФ. 40% номеров случайным образом отбираются из стационарных диапазонов, 60% — из мобильных. Максимальный размер ошибки для такой выборки с вероятностью 95% не превышает 3,2%.
                                </p>
                            </div>
                        </div>
                        <p>Опрос <?=$rating->subtitle;?></p>
                    </a>
                </div>
                <div class="tab">
                    <a href="<?=Url::current(['group' => 2]);?>" class="r_group <?=$group == 2 ? 'active' : '';?>" data-group="2">
                        <h4>Антирейтинг кандидатов</h4>
                        <div class="question-icon_wrap">
                            <span class="question-icon popup-open"></span>
                            <div class="question-popup">
                                <p>
                                    Результаты ответа на вопрос: "За кого вы не проголосуете ни при каких обстоятельствах?" (В % от числа опрошенных, допускается любое число ответов.)
                                    Опрос ВЦИОМ проводится методом ежедневного интервью 1000 респондентов в возрасте от 18 лет не менее чем в 80 регионах РФ. 40% номеров случайным образом отбираются из стационарных диапазонов, 60% — из мобильных. Максимальный размер ошибки для такой выборки с вероятностью 95% не превышает 3,2%
                                </p>
                            </div>
                        </div>
                        <p>Опрос <?=$rating->subtitle;?></p>
                    </a>
                </div>
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
            <div id="rating-cat" class="owl-carousel <?=!in_array($group, [1, 2]) ? 'transform' : '';?>">
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
        }
    })
    $('#groups-select').on('change', function(e) {
        group = $(this).find('option:selected').data('group');
        showGroupValue(group);
    })

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
