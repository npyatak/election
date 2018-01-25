<?php
use yii\helpers\Url;

$this->registerJsFile(Url::toRoute('js/test.js'), ['depends' => [\yii\web\JqueryAsset::className()]]);
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
                  Однажды один кандидат ударил оппонента этим сосудом в ходе дискуссии о качестве жизни в стране.
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
            <span id="result-helper">из 10</span>
            <div class="left-half-clipper">
              <div class="first50-bar"></div>
              <div class="value-bar"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="right-part" style="z-index: 2;">
        <p>
          Вы сильны в матчасти и можете смело шагать к избирательной урне. Кстати, если бы голосование состоялось сегодня, результат был бы таким.
        </p>
        <div class="finish-buttons">
          <a href="http://election.promo-group.org/site/test" class="finish-button left-button next-btn again-position">
            <i class="fa fa-refresh"></i>
            Еще раз
          </a>
          <a href="http://election.promo-group.org/" class="finish-button right-button finish-position next-btn">
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
<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/js/bookBlock/jquery.bookblock.js"></script>
<script src="/js/bookBlock/jquerypp.custom.js"></script>
<script src="/js/bookBlock/bookblock.js"></script>

<script>
  var Page = (function() {

  var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
  var orient = (width >= 1199) ? 'vertical' : 'horizontal'
  var config = {
    $bookBlock : $( '#bb-bookblock' ),
    $navNext : $( '#bb-nav-next' ),
    $navPrev : $( '#bb-nav-prev' )
  },
  init = function() {
      config.$bookBlock.bookblock( {
      speed : 800,
      shadowSides : 0.8,
      shadowFlip : 0.4,
      orientation : orient
    } );
    initEvents();
  },
  initEvents = function() {

  var $slides = config.$bookBlock.children();
    config.$navNext.on( 'click touchstart', function() {
      config.$bookBlock.bookblock( 'next' );
      return false;
    } );
      config.$navPrev.on( 'click touchstart', function() {
      config.$bookBlock.bookblock( 'prev' );
      return false;
    } );
  };
  return { init : init };
  })();
  </script>
  <script>
      Page.init();
  </script>

