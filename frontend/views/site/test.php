<?php
use yii\helpers\Url;
use frontend\assets\TestAsset;

TestAsset::register($this);
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
								<div class="test-wrapper-test" id="test-wrapper-test">
									<h1 id="testID" data-value="<?=$key;?>" class="tt-up"><?=$key;?> / <?=count($questions);?></h1>
									<h3 id="testID2" data-value="<?=$key;?>">
										<?=$q->title;?>
									</h3>
									<div id="check-block" class="check-block hide">
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
												<div class="chckbox"></div>
											</div>
											<label for="radio_<?=$i + 1;?>"><?=$answer->title;?></label>
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
							</div>
						</div>
					</div>
				<?php endforeach;?>
					<div class="bb-item result-container">
						<div class="bb-custom-side">
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
							<div class="right-part hide" style="z-index: 2;" id="result-range-container">
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
									<a 
										href="<?=Url::toRoute(['site/test']);?>"
										class="finish-button left-button next-btn again-position"
										id="finish-btn-left"
									>
										<i class="fa fa-refresh"></i>
										Еще раз
									</a>
									<a 
										href="<?=Url::toRoute(['site/index']);?>"
										class="finish-button right-button finish-position next-btn"
										id="finish-btn-right"
									>
										Завершить
										<i class="fa fa-angle-right"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
			<a href="" id="bb-nav-next" class="btn btn-h50 btn-w200 btn-white nextQuestion start-position continue-mobile-btn">
			  Начать
			  <i id="ic" class="fa fa-angle-right"></i>
			</a>
		</div> 
		 
	</div>
</div>
<style>
	.nextQuestion {
		transition: all .5s ease-in-out;
	}
	#check-block span {
		margin-left: 20px!important;
	    font-size: 22px;
	}
	.result-container .right-part {
		z-index: 5;
		width: 100%;
		display: flex;
		justify-content: flex-start;
		padding-left: 80px;
		position: relative;
		flex-direction: column;
		overflow: auto;
		padding-top: 80px;
	}
	.right-part .right {
		position: relative;
	}
	.right-part .wrong {
		position: relative;
	}
	.correct-background .right::after {
        content: '';
        display: block;
        position: absolute;
        top: 150px;
        right: -50px;
        width: 160px;
        height: 140px;
        background: url(../images/icons/like.svg) no-repeat center;
        -webkit-background-size: contain;
        background-size: contain;
        z-index: -1
    }
    .incorrect-background .wrong::after {
        content: '';
        display: block;
        position: absolute;
        top: 150px;
        right: -50px;
        width: 160px;
        height: 140px;
        background: url(../images/icons/dislike.svg) no-repeat center;
        -webkit-background-size: contain;
        background-size: contain;
        z-index: -1;
    }
    .incorrect-background p::after {
        display: none!important;
    }
    .correct-background p::after {
        display: none!important;
    }
@media screen and (min-width: 768px) and (max-width: 1199px) {
	#result-range-container {
	    align-items: center;
	}
    .incorrect-background .wrong::after {
        top: 50px;
        right: -200px;
    }
    .correct-background .right::after {
        top: 50px;
        right: -200px;
    }
    .right-part {
		justify-content: flex-start!important;
    }
    .incorrect-background p {
        width: 100%!important;
        max-width: 100%!important;
    }
    .correct-background p {
        width: 100%!important;
        max-width: 100%!important;
    }
    .correct-background .right::after {
    	top: 0;
    }
    .incorrect-background .wrong::after {
    	top: 0;
    }
    .result-container #start-page-topp .right-part {
		padding-bottom: 100px;
	}
}    

