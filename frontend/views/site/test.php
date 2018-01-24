<?php
use yii\helpers\Url;

$this->registerJsFile(Url::toRoute('js/test.js'), ['depends' => [\yii\web\JqueryAsset::className()]]);
//$this->registerCssFile(Url::toRoute('css/test.css'));
?>
<link href="/css/css-circular-prog-bar.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/js/bookBlock/default.css" />
<link rel="stylesheet" type="text/css" href="/js/bookBlock/bookblock.css" />
<link rel="stylesheet" type="text/css" href="/js/bookBlock/demo4.css" />


<script src="/js/bookBlock/modernizr.custom.js"></script>

<div class="bb-custom-wrapper">

  <div class="test-wrap height test-page bb-bookblocka" id="bb-bookblock">
    <div class="left-sww"></div>
    <div class="right-sww"></div>
    <div class="container test-container bb-item" id="start" data-key="0">
      <div class="left-part bb-custom-side">
        <h1 class="tt-up">Политический диктант</h1>
        <p>
          18 марта во всех регионах страны пройдет общероссийская проверка политической грамотности — выборы президента России. Чтобы не наделать ошибок в этой работе и проверить ваши знания о кандидатах, предлагаем ответить на вопросы нашего "политического диктанта".
        </p>
        <a href="" class="btn btn-h50 btn-w200 btn-white nextQuestion bottom-mobile-btn">
          Начать
          <i class="fa fa-angle-right"></i>
        </a>
      </div>
      <div class="right-part bb-custom-side">
        <div class="test-wrap_img">
          <img src="/images/icons/test-white.svg" alt="Test-white image" id="test-img-white">
          <img src="/images/icons/test.svg" alt="Test-white image" id="test-img-blue">
        </div>
      </div>
    </div>
    <div class="result-container test-container hide">
      <div class="left-part">
        <div class="group" id="progress-circle-wrapper">
          <div class="progress-circle">
            <!-- Кол-во правильных ответов -->
            <b id="result-text"></b>
            <span id="result-helper">из 10</span>
            <div class="left-half-clipper">
              <div class="first50-bar"></div>
              <div class="value-bar"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="right-part" style="z-index: 99;">
        <!-- Текст результата -->
        <p>
          Вы сильны в матчасти и можете смело шагать к избирательной урне. Кстати, если бы голосование состоялось сегодня, результат был бы таким.
        </p>
        <div class="finish-buttons">
          <a href="http://election.promo-group.org/site/test" class="finish-button left-button">
            <i class="fa fa-refresh"></i>
            Еще раз
          </a>
          <a href="http://election.promo-group.org/" class="finish-button right-button">
            Завершить
            <i class="fa fa-angle-right"></i>
          </a>
        </div>
      </div>
    </div>
    <?php foreach ($questions as $key => $q):?>
      <?php $key++;?>
      <div class="container hide hidden-container bb-item" id="q<?=$q->id;?>" data-key="<?=$key;?>">
        <div class="left-part bb-custom-side">
          <div class="test-wrapper-test">
            <h1 class="tt-up"><?=$key;?> / <?=count($questions);?></h1>
            <h3>
              Однажды один кандидат ударил оппонента этим сосудом в ходе дискуссии о качестве жизни в стране.
            </h3>
            <div class="check-block hide">
              <img src="/images/icons/check.svg" alt="Check icon">
              <span></span>
            </div>
          </div>
        </div>
        <div class="right-part bb-custom-side">
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
          <div class="correct-icon hide"></div>
          <div class="incorrect-icon hide"></div>
          <a href="" class="continue nextQuestion continue-mobile-btn">
            Продолжить
            <i class="fa fa-angle-right"></i>
          </a>
        </div>
      </div>
    <?php endforeach;?>
  </div>
  <nav>
    <a id="bb-nav-prev" href="#" class="fa fa-arrow-left">Previous</a>
    <a id="bb-nav-next" href="#" class="fa fa-arrow-right">Next</a>
  </nav>