<style>
  .finish-buttons {
    position: absolute;
    bottom: 40px;
    font-size: 24px;
    color: #fff;
    width: 500px;
    display: flex;
    justify-content: space-around;
    left: 11%;
  }
  .finish-buttons .left-button {
    color: #fff;
  }
  .finish-buttons .right-button {
    color: #fff;
  }
  .result-container {
    display: flex;
    flex-direction: row;
    justify-content: center;
  }
  .result-container .left-part {
    align-items: center!important;
    width: 50%;
  }
  .result-container .right-part {
    z-index: 5;
    width: 50%;
  }
  .result-container .right-part p {
    font-size: 30px;
    line-height: 40px;
    max-width: 500px;
    width: 500px;
  }
  #progress-circle-wrapper {
    transform: scale(3);
    margin-top: -50px;
  }
  #progress-circle-wrapper:before {
    content: '';
    display: block;
    position: absolute;
    top: 0;
    left: -28px;
    width: 140%;
    height: 100%;
    background: url(../images/icons/stars.svg) no-repeat center;
    -webkit-background-size: contain;
    background-size: contain;
    z-index: 0;
    transform: scale(1.1);
  }
  #result-text {
    position: absolute;
    color: #fff;
    top: -10px;
    z-index: 5;
    width: 100%;
    text-align: -webkit-center;
    text-align: center;
    font-size: 50px;
  }
  .progress-circle {
    background-color: #252aa6;
  }
  .progress-circle span {
    color: #fff;
    font-size: 11px;
    top: 17px;
    width: 100%;
    line-height: inherit;
  }
  .progress-circle:after {
    background-color: #3e43c8;
  }
  .value-bar {
    border: 0.45em solid #fff;
  }
  .progress-circle.over50 .first50-bar {
    background-color: #fff;
  }
  .start-position {
    position: fixed;
    top: 85%;
    left: 90px;
    z-index: 9;
  }
  .next-position {
    position: fixed;
    bottom: 40px;
    right: 40px;
    z-index: 9;
  }
  .again-position {
    position: fixed;
    bottom: 40px;
    right: 33%;
    z-index: 9;
  }
  .finish-position {
    position: fixed;
    bottom: 40px;
    right: 9%;
    z-index: 9;
  }
  .finish-position:hover {
    text-decoration: none!important;
  }
  .again-position:hover {
    text-decoration: none!important;
  }
  .next-btn {
    background: none;
    border: none;
    box-shadow: none;
    color: #fff;
    font-size: 24px;
  }
  .next-btn i {
    margin-left: 15px;
  }
  .next-btn:hover {
    color: #fff!important;
  }
  .next-btn:focus {
    color: #fff!important;
  }
  #test-img-white {
    display: none;
  }
  .correct-background {
    background: #1fb38c!important;
  }
  .correct-background h3 {
    font-size: 30px;
    line-height: 40px;
    width: 500px;
  }
  .correct-background p {
    font-size: 18px;
    line-height: 30px;
    max-width: 440px;
    margin-top: 40px;
  }
  .incorrect-background {
    background-color: #ea7d63!important;
  }
  .incorrect-background h3 {
    font-size: 30px;
    line-height: 40px;
    width: 500px;
  }
  .incorrect-background p {
    font-size: 18px;
    line-height: 30px;
    max-width: 440px;
    margin-top: 40px;
  }
  .test-text {
    z-index: 2;
  }
  .correct-icon {
    content: '';
    display: block;
    position: absolute;
    top: 30%;
    right: 5%;
    width: 160px;
    height: 140px;
    background: url(../images/icons/like.svg) no-repeat center;
    -webkit-background-size: contain;
    background-size: contain;
    z-index: 0;
  }
  .incorrect-icon {
    content: '';
    display: block;
    position: absolute;
    top: 30%;
    right: 5%;
    width: 160px;
    height: 140px;
    background: url(../images/icons/dislike.svg) no-repeat center;
    -webkit-background-size: contain;
    background-size: contain;
    z-index: 0;
  }
  .bb-content {
    background: -moz-linear-gradient(left, rgba(62,67,200,0.85) 0%, rgba(37,42,166,0.85) 100%);
    background: -webkit-linear-gradient(left, rgba(62,67,200,0.85) 0%,rgba(37,42,166,0.85) 100%);
    background: linear-gradient(to right, rgba(62,67,200,0.85) 0%,rgba(37,42,166,0.85) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#d93e43c8', endColorstr='#d9252aa6',GradientType=1 );
  }
  nav {
    position: fixed;
    bottom: 0;
    left: 0;
    z-index: 999;
  }
  .left-part {
    width: 100%;
    height: 100vh;
    padding: 80px 40px 0 40px;
    float: none;
    flex-wrap: nowrap;
    flex-direction: column;
    display: flex;
    justify-content: center;
    background: #3e43c8;
    align-items: center;
  }
  #start-left {
    align-items: flex-start!important;
  }
  .left-part h1 {
    font-size: 50px;
    line-height: 60px;
    letter-spacing: 2px;
    margin: 0 0 20px 0;
    max-width: 500px;
    text-align: -webkit-left;
    text-align: left;
  }
  .right-part {
    width: 100%;
    height: 100vh;
    padding: 0 40px;
    justify-content: center;
    align-items: center;
    display: flex;
    background: #252aa6;
  }
  .right-part .right {
    margin-top: 55px;
  }
  .right-part .wrong {
    margin-top: 55px;
  }
  .right-part .test-checkbox {
    min-height: 450px;
    display: flex;
    align-items: flex-end;
  }
  .right-part .test-checkbox form {
    margin-bottom: 10px;
  }
  .checkbox input[type="checkbox"], .radio input[type="radio"] {
    top: 15px;
    left: 20px;
    width: 40px;
    height: 40px;
  }
  .right-part label:before {
    width: 40px;
    height: 40px;
    border: solid 5px #3e43c8;
  }
  .right-part label {
    color: #fff;
    padding: 0px 20px 0 80px;
  }
  .left-part .test-wrapper-test {
    min-height: 450px;
    display: flex;
    flex-direction: column;
    align-content: flex-end;
  }
  .left-part .test-wrapper-test .check-block {
    margin-top: 30px;
  }
  .left-part h3 {
    max-width: 500px;
  }
  .bb-custom-wrapper {
    width: 100%;
    height: 100%;
    position: relative;
  }

.bb-custom-wrapper .bb-bookblock {
  width: 100%;
  height: 100%;
  -webkit-perspective: 2000px;
  perspective: 2000px;
}

