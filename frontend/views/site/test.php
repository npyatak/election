<?php
use yii\helpers\Url;
use frontend\assets\TestAsset;

TestAsset::register($this);
?>
<div class="no-js">
	<div class="bb-custom-wrapper">
		<div class="test-wrap height test-page bb-bookblock" id="bb-bookblock" >
			<div class="bb-item container test-container">
				<div class="bb-custom-firstpage" id="start-page-bottomm" style="padding-bottom: 0px;">
					<div class="left-part">
						<img src="/images/icons/test-white.svg" alt="Test-white image" id="test-img-white">
						<h1 class="tt-up" id="start-title">Политический диктант</h1>
						<p id="start-text">
							18 марта во всех регионах страны пройдут выборы президента России. Чтобы проверить ваши знания о кандидатах, предлагаем ответить на вопросы нашего "политического диктанта".
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
												<input id="radio_<?=$answer->id;?>_<?=$i + 1;?>" type="radio" name="question">
												<div class="chckbox"></div>
											</div>
											<label for="radio_<?=$answer->id;?>_<?=$i + 1;?>"><?=$answer->title;?></label>
										</div>
										<?php endforeach;?>
									</form>
								</div>
								<div class="test-text hidden-animated wrong">
									<?=$q->comment_wrong;?>
								</div>
								<div class="test-text hidden-animated right">
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
									<div class="result-range-item hide" data-start="<?=$result->range_start;?>" data-end="<?=$result->range_end;?>">
										<?=$result->title;?>
									</div>
								<?php endforeach;?>
								<div class="finish-buttons">
									<a href="<?=Url::toRoute(['site/test']);?>" class="finish-button left-button next-btn again-position" id="finish-btn-left">
										<i class="fa fa-refresh"></i>
										Еще раз
									</a>
									<a href="<?=Url::toRoute(['site/index']);?>" class="finish-button right-button finish-position next-btn" id="finish-btn-right">
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