</div>
<script src="/js/jquery-3.2.1.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
<script src="/js/bookBlock/jquerypp.custom.js"></script>
<script src="/js/bookBlock/bookblock.js"></script>
<script>
      var Page = (function() {
        
        var config = {
            $bookBlock : $( '#bb-bookblock' )[0],
            $navNext : $( '#bb-nav-next' ),
            $navPrev : $( '#bb-nav-prev' ),
            $navFirst : $( '#bb-nav-first' ),
            $navLast : $( '#bb-nav-last' )
          },
          init = function() {
            config.$bookBlock.bookblock( {
              speed : 1000,
              shadowSides : 0.8,
              shadowFlip : 0.4
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
            $slides.on( {
              'swipeleft' : function( event ) {
                config.$bookBlock.bookblock( 'next' );
                return false;
              },
              'swiperight' : function( event ) {
                config.$bookBlock.bookblock( 'prev' );
                return false;
              }
            } );
          };
          console.log('config', config);
          // console.log('config', config.$bookBlock[0]);
          return { init : init };
      })();
    </script>
    <script>
        Page.init();
    </script>
<!-- <script>
  var Page = (function() {
    // var $bookBlock = $('#bb-bookblock')
    // console.log($bookBlock);
    // $bookBlock.bookblock();
    // var bb = $bookBlock.bookblock({
    //   speed: 800,
    //   perspective: 2000,
    //   shadowSides: 0.8,
    //   shadowFlip: 0.4
    // });
    var config = {
      $bookBlock : $( '#bb-bookblock' ),
      $navNext : $( '#bb-nav-next' ),
      $navPrev : $( '#bb-nav-prev' )
    }
    console.log(config);
    var init = function() {
      config.$bookBlock.BookBlock( {
        speed : 1000,
        shadowSides : 0.8,
        shadowFlip : 0.4
      } );
      initEvents();
    }
    // console.log(init());
    var initEvents = function() {
      var $slides = config.$bookBlock.children();
      config.$navNext.on( 'click touchstart', function() {
        config.$bookBlock.bookblock( 'next' );
        return false;
      } );
      config.$navPrev.on( 'click touchstart', function() {
        config.$bookBlock.bookblock( 'prev' );
        return false;
      } );
      $slides.on( {
        'swipeleft' : function( event ) {
          config.$bookBlock.bookblock( 'next' );
          return false;
        },
        'swiperight' : function( event ) {
          config.$bookBlock.bookblock( 'prev' );
          return false;
        }
      } );
    }; 
    // return { init : init };
  })();
</script> -->

<script>
  // Page.init();
</script>
<style>
/*desktop styles*/
nav {
  position: fixed;
  bottom: 0;
  z-index: 9999;
}
  .result-container .left-part {
    align-items: center!important;
  }
  .result-container .right-part {
    z-index: 99;
  }
  .result-container .right-part p {
    font-size: 30px;
    line-height: 40px;
    max-width: 500px;
    width: 500px;
  }
  .checkbox input[type="checkbox"], .radio input[type="radio"] {
    top: 15px;
    left: 20px;
    width: 40px;
    height: 40px;
  }
  .test-page {
    display: block;
    background: #3e43c8;
    height: 100vh;
  }
  .bottom-mobile-btn i {
    display: none;
  }
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
  .left-sww {
    display: initial;
  }
  .right-sww {
    display: initial;
  }
  #test-img-blue {
    display: block;
  }
  #test-img-white {
    display: none;
  }
  .test-container .right-part .test-wrap_img {
    margin-left: 0px;
  }
  .test-container {
    display: flex;
    flex-direction: row;
    justify-content: center;
  }
  .test-container .left-part {
    width: 50%;
    height: 100vh;
    padding: 80px 40px 0 40px;
    float: none;
    flex-wrap: nowrap;
    flex-direction: column;
    align-items: flex-start;
    display: flex;
    justify-content: center;
  }
  .test-container .right-part {
    width: 50%;
    height: 100vh;
    justify-content: center;
    align-items: center;
    display: flex;
    padding: 80px 40px 0 40px;
    position: relative;
  }
  .hidden-container .right-part .test-checkbox {
    min-height: 450px;
    display: flex;
    align-items: flex-end;
  }
  .hidden-container .left-part .test-wrapper-test {
    min-height: 450px;
  }
  .test-container .left-part h1 {
    font-size: 50px;
    line-height: 60px;
    letter-spacing: 2px;
    margin: 0 0 20px 0;
    max-width: 500px;
    text-align: -webkit-left;
    text-align: left;
  }
  .test-container .left-part p {
    font-size: 24px;
    line-height: 35px;
    margin: 0;
    margin-bottom: 65px;
    max-width: 500px;
    padding: 0;
  }
  .hidden-container {
    display: flex;
    flex-direction: row;
    justify-content: center;
  }
  .hidden-container .left-part {
    width: 50%;
    height: 100vh;
    padding: 80px 40px 0 40px;
    float: none;
    flex-wrap: nowrap;
    flex-direction: column;
    display: flex;
    justify-content: center;
    background: #3e43c8;
  }
  .hidden-container .left-part h1 {
    font-size: 50px;
    line-height: 60px;
    letter-spacing: 2px;
    margin: 0 0 20px 0;
    max-width: 500px;
    text-align: -webkit-left;
    text-align: left;
  }
  .hidden-container .left-part p {
    font-size: 24px;
    line-height: 35px;
    margin: 0;
    margin-bottom: 65px;
    max-width: 500px;
    padding: 0;
  }
  .hidden-container .left-part .check-block {
    margin-top: 45px;
  }
  .hidden-container .right-part {
    width: 50%;
    height: 100vh;
    padding: 0 40px;
    justify-content: center;
    align-items: center;
    display: flex;
  }
  .hidden-container .right-part label {
    color: #fff;
    padding: 0px 20px 0 80px;
  }
  .hidden-container .right-part label:before {
    width: 40px;
    height: 40px;
    border: solid 5px #3e43c8;
  }
  .hidden-container .right-part .form-group:not(:last-child) {
    margin-bottom: 50px;
  }
  .test-text {
    z-index: 9999;
  }
  .test-text h3 {
    margin-bottom: 40px;
  }
  .test-text p {
    width: 400px;
    line-height: 30px;
    z-index: 99999;
  }
  .test-text p span {
    width: 400px;
    line-height: 30px;
    z-index: 99999;
    font-size: 18px!important;
  }
  .test-text p font {
    width: 400px;
    line-height: 30px;
    z-index: 99999;
    font-size: 18px!important;
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
  .test-wrap.correct .test-text:before {
    background: none;
  }
  .test-wrap.incorrect .test-text:before {
    background: none;
  }
  .correct-background {
    background: #1fb38c!important;
  }
  .incorrect-background {
    background-color: #ea7d63!important;
  }
  #progress-circle-wrapper {
    transform: scale(3);
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
    z-index: 99;
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
/*desktop styles*/
/*(max-width : 1199px)*/  
  @media screen and (max-width : 1199px) {

    .hidden-container .right-part .test-checkbox {
      min-height: 30px;
    }
    .hidden-container .left-part .test-wrapper-test {
      min-height: 30px;
    }
    .test-container {
      flex-direction: column-reverse!important;
    }
    .result-container {
      height: 100vh;
      flex-direction: column!important;
    }
    .test-container .left-part {
      width: 100%;
      height: auto;
      padding: 0;
      align-items: center;
    }
    .test-container .left-part h1 {
      font-size: 50px;
      line-height: 60px;
      text-align: -webkit-center;
      text-align: center;
      width: 500px;
      margin: 40px 0 20px 0;
    }
    .test-container .left-part p {
      font-size: 24px;
      line-height: 35px;
      max-width: 500px;
      margin-bottom: 100px;
    }
    .test-container .right-part {
      width: 100%;
      height: auto;
      padding: 160px 0 0 0;
    }
    .left-sww {
      display: none;
    }
    .right-sww {
      display: none;
    }
    #test-img-blue {
      display: none;
    }
    #test-img-white {
      display: block;
    }
    .bottom-mobile-btn {
      border-radius: 0;
      height: 80px!important;
      display: flex;
      align-items: center;
      position: fixed;
      justify-content: center;
      width: 100%;
      bottom: 0;
      font-size: 24px;
    }
    .bottom-mobile-btn i {
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
    /*question*/
    .hidden-container {
      background: #252aa6;
      display: block;
    }
    .hidden-container .left-part {
      background: #3e43c8;
      width: 100%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 180px 40px 0px 40px;
      height: auto;
    }
    .hidden-container .left-part .check-block {
      margin: 20px 0;
    }
    .hidden-container .left-part .tt-up {
      font-size: 50px;
      line-height: 60px;
      letter-spacing: 2px;
      margin: 0px 0 20px 0;
    }
    .hidden-container .left-part h3 {
      font-size: 30px;
      line-height: 40px;
      width: 500px;
      margin-bottom: 40px;
    }
    .hidden-container .right-part {
      position: relative;
      background: #252aa6;
      width: 100%;
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      padding: 30px 40px 90px 40px;
      height: auto;
      align-items: flex-start;
    }
    .hidden-container .right-part .test-text p {
      width: 500px;
      max-width: 500px;
      font-size: 18px;
      line-height: 30px;
    }
    .hidden-container .right-part .test-text h3 {
      width: 500px;
      max-width: 500px;
      margin: 10px 0 40px 0;
    }
    .continue-mobile-btn {
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      color: #252aa6;
      background-color: #fff;
      font-size: 24px;
      height: 80px;
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 9999;
    }
    .continue-mobile-btn i {
      display: initial;
      position: absolute;
      right: 20px;
      top: 0;
      height: 100%;
      line-height: 80px;
    }
    .correct-icon {
      top: 10%;
    }
    .incorrect-icon {
      top: 10%;
    }
    .finish-buttons {
      position: fixed;
      bottom: 0;
      left: 0;
      color: #252aa6;
      background-color: #fff;
      font-size: 24px;
      height: 80px;
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 9999;
      width: auto;
    }
    .finish-buttons .finish-button {
      display: inline-block;
      width: 50%;
      text-align: -webkit-center;
      text-align: center;
      position: relative;
      height: 80px;
      line-height: 80px;
      color: #252aa6;
    }
    .finish-buttons .finish-button i {
      display: initial;
      position: absolute;
      right: 20px;
      top: 0;
      height: 100%;
      line-height: 80px;
    }
    .finish-buttons .right-button {
      right: initial;
      background: #f3f3f3;
    }
    .finish-buttons .left-button i {
      left: 20px;
      right: initial;
    }
  }
