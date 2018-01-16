<?php
use yii\helpers\Url;

$this->registerJsFile(Url::toRoute('js/test.js'), ['depends' => [\yii\web\JqueryAsset::className()]]);
//$this->registerCssFile(Url::toRoute('css/test.css'));
?>

<div class="test-wrap height">
    <div class="left-sww"></div>
    <div class="right-sww"></div>
    <div class="container" id="start" data-key="0">
        <div class="pull-left">
            <h1 class="tt-up">Политический диктант</h1>
            <p>18 марта во всех регионах страны пройдет общероссийская проверка политической грамотности — выборы президента России. Чтобы не наделать ошибок в этой работе и проверить ваши знания о кандидатах, предлагаем ответить на вопросы нашего "политического диктанта".</p>
            <a href="" class="btn btn-h50 btn-w200 btn-white nextQuestion">Начать</a>
        </div>
        <div class="pull-right">
            <div class="test-wrap_img">
                <img src="/images/icons/test.svg" alt="Test image">
            </div>
        </div>
    </div>


    <?php foreach ($questions as $key => $q):?>
        <?php $key++;?>
        <div class="container hide" id="q<?=$q->id;?>" data-key="<?=$key;?>">
            <div class="pull-left">
                <h1 class="tt-up"><?=$key;?> / <?=count($questions);?></h1>
                <h3>Однажды один кандидат ударил оппонента этим сосудом в ходе дискуссии о качестве жизни в стране.</h3>
                <div class="check-block hide">
                    <img src="/images/icons/check.svg" alt="Check icon">
                    <span></span>
                </div>
            </div>
            <div class="pull-right">
                <div class="test-checkbox">
                    <form action="">
                        <?php foreach ($q->answers as $i => $answer):?>
                            <div class="form-group" data-right="<?=$answer->is_right;?>">
                                <div class="radio">
                                    <input id="radio_<?=$i + 1;?>" type="radio" name="question">
                                    <label for="radio_<?=$i + 1;?>"><?=$answer->title;?></label>
                                </div>
                            </div>
                        <?php endforeach;?>
                    </form>
                </div>

                <div class="test-text hide wrong">
                    <?=$q->comment_wrong;?>
                </div>

                <div class="test-text hide right">
                    <?=$q->comment_right;?>
                </div>
                <a href="" class="continue nextQuestion">Продолжить<i class="fa fa-angle-right"></i></a>
            </div>
        </div>
    <?php endforeach;?>
</div>