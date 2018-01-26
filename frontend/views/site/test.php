<?php
use yii\helpers\Url;
use frontend\assets\TestAsset;

TestAsset::register($this);

//$this->registerJsFile(Url::toRoute('js/test.js'), ['depends' => [\yii\web\JqueryAsset::className()]]);
//$this->registerCssFile(Url::toRoute('css/test.css'));
?>
<div class="no-js">
	<div class="bb-custom-wrapper">
		<div class="test-wrap height test-page bb-bookblock" id="bb-bookblock">
			<div class="bb-item container test-container">
				<div class="bb-custom-firstpage" id="start-page-bottomm">
					<div class="left-part">
						<img src="/images/icons/test-white.svg" alt="Test-white image" id="test-img-white">
						<h1 class="tt-up" id="start-title">Политический диктант</h1>
						<p id="start-text">
							18 марта во всех регионах страны пройдет общероссийская проверка политической грамотности — выборы президента России. Чтобы не наделать ошибок в этой работе и проверить ваши знания о кандидатах, предлагаем ответить на вопросы нашего "политического диктанта".
						</p>
					</div> 
				</div>
			<div class="bb-custom-side" id="start-page-topp">
				<div class="right-part">
					<div class="test-wrap_img">
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
									<h1 id="testID" data-value="<?=$key;?>" class="tt-up"><?=$key;?> / <?=count($questions);?></h1>
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
			<div class="bb-item" id="bb-custom-wrapper">
				<div class="result-container test-container hide">
					<div class="bb-custom-firstpage" id="start-page-bottomm">
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
					</div>
					<div class="bb-custom-side" id="start-page-topp">
						<div class="right-part" style="z-index: 2;" id="result-range-container">
							<?php foreach ($testResults as $result):?>
								<p 
									id="result-range"
									class="hide"
									data-start="<?=$result->range_start;?>"
									data-end="<?=$result->range_end;?>"
								>
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
				</div>
			</div>
			<a href="" id="bb-nav-next" class="btn btn-h50 btn-w200 btn-white nextQuestion start-position continue-mobile-btn">
			  Начать
			</a>
		</div> 
		 
	</div>
</div>
<style>
.bb-content {
	background: #3e43c8;
}
.bb-item {
	background: #3e43c8;
}
@-webkit-keyframes zoom {
    from {
        -webkit-transform: scale(1, 1);
    }
    50% {
        -webkit-transform: scale(1.2, 1.2);
    }
    to {
        -webkit-transform: scale(1, 1);
    }
}
@keyframes zoom {
    from {
        transform: scale(1, 1);
    }
    50% {
        transform: scale(1.1, 1.1);
    }
    to {
        transform: scale(1, 1);
    }
}
<<<<<<< HEAD
#progress-circle-wrapper:before {
    -webkit-animation: zoom 1s ease-in-out infinite;
=======
/*@keyframes zoom {
    from {
        width: 140%;
        height: 100%;
    }
    50% {
        width: 145%;
        height: 105%;
    }
    to {
        width: 140%;
        height: 100%;
    }
}*/
#progress-circle-wrapper:before {
    -webkit-animation: zoom 1s ease-in-out infinite; /* Chrome, Safari, Opera */
>>>>>>> f83d499123cdee2c08bdf8bd0e8d2e6c2a4ce902
    animation: zoom 5s ease-in-out infinite;
}
.test-wrap {
    z-index: 3;
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
    background-color: #252aa6!important;
  }
  .progress-circle span {
    color: #fff!important;
    font-size: 11px;
    top: 17px;
    width: 100%!important;
    line-height: inherit!important;
  }
  .progress-circle:after {
    background-color: #3e43c8!important;
  }
  .value-bar {
    border: 0.45em solid #fff!important;
  }
  .progress-circle.over50 .first50-bar {
    background-color: #fff!important;
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
  #bb-custom-wrapper #start-page-bottomm {
  	width: 100%;
    height: 100%;
    position: relative;
  }
  #bb-custom-wrapper #start-page-bottomm .left-part {
  	width: 100%;
  }
  #bb-custom-wrapper #start-page-topp {
  	width: 100%;
    height: 100%;
    position: relative;
  }
  #bb-custom-wrapper #start-page-topp .right-part {
  	width: 100%;
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