@media screen and (min-width: 320px) and (max-width: 1199px) {
    

    .right-part.incorrect-background {
        justify-content: flex-start;
    }

    .incorrect-background p {
        width: 100%;
        max-width: 100%;
    }
    

    .right-part .correct-background {
        justify-content: flex-start;
    }

    .correct-background p {
        width: 100%;
        max-width: 100%;
    }
    
}
@media screen and (min-width: 320px) and (max-width: 767px) {
    .incorrect-background .wrong::after {
        top: 0px;
        right: -0px;
        width: 80px;

    }
    .correct-background .right::after {
        top: 0px;
        right: 0px;
        width: 80px;
    }
    .result-container #start-page-topp .right-part {
		padding-bottom: 60px;
	}
	.result-container .right-part p {
		width: 280px!important;
		max-width: 280px!important;
	}
	.right-part .test-checkbox {
		margin-bottom: 0!important;
	}
	/*.result-container #start-page-topp .right-part {
		height: 57vh!important;
	    align-items: center;
	}*/
	.result-container #start-page-topp {
		height: auto!important;
		padding-bottom: 0!important;
	}
	#start-page-topp #result-range-container {
	    height: 60vh;
	    padding: 20px 20px 60px 20px!important;
	    overflow-y: auto;
	    align-items: center;
	    justify-content: flex-start;
	}
	.result-container .left-part {
		height: 40vh!important ;
	}
}








	.hide-btn {
		display: none!important;
	}
	.right-part .test-checkbox form {
		margin-bottom: 10px;
		padding-left: 50px;
	}
	.checkbox, .radio {
		height: 40px;
		line-height: 40px;
	}
	.chckbox {
		width: 40px;
		height: 40px;
		border: solid 5px #3e43c8;
	    left: -45px;
	    z-index: 5;
	    left: -45px;
	    position: absolute;
	}
	.checkbox input[type="checkbox"], .radio input[type="radio"] {
		top: 15px;
		left: -25px;
		width: 40px;
		height: 40px;
		z-index: 9;
	}
	.form-group {
	    margin-bottom: 15px;
	    position: relative;
	}
	.right-part label {
	    z-index: -5;
	    color: #fff;
	    padding: 0!important;
	    position: absolute!important;
	    left: 40px!important;
	    top: 0;
	    font-size: 24px;
	    letter-spacing: 1px;
	}
	.right-part label:before {
		width: 40px;
		height: 40px;
		border: solid 5px #3e43c8;
	    left: -85px;
	    z-index: 5;
	    display: none!important;
	}
	@media only screen and (min-width: 500px) and (max-width: 700px ) and (min-height: 320px) and (max-height: 520px) {
		#testID {
			margin-top: -45px!important;
		}
		#testID2 {
			width: 100%!important;
			max-width: 100%!important;
			margin-top: -10px;
		}
	}
	.custom-pos {
		margin-top: -45px!important;
	}
	.custom-pos2 {
		width: 100%!important;
		max-width: 100%!important;
		margin-top: -10px;
	}
/* answers */
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
		position: relative;
	}
	.correct-background p::after {
		content: '';
		display: block;
		position: absolute;
		top: -40px;
		right: -50px;
		width: 160px;
		height: 140px;
		background: url(../images/icons/like.svg) no-repeat center;
		-webkit-background-size: contain;
		background-size: contain;
		z-index: -1;
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
		position: relative;
	}
	.incorrect-background p::after {
		content: '';
		display: block;
		position: absolute;
		top: -10px;
		right: -50px;
		width: 160px;
		height: 140px;
		background: url(../images/icons/dislike.svg) no-repeat center;
		-webkit-background-size: contain;
		background-size: contain;
		z-index: -1;
	}
/* ___ answers */
	#ic {
		display: none;
	}
