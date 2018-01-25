<?php
use yii\helpers\Url;
use frontend\assets\TestAsset;

TestAsset::register($this);

//$this->registerJsFile(Url::toRoute('js/test.js'), ['depends' => [\yii\web\JqueryAsset::className()]]);
//$this->registerCssFile(Url::toRoute('css/test.css'));
?>
<link href="/css/css-circular-prog-bar.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/js/bookBlock/bookblock.css" />
<script src="/js/bookBlock/modernizr.custom.js"></script>
<div class="no-js">
<div class="bb-custom-wrapper">

  <div class="test-wrap height test-page bb-bookblock" id="bb-bookblock">
    <div class="bb-item container test-container">
      <div class="bb-custom-firstpage">
        <div class="left-part">
          <h1 class="tt-up" id="start-title">Политический диктант</h1>
          <p id="start-text">
            18 марта во всех регионах страны пройдет общероссийская проверка политической грамотности — выборы президента России. Чтобы не наделать ошибок в этой работе и проверить ваши знания о кандидатах, предлагаем ответить на вопросы нашего "политического диктанта".
          </p>
        </div> 
      </div>
      <div class="bb-custom-side">
        <div class="right-part">
          <div class="test-wrap_img">
            <img src="/images/icons/test-white.svg" alt="Test-white image" id="test-img-white">
            <img src="/images/icons/test.svg" alt="Test-white image" id="test-img-blue">
          </div>
        </div>
      </div>
    </div>
    <?php foreach ($questions as $key => $q):?>
      <?php $key++;?>
        <div class="bb-item container t" id="questionBlock" data-key="<?=$key;?>">
          <div class="bb-custom-side">
            <div class="left-part">
              <div class="test-wrapper-test">
                <h1 id="testID" data-value="<?=$q->id;?>" class="tt-up"><?=$key;?> / <?=count($questions);?></h1>
                <h3>
                  <?=$q->title;?>
                </h3>
                <div class="check-block hide">
                  <img src="/images/icons/check.svg" alt="Check icon">
                  <span></span>
                </div>
              </div>
            </div>
          </div>
          <div class="bb-custom-side">
            <div class="right-part">
              <div class="test-checkbox test-text" >
                <form action="" style="width: 400px;">
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
              <div class="correct-icon hide"></div>
              <div class="incorrect-icon hide"></div>
            </div>
          </div>
        </div>
    <?php endforeach;?>
    <div id="resultBlock" class="result-container test-container hide">
      <div class="left-part">
        <div class="group" id="progress-circle-wrapper">
          <div class="progress-circle" id="prgs-circle">
            <b id="result-text"></b>
            <span id="result-helper">из <?=count($questions);?></span>
            <div class="left-half-clipper">
              <div class="first50-bar"></div>
              <div class="value-bar"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="right-part" style="z-index: 2;">
        <?php foreach ($testResults as $result):?>
          <p class="hide" data-start="<?=$result->range_start;?>" data-end="<?=$result->range_end;?>">
            <?=$result->title;?>
          </p>
        <?php endforeach;?>
        <div class="finish-buttons">
          <a href="<?=Url::toRoute(['site/test']);?>" class="finish-button left-button next-btn again-position">
            <i class="fa fa-refresh"></i>
            Еще раз
          </a>
          <a href="<?=Url::toRoute(['site/index']);?>" class="finish-button right-button finish-position next-btn">
            Завершить
            <i class="fa fa-angle-right"></i>
          </a>
        </div>
      </div>
    </div>
    <a href="" id="bb-nav-next" class="btn btn-h50 btn-w200 btn-white nextQuestion continue-mobile-btn start-position">
      Начать
    </a>
    </div>  
  </div>
</div>
</div>