<?php
use yii\helpers\Url;
?>

<div class="first-results">
    <div class="top">
        <div class="container">
            <div class="pull-left">
                <h1>Предварительные результаты</h1>
                <span><?=Yii::$app->settings->get('mainPageFirstResultsTitle');?></span>
            </div>
            <div class="pull-left">
                <div class="h1"><?=Yii::$app->settings->get('mainPageFirstResultsVotingCardsCount');?></div>
                <p>бюллетеней обработано</p>
                <div class="icon"></div>
            </div>
            <div class="pull-left">
                <div class="h1"><?=Yii::$app->settings->get('mainPageFirstResultsVoterParticipation');?></div>
                <p>общая явка избирателей</p>
                <div class="icon"></div>
            </div>
        </div>
    </div>
    <div class="bottom">
        <div class="container">
            <div class="pull-left">
                <div class="candidates" id="candidates">
                    <div class="container">
                        <div class="candidates-inner">
                            <?php foreach ($candidateResults as $key => $r):?>
                                <a href="/candidate/ghirinovskii" class="candidates-item">
                                    <span class="number"><?=$key+1;?></span>
                                    <span class="percent"><?=$r['score'];?>%</span>
                                    <div class="candidates-img">
                                        <img src="<?=$candidates[$r['candidate_id']]->imageUrl;?>" alt="<?=$candidates[$r['candidate_id']]->nameAndSurname;?>">
                                    </div>
                                    <div class="candidate">
                                        <h4><?=$candidates[$r['candidate_id']]->nameAndSurname;?></h4>
                                    </div>
                                </a>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
                <div class="more-candidates">
                    <a href="" class="btn btn-h50 btn-w200 btn-white">Показать всех</a>
                </div>
            </div>
            <div class="pull-left">
                <?php if(Yii::$app->settings->get('mainPageOnlineBlockText') != ''):?>
                    <div class="online">
                        <h4>Онлайн
                            <span class="top__oval">
                                <span class="oval-inner"></span>
                            </span>
                        </h4>
                        <p><?=Yii::$app->settings->get('mainPageOnlineBlockText');?></p>
                        <div class="more-online">
                            <a href="" class="btn btn-h50 btn-w200 btn-white">Читать трансляцию</a>
                        </div>
                    </div>
                <?php endif;?>

                <?php if($news):?>
                    <div class="news">
                    <h4>Новости</h4>
                        <?php foreach ($news as $n):?>
                            <div class="block">
                                <div class="date"><?=$n->viewDate;?></div>
                                <a href=""><?=$n->title;?></a>
                            </div>
                        <?php endforeach;?>
                        <div class="mobile-news">
                            <div id="news-slider" class="owl-carousel">
                                <div class="news-item">
                                    <div class="news-item_date"><?=$news[0]->viewDate;?></div>
                                    <div class="news-item_title">
                                        <a href="" target="_blank"><?=$news[0]->title;?></a>
                                    </div>
                                    <a href="http://tass.ru/vybory-prezidenta-rf-2018" class="all-news" target="_blank">Все новости</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
    <div class="results-block">
        <div class="right-info">
            <div class="right-title">
                <h4>Предварительные результаты по регионам</h4>
                <p>По данным ЦИК от 18 марта, 17:45</p>
            </div>
            <div class="mobile-rating-cat">
                <select name="" id="" class="selectpicker">
                    <?php foreach ($regions as $region):?>
                        <option value="<?=$region['id'];?>"><?=$region['title'];?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="right-content">
                <?php foreach ($regionResultsArr as $regionId => $regionResults):?>
                    <ul data-region="<?=$regionId;?>">
                        <?php foreach ($regionResults as $candidate_id => $score):?>
                        <li>
                            <div class="left-li"><?=$candidates[$candidate_id]->surname;?></div>
                            <div class="right-li "><?=$score;?>%</div>
                        </li>
                        <?php endforeach;?>
                    </ul>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>
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

<?php
$regionIdsArr = [];
foreach ($regions as $region) {
    $regionIdsArr[$region['id']] = $region['title'];
}

$script = "
    var regionIdsArr = '".json_encode($regionIdsArr)."';
    var regionResultsArr = '".json_encode($regionResultsArr)."';
    console.log(regionIdsArr);
    console.log(regionResultsArr);
";

$this->registerJs($script, yii\web\View::POS_HEAD);
?>