.bb-content {
	background: #3e43c8;
}
.bb-item {
	background: #3e43c8;
}
@-webkit-keyframes zoom {
	from {
		-webkit-transform: scale(1.6, 1.6);
	}
	40% {
        -webkit-transform: scale(1.6, 1.6);
    }
	to {
		-webkit-transform: scale(1.0, 1.0);
	}
}
@keyframes zoom {
	from {
		transform: scale(1.6, 1.6);
	}
	20% {
        transform: scale(1.6, 1.6);
    }
	to {
		transform: scale(1.0, 1.0);
	}
}
#prgs-circle {
	opacity: 0;
}
#progress-circle-wrapper {
	opacity: 0;
}
.animate-fade {
	transition: all 1s ease-in-out;
	opacity: 1!important;
}
#progress-circle-wrapper::before {
	-webkit-animation: zoom 1s ease-in-out;
	-webkit-animation-iteration-count: 1;
	animation-iteration-count: 1;
	animation: zoom 1s ease-in-out;
}
.test-wrap {
	z-index: 3;
	background: #252aa6;
}
.bb-custom-wrapper {
	background: #252aa6;
}
.no-js {
	background: #252aa6;
}
#start-page-topp {
	background: #252aa6;
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
	font-family: 'FiraSans', sans-serif;
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
	/*justify-content: center;*/
	width: 100%;
  }
  .result-container .right-part {
	z-index: 5;
	width: 100%;
    display: flex;
    justify-content: flex-start;
    padding-left: 80px;
    position: relative;
  }
  .result-container .right-part p {
	font-size: 25px;
	line-height: 35px;
	max-width: 500px;
	width: 500px;
  }
  #progress-circle-wrapper {
	margin-top: -50px;
	position: relative;
  }
  #progress-circle-wrapper:before {
    content: '';
    display: block;
    position: absolute;
    top: -30px;
    right: -55%;
    width: 500px;
    height: 300px;
    background: url(../images/icons/stars.svg) no-repeat center;
    -webkit-background-size: contain;
    background-size: contain;
    z-index: 0;
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
  .start-position {
	position: fixed;
	top: 85%;
	left: 90px;
	z-index: 9;
  }
  .next-position {
	position: fixed;
	bottom: 40px;
	right: 140px;
	z-index: 9;
  }
  .again-position {
	position: absolute;
	bottom: 0;
	left: 0;
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
	margin-left: 30px;
	font-size: 30px;
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


  .test-text {
	z-index: 2;
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
	justify-content: flex-start;
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
  .right-part .test-checkbox {
	min-height: 450px;
	display: flex;
	align-items: flex-end;
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
	margin-top: 10px;
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
  overflow: hidden;
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
  font-size: 22px;
  line-height: 32px;
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
/*circle styles*/
.progress-circle {
    width:  200px;
    height: 200px;
    line-height: 200px;
    background: #252aa6;
}
.progress-circle span {
    height:  200px;
    width:  200px;
    line-height: 200px;
    top: 30px;
    color: #fff;
}
.left-half-clipper {
    width:  200px;
    height: 200px;
    clip: rect(0, 200px, 200px, 100px);
}
.value-bar {
    width:  200px;
    height: 200px;
    clip: rect(0, 100px, 200px, 0);
    border: 15px solid #fff;
}
.progress-circle.over50 .first50-bar {
    height:  200px;
    width:  200px;
    clip: rect(0, 200px, 200px, 100px);
    background-color:  #fff;
}
.progress-circle:after {
    width: 170px;
    height: 170px;
    top: 15px;
    left: 15px;
    background-color: #3e43c8; 
}
#result-text {
	position: absolute;
	color: #fff;
	top: -10px;
	z-index: 5;
	width: 100%;
	text-align: -webkit-center;
	text-align: center;
	font-size: 80px;
}
@media screen and (min-width: 1199px) {
	.right-part {
		overflow: auto;
	  }
	.result-container .right-part {
		justify-content: center!important;
	}
	.result-container .left-part {
		justify-content: center!important;
	}
	
	.left-part {
		padding-left: 140px;
	}
	.left-part .test-wrapper-test {
		padding-top: 30px;
	}
	.right-part .right {
		min-height: 450px;
	    padding-top: 190px;
	    align-self: flex-start;
	}
	.right-part .wrong {
		min-height: 450px;
	    padding-top: 190px;
	    align-self: flex-start;
	}
	.correct-background p {
		margin-top: 30px;
	}
	.incorrect-background p {
		margin-top: 30px;
	}
	#start-title {
		margin: 0 0 35px 0!important;
	    padding-top: 35px;
	}
	#start-text {
	    align-self: flex-start;
	    width: 492px;
	    padding-right: 20px;
	    margin: 0!important;
	}
	.start-position {
		left: 140px;
	}
	.right-part .test-checkbox {
		min-height: 450px;
		height: 450px;
	    display: flex;
	    align-items: flex-start;
	    padding-top: 130px;
	}
}
@media screen and (min-width: 768px) and (max-width: 1199px) {
	.progress-circle {
	    width:  300px;
	    height: 300px;
	    line-height: 300px;
	}
	.progress-circle span {
	    height:  300px;
	    width:  300px;
        line-height: 340px;
	}
	.left-half-clipper {
	    width:  300px;
	    height: 300px;
	    clip: rect(0, 300px, 300px, 150px);
	}
	.value-bar {
	    width:  300px;
	    height: 300px;
	    clip: rect(0, 150px, 300px, 0);
	    border: 25px solid #fff;
	}
	.progress-circle.over50 .first50-bar {
	    height:  300px;
	    width:  300px;
	    clip: rect(0, 300px, 300px, 150px);
	    background-color:  #fff;
	}
	.progress-circle:after {
	    width: 250px;
	    height: 250px;
	    top: 25px;
	    left: 25px;
	}
	#result-text {
		top: -10px;
		font-size: 100px;
	}
}
@media screen and (min-width: 320px) and (max-width: 768px) {
	#ic {
		display: initial;
	}
}
@media screen and (min-width: 320px) and (max-width: 767px) {
	.progress-circle {
	    width:  150px;
	    height: 150px;
        font-size: 15px;
	    line-height: 75px;
	}
	.progress-circle span {
	    height:  150px;
	    width:  150px;
	    line-height: 150px;
	}
	.left-half-clipper {
	    width:  150px;
	    height: 150px;
	    clip: rect(0, 150px, 150px, 75px);
	}
	.value-bar {
	    width:  150px;
	    height: 150px;
	    clip: rect(0, 75px, 150px, 0);
	    border: 15px solid #fff;
	}
	.progress-circle.over50 .first50-bar {
	    height:  150px;
	    width:  150px;
	    clip: rect(0, 150px, 150px, 75px);
	    background-color:  #fff;
	}
	.progress-circle:after {
	    width: 120px;
	    height: 120px;
	    top: 15px;
	    left: 15px;
	}
	#result-text {
	    font-size: 60px;
	    top: -10px;
	    line-height: 150px;
	}
}
/*circle styles*/
@media screen and (min-width : 320px) and (max-width : 1199px) {
	.right-part {
		overflow: auto;
	}
	.left-part .test-wrapper-test .check-block {
		display: none;
	}
	.result-container {
		flex-direction: column!important;
	}
	#progress-circle-wrapper {
	    margin-top: 90px;
	}
	.result-container #start-page-bottomm .left-part {
		display: flex;
		justify-content: center;
		align-items: center;
		height: 47vh;
		background: #3e43c8;
	}
	.result-container #start-page-topp {
		display: flex;
		justify-content: center;
		align-items: center;
		height: 53vh;
		background: #3e43c8;
	}
	.result-container #start-page-topp .right-part {
		height: 53vh;
		justify-content: center;
	    background: #3e43c8;

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
	#result-range p {
		opacity: 0;
		transition: all 1s ease-in-out;
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
	margin: 100px 0 60px 0;
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
  #progress-circle-wrapper:before {
	top: 0px;
    right: -50%;
    width: 700px;
    height: 300px;
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
  .left-part h3 {
	  height: 200px;
	  display: flex;
	  align-items: flex-start;
	  overflow-y: auto;
  }
  .left-part {
	height: 47vh;
	align-items: flex-start;
	justify-content: center;
  }
  .right-part {
	height: 53vh;
	align-items: flex-start;
	padding-top: 40px;
  }
  .test-wrapper-test {
	justify-content: flex-start;
	margin-top: 180px;
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
		margin: 0 0 20px 0!important;
		line-height: 30px;
	}

	#start-text {
		font-size:  14px;
		line-height:  20px;
		width:  280px;
		max-width: 280px;
		margin: 0 20px!important;
		padding-bottom: 60px;
	    overflow: auto;
	    height: 43vh;
	}
	.correct-background p::after {
	    content: '';
	    display: block;
	    position: absolute;
	    top: -40px;
	    right: 0px;
	    width: 100px;
	    height: 140px;
	    background: url(../images/icons/like.svg) no-repeat center;
	    -webkit-background-size: contain;
	    background-size: contain;
	    z-index: -1;
	}
	.incorrect-background p::after {
	    content: '';
	    display: block;
	    position: absolute;
	    top: -30px;
	    right: 0px;
	    width: 100px;
	    height: 140px;
	    background: url(../images/icons/dislike.svg) no-repeat center;
	    -webkit-background-size: contain;
	    background-size: contain;
	    z-index: -1;
	}
	.continue-mobile-btn {
		height:  50px!important;
		line-height: 50px!important;
	}
	.left-part h3 {
	    max-width: 280px;
	    width: 280px;
	    font-size: 18px;
	    line-height: 20px;
        height: auto;
	    max-height: 145px;
	    display: flex;
	    align-items: flex-start;
	    overflow-y: scroll;
	    font-weight: 100!important;
	    font: 18px 'FiraSans-Bold', sans-serif;
	}

	.left-part h1 {
		font-size: 24px;
		margin: 0 0 0 0;
	}

	.left-part {
		padding: 20px 20px 0 20px;
	}

	.left-part .test-wrapper-test {
		min-height:  auto;
		margin-top: 20px;
	}
	.continue-mobile-btn i {
		line-height: 50px!important;
	}

	.right-part {
		overflow-y:  auto;
	    padding: 20px 20px 50px 20px;
	}
	.right-part label {
		font-size:  18px;
		line-height: 35px;
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
		margin-top: 10px;
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
		margin-top: 0px;
	}
	#progress-circle-wrapper {
		margin-top: 50px
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
	#progress-circle-wrapper:before {
        top: 15px;
	    left: -40%;
	    width: 335px;
	    height: 150px;
	  }
		.result-container #start-page-topp .right-part {
		    padding: 0 20px;
		}

		.finish-buttons .left-button i {
		    right:  initial!important;
		    left:  0!important;
		    margin-left: 20px!important;
		    font-size: 18px!important;
		}

		.finish-buttons .finish-button i {
		    right: 0;
		    left: initial;
		    margin-right: 20px;
		    font-size: 18px;
		}
}
@media screen and (max-width: 767px) and (min-width: 320px) {
 .chckbox {
    width: 25px;
    height:25px;
    border: solid 2px #3e43c8;
 }
 .checkbox, .radio {
    height:25px;
    line-height:25px;
}
.right-part label {
    left: 20px!important;
    line-height:  25px;
    font-size: 16px;
}

}

</style>