.bb-custom-side {
  width: 50%;
  float: left;
  height: 100%;
  overflow: hidden;
  background: #fff;
  /* Centering with flexbox */
  display: -webkit-box;
  display: -moz-box;
  display: -webkit-flex;
  display: flex;
  -webkit-flex-direction: row;
  flex-direction: row;
  -webkit-flex-wrap: wrap;
  flex-wrap: wrap;
  -webkit-box-pack: center;
  -moz-box-pack: center;
  -webkit-justify-content: center;
  justify-content: center;
  -webkit-box-align: center;
  -moz-box-align: center;
  -webkit-align-items: center;
  align-items: center;
}
.bb-custom-firstpage {
  width: 50%;
  float: left;
  height: 100%;
}
.bb-custom-firstpage h1 {
  font-size: 50px;
  line-height: 60px;
  width: 500px;
  margin: 0 0 80px 0px;
}
#start-title {
  margin: 0 0 80px 50px!important;
  align-self: flex-start;
}
#start-text {
  margin: 0 0 80px 50px!important;
  align-self: flex-start;
}
.bb-custom-firstpage p {
  font-size: 24px;
  line-height: 30px;
  margin: 0 0 80px 0px;
  width: 500px;
}

.bb-custom-firstpage .left-part a {
  width: 200px;
  align-self: flex-start;
}

.bb-custom-wrapper > nav {
  width: 100%;
  height: 40px;
  margin: 1em auto 0;
  position: fixed;
  bottom: 20px;
  z-index: 1000;
  text-align: center;
}

.bb-custom-wrapper > nav a {
  display: inline-block;
  width: 40px;
  height: 40px;
  text-align: center;
  border-radius: 2px;
  background: #1baede;
  color: #fff;
  font-size: 0;
  margin: 2px;
}

.bb-custom-wrapper > nav a:hover {
  opacity: 0.6;
}

.bb-custom-icon:before {
  font-family: 'arrows';
  speak: none;
  font-style: normal;
  font-weight: normal;
  font-variant: normal;
  text-transform: none;
  line-height: 1;
  font-size: 30px;
  line-height: 40px;
  display: block;
  -webkit-font-smoothing: antialiased;
}

.bb-custom-icon-first:before,
.bb-custom-icon-last:before {
  content: "\e002";
}

.bb-custom-icon-arrow-left:before,
.bb-custom-icon-arrow-right:before {
  content: "\e003";
}

.bb-custom-icon-arrow-left:before,
.bb-custom-icon-first:before {
  -webkit-transform: rotate(180deg);
  transform: rotate(180deg);
}

@media screen and (min-width : 768px) and (max-width : 1199px) {
  #test-img-blue {
    display: none;
  }
  #test-img-white {
    display: block;
  }
  .continue-desktop-btn {
    display: none;
  }
  .continue-mobile-btn {
    border-radius: 0;
    height: 80px!important;
    display: flex;
    align-items: center;
    position: fixed;
    justify-content: center;
    width: 100%;
    font-size: 24px;
    left: 0;
    bottom: 0;
    top: inherit;
  }
  .continue-mobile-btn i {
    display: initial;
    position: absolute;
    right: 20px;
    top: 0;
    height: 100%;
    line-height: 80px!important;
  }
  .test-container .right-part .test-wrap_img {
    width: 200px;
  }
  .test-wrap {
    background: #3e43c8;
  }
  .test-wrap .test-container {
    display: flex;
    flex-direction: column-reverse;
  }
  .bb-custom-firstpage {
    width: 100%;
    height: auto;
  }
  .bb-custom-side {
    width: 100%;
    height: auto;
  }
  .right-part {
    height: 360px;
    padding-top: 160px;
    background: #3e43c8;
  }
  .left-part {
    height: auto;
    padding: 60px 0 3px 0;
    margin: -1px 0 0 0;
    justify-content: flex-start;
  }
  #start-title {
    align-self: initial;
    margin: 0 0 40px 0!important;
    width: 500px;
    max-width: 500px;
    text-align: -webkit-center;
    text-align: center;
  }
  #start-text {
    align-self: inherit;
  }
}


@media screen and (max-width: 61.75em){
  .bb-custom-side {
    font-size: 70%;
  }
}

@media screen and (max-width: 33em){
  .bb-custom-side {
    font-size: 60%;
  }
}



</style>