/*(max-width : 1199px)*/  
/*(min-width : 320px) and (max-width : 767px)*/ 
  @media screen and (min-width : 320px) and (max-width : 767px) {
    .bottom-mobile-btn {
      border-radius: 0;
      height: 50px!important;
    }
    .bottom-mobile-btn i {
      display: initial;
      line-height: 50px!important;
    }
    .test-container .left-part h1 {
      font-size: 24px;
      line-height: 30px;
      width: 280px;
    }
    .test-container .left-part p {
      font-size: 14px;
      line-height: 20px;
      max-width: 280px;
      margin-bottom: 65px;
    }
    .test-container .right-part {
      padding: 80px 0 0 0;
    }
    .test-container .right-part .test-wrap_img {
      width: 100px;
    }
    /*questions*/
    .hidden-container .left-part {
      padding: 80px 20px 0px 20px;
    }
    .hidden-container .left-part .tt-up {
      font-size: 24px;
      line-height: 30px;
    }
    .hidden-container .right-part .test-text p {
      font-size: 14px;
      line-height: 20px;
      max-width: 280px;
      width: 280px;
    }
    .hidden-container .right-part .test-text h3 {
      font-size: 14px;
      line-height: 20px;
      max-width: 280px;
      width: 280px;
      margin-bottom: 20px;
    }
    .hidden-container .right-part .test-text p span{
      font-size: 14px!important;
      line-height: 20px;
      max-width: 280px;
      width: 280px;
    }
    .hidden-container .right-part .test-text p font {
      font-size: 14px!important;
      line-height: 20px;
      max-width: 280px;
      width: 280px;
    }
    .hidden-container .left-part h3 {
      font-size: 18px;
      line-height: 25px;
      width: 280px;
      margin-bottom: 20px;
    }
    .hidden-container .right-part {
      padding: 30px 20px 60px 20px;
    }
    .hidden-container .right-part label {
      font-size: 18px;
      line-height: 20px;
      color: #fff;
      padding: 0 20px 0 50px;
      max-width: 280px;
      width: 280px;
      white-space: pre-wrap;
    }
    .hidden-container .right-part label:before {
      width: 20px;
      height: 20px;
      border: solid 1px #3e43c8;
    }
    .hidden-container .left-part .check-block img {
      width: 30px;
    }
    .hidden-container .left-part .check-block span {
      width: 30px;
      font-size: 20px;
      line-height: 24px;
      margin: 3px 0 0 20px;
    }
    .hidden-container .right-part .form-group:not(:last-child) {
      margin-bottom: 30px;
    }
    .correct-icon {
      width: 100px;
    }
    .incorrect-icon {
      width: 100px;
    }
    .continue-mobile-btn {
      font-size: 16px;
      height: 50px;
    }
    .continue-mobile-btn i {
      line-height: 50px;
    }
    #progress-circle-wrapper {
      transform: scale(1.3);
      margin-top: 80px;
    }
    .result-container {
      display: block;
    }
    .result-container .right-part p {
      font-size: 16px;
      line-height: 20px;
      max-width: 280px;
      width: 280px;
    }
    .result-container .right-part {
      padding: 40px 0
    }
    .finish-buttons {
      line-height: 50px;
      height: 50px;
    }
    .finish-buttons .finish-button {
      font-size: 16px;
      line-height: 50px;
      height: 50px;
    }
    .finish-buttons .finish-button i {
      line-height: 50px;
      height: 50px;
    }

  }
/*(min-width : 320px) and (max-width : 767px)*/   
</style>