@media screen and (min-width : 320px) and (max-width : 1199px) {
	.result-container {
		flex-direction: column!important;
	}
	.result-container #start-page-bottomm .left-part {
	    display: flex;
	    justify-content: center;
	    align-items: center;
	    height: 50vh;
	    background: #3e43c8;
	}
	.result-container #start-page-topp {
	    display: flex;
	    justify-content: center;
	    align-items: center;
	    height: 50vh;
	    background: #3e43c8;
	}
	.result-container #start-page-topp .right-part {
	    height: 50vh;
	}
	.result-container .right-part p {
		text-align: center;
		text-align: -webkit-center;
	}
	#resultBlock {
	    flex-direction: column;
	}
	#resultBlock .left-part {
		width: 100%;
	    height: 60vh;
	}
	#resultBlock .right-part {
		width: 100%;
	    height: 40vh;
	    background: #3e43c8;
	}
	#resultBlock #result-range {
		text-align: center;
		text-align: -webkit-center;
	}

    .finish-buttons {
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
      z-index: 5;
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
      color: #252aa6;left: initial;
      bottom: initial;
      right: initial;
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
  #test-img-blue {
    display: none;
  }
  #test-img-white {
    display: block;
    width: 200px;
    margin: 140px 0 60px 0;
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
    background: #fff;
    color: #3e43c8;
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
  .no-js .test-wrap .test-container {
	display: flex;
  }
  .left-part {
    height: 40vh;
    align-items: flex-start;
  }
  .right-part {
    height: 60vh;
    align-items: flex-start;
	padding-top: 40px;
  }
  .test-wrapper-test {
  	justify-content: center;
  }
  .test-checkbox {
  	min-height: 300px!important;
  }
  .test-wrap .test-container {
    display: flex;
    flex-direction: column-reverse;
  }
  .correct-background .correct-icon {
  	top: initial;
  }
  .correct-background p {
  	width: 80%;
    max-width: 80%;
  }
  .incorrect-background .incorrect-icon {
  	top: initial;
  }
  .incorrect-background p {
  	width: 80%;
    max-width: 80%;
  }
  .bb-custom-firstpage {
    width: 100%;
    height: auto;
  }
  .bb-custom-side {
    width: 100%;
    height: auto;
  }
  .bb-custom-firstpage .right-part {
    height: 360px;
    padding-top: 160px;
    background: #3e43c8;
  }
  #start-page-topp {
    display:  none;
  }
  #start-page-bottomm {
  	display: inherit;
  }
  #start-page-bottomm .left-part {
	align-items: center;
  }
  .bb-custom-firstpage .left-part {
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
@media screen and (min-width : 320px) and (max-width : 767px) {
	#test-img-white {
	    width: 100px;
	    margin: 60px 0 40px 0;
	}

	#start-page-bottomm .left-part {
	    padding: 20px 0 3px 0;
	}

	#start-title {
	    width:  280px;
	    font-size:  24px;
	    max-width: 280px;
	    margin: 0 0 20px 0;
	    line-height: 30px;
	}

	#start-text {
	    font-size:  14px;
	    line-height:  20px;
	    width:  280px;
	    max-width: 280px;
        margin: 0 20px!important;
	}
	.continue-mobile-btn {
	    height:  50px!important;
	    line-height: 50px!important;
	}
	.left-part h3 {
	    max-width:  280px;
	    width:  280px;
	    font-size:  18px;
	    line-height: 20px;
	}

	.left-part h1 {
	    font-size: 24px;
	    margin: 0 0 20px 0;
	}

	.left-part {
	    padding: 20px;
	}

	.left-part .test-wrapper-test {
	    min-height:  auto;
	}
	.continue-mobile-btn i {
	    line-height: 50px!important;
	}

	.right-part {
	    overflow-y:  auto;
	    padding: 20px 20px 60px 20px;
	}
	.right-part label {
	    font-size:  18px;
	    line-height: 20px;
	}

	.checkbox input[type="checkbox"], .radio input[type="radio"] {
	    height:  25px;
	    width:  25px;
	}

	.right-part label:before {
	    width:  25px;
	    height:  25px;
	    border: solid 2px #3e43c8;
	}
	.right-part .test-checkbox {
	    min-height: auto!important;
	}

	.form-group:not(:last-child) {
	    margin-bottom: 30px;
	}
	.check-block img {
	    width: 25px;
	}

	.left-part .test-wrapper-test .check-block {
	    margin-top: 20px;
	}

	.check-block span {
	    margin-top: 2px;
	    margin-left: 20px;
	    font-size: 18px;
	}
	.correct-background h3 {
	    width:  280px;
	    max-width:  280px;
	    font-size:  18px;
	    line-height: 20px;
	}

	.correct-background p {
	    width: 280px;
	    max-width:  280px;
	    font-size:  13px;
	    line-height: 19px;
	    margin-top: 20px;
	}

	.correct-background .correct-icon {
	    width:  100px;
	    height: 100px;
	}
	.incorrect-background h3 {
	    width:  280px;
	    max-width:  280px;
	    font-size:  18px;
	    line-height: 20px;
	}

	.incorrect-background p {
	    width: 280px;
	    max-width:  280px;
	    font-size:  13px;
	    line-height: 19px;
	    margin-top: 20px;
	}

	.incorrect-background .incorrect-icon {
	    width:  100px;
	    height: 100px;
	}

	.right-part .right {
	    margin-top: 0px;
	}
	.right-part .wrong {
	    margin-top: 20px;
	}
	#progress-circle-wrapper {
	    transform: scale(1.2);
	    margin-top: -20px
	}

	.result-container .right-part p {
	    font-size:  16px;
	    line-height: 20px;
	}

	#resultBlock .left-part {
	    height: 40vh;
	}

	#resultBlock .right-part {
	    height: 60vh;
	}
	.finish-buttons .finish-button {
	    height:  50px;
	    font-size: 16px;
	    line-height:  50px;
	}

	.finish-buttons {
	    height:  50px;
	    line-height:  50px;
	}

	.finish-buttons .finish-button i {
	    height:  50px;
	    line-height: 50px;
	}
	.finish-buttons .finish-button i {
	    right:  10px;
	}

	.finish-buttons .left-button i {
	    left:  10px;
	    right:  initial;
	}
}

</style>