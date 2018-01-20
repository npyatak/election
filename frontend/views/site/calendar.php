<div class="card-header calendar-header">
	<div class="container">
		<div class="left">
			<p class="tt-top">
				Выборы президента России
			</p>
			<h1 class="calendar__tt-up">
				31 января 2018
			</h1>
			<p class="calendar__tt-sub">
				С 18.00 ЦИК прекращает принимать документы для регистрации кандидатов. 
				<br/><br/>
				Также с этого дня избиратели могут подать заявление в ТИК, в МФЦ или через 
				портал госуслуг, если они намерены <span>голосовать не по месту регистрации,</span>
				а по месту пребывания.
			</p>
		</div>
		<div class="right" id="calendar-header-right"></div>
	</div>
</div>
<div class="dates-wrapper">
	<div class="container-custom">
		<div class="calendar-triangle"></div>
	</div>
	<div class="bottom">
		<div id="calendar-dates" class="owl-carousel">
				<div class="item">
	        <h3 class="item__title"> <br/> </h3>
	        <p class="empty"></p>
	      </div>
	      <div class="item">
	        <h3 class="item__title">27 декабря <br/> 2017</h3>
	        <p class="item__text">
	        	ЦИК начинает принимать документы для регистрации кандидатов
	        </p>
	      </div>
	      <div class="item">
	        <h3 class="item__title">7 января <br/> 2018</h3>
	        <p class="item__text">
	        	Истекает срок для выдвижения кандидатов-самовыдвиженцев
	        </p>
	      </div>
	      <div class="item">
	        <h3 class="item__title">12 января <br/> 2018</h3>
	        <p class="item__text">
	        	Истекает срок выдвижения кандидатов от политических партий
	        </p>
	      </div>
	      <div class="item">
	        <h3 class="item__title">31 января <br/> 2018</h3>
	        <p class="item__text">
	        	ЦИК прекращает принимать документы для регистрации кандидатов
	        </p>
	      </div>
	      <div class="item">
	        <h3 class="item__title">10 февраля <br/> 2018</h3>
	        <p class="item__text">
	        	Истекает срок принятия решений о регистрации кандидатов
	        </p>
	      </div>
	      <div class="item">
	        <h3 class="item__title">17 февраля <br/> 2018</h3>
	        <p class="item__text">
	        	Начало предвыборной агитации в СМИ
	        </p>
	      </div>
	      <div class="item">
	        <h3 class="item__title">25 февраля <br/> 2018</h3>
	        <p class="item__text">
	        	Все участки начинают прием заявлений для голосования не по прописке
	        </p>
	      </div>
	      <div class="item">
	        <h3 class="item__title">2 марта <br/> 2018</h3>
	        <p class="item__text">
	        	Начинается досрочное голосование за пределами РФ
	        </p>
	      </div>
	  </div>
	  <div class="testClass">
		  <div class="container-custom">
				<div class="header-timeLine" id="test">
				    <div class="header-timeLine_middle">
			        <div class="green-dot"></div>
			        <span class="dot dot-1"></span>
			        <span class="dot dot-2"></span>
			        <span class="dot dot-3"></span>
			        <span class="dot dot-4"></span>
				    </div>
				    <div class="left-sw"></div>
				</div>
			</div>
		</div>	
	</div>
</div>	

<style>
	.testClass {
		position: absolute;
    width: 100%;
    top: 50%;
	}
	#calendar-header-right:after {
		content: '';
    display: block;
    position: absolute;
    bottom: 0;
    left: 80px;
    width: 360px;
    height: 100%;
    background: url(../images/icons/kremlin.svg) no-repeat bottom center;
    -webkit-background-size: contain;
    background-size: contain;
	}
	.calendar-triangle {
		width: 0;
		height: 0;
		border-style: solid;
		border-width: 20px 10px 0 10px;
		border-color: #1fb38c transparent transparent transparent;
	}
	.calendar-header {
		background-color: #1fb38c;
	}
	.calendar__tt-up {
		margin-bottom: 40px!important;
	}
	.calendar__tt-sub {
		color: #ffffff;
    line-height: 1.67;
    font-size: 18px;
    margin: 0;
    text-transform: initial;
    margin-bottom: 175px;
	}
	.calendar__tt-sub span {
		font-weight: normal;
		text-decoration: underline;
	}
	.tt-top {
		color: #ffffff;
    line-height: 1.25;
    font-size: 24px;
    position: absolute;
    top: 50px;
	}
	/*#calendar-dates .owl-nav {
		position: absolute;
    right: 0;
    top: -80px;
    width: 100px;
    display: flex;
    color: #fff;
    font-size: 40px;
    align-items: center;
    justify-content: space-between;
	}*/
	#calendar-dates .slick-next {
		position: absolute;
    right: 0;
    top: -80px;
    width: 100px;
    display: flex;
    color: #fff;
    font-size: 40px;
	}
	#calendar-dates .slick-prev {
		position: absolute;
    left: 0;
    top: -80px;
    width: 100px;
    display: flex;
    color: #fff;
    font-size: 40px;
	}
	.next-arrow {
		position: absolute;
    right: 12%;
    top: -80px;
    display: flex;
    color: #fff;
    font-size: 40px;
	}
	.prev-arrow {
		position: absolute;
    right: 15%;
    top: -80px;
    display: flex;
    color: #fff;
    font-size: 40px;
	}
	#calendar-dates .item {
    margin: 30px 0 0 -10px;
    width: 256px;
	}
	#calendar-dates .item__title {
		max-width: 160px;
		color: #252aa6;
		font-size: 18px;
		line-height: 1.39;
	}
	#calendar-dates .item__text {
		max-width: 160px;
		color: #636363;
		font-size: 14px;
		line-height: 1.43;
		margin: 50px 0 0 0;
		position: relative;
	}
	#calendar-dates .item__text::before {
    content: '';
    display: block;
    position: absolute;
    top: -25px;
    left: -10px;
    height: 10px;
    width: 25px;
    background: #f9f9f9 url(../images/icons/dot.svg) no-repeat center;
    z-index: 2;
	}
	#test {
		position: absolute;
		width: 100%;
		top: 50%;
	}
	#test .header-timeLine_middle .green-dot {
		left: 0;
	}
	#test .header-timeLine_middle:after {
    content: '';
    display: block;
    position: absolute;
    top: 0;
    right: 100%;
    width: 4000px;
    height: 1px;
    background-color: #d0d0d0;
    z-index: 1;
	}
	#test .header-timeLine_middle:before {
    content: '';
    display: block;
    position: absolute;
    top: 0;
    left: 100%;
    width: 4000px;
    height: 1px;
    background-color: #d0d0d0;
    z-index: 1;
	}
	.dates-wrapper {
		background: #f9f9f9;
		padding-bottom: 30px;
		position: relative;
	}
	.container-custom {
		margin-left: 243px;
	}
</style>

