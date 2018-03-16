<style>
	.fh {
		height: 620px;
		background-color: #3e43c8;
		width: 100%;
		position: relative;
	}
	.fh-left {
		position: relative;
		display: inline-block;
		width: 50%;
		height: 100%;
	}
	.fh-left img {
		width: 100%;
		height: auto;
	    position: absolute;
	    bottom: 0px;
	    left: 0;
	    z-index: 1;
	}
	.fh-left .text {
		height: auto;
		position: absolute;
		bottom: 40px;
		left: 120px;
		z-index: 3;
		width: 420px;
	    background: transparent;
	}
	.fh-left .text .text__title {
		width: 420px;
		margin-bottom: 20px;
		color: #fff;
		font-size: 30px;
		line-height: 35px;
		font-family: 'FiraSans-Medium';    
	}
	.fh-left .text .text__subtitle {
	    width: 420px;
	    margin-bottom: 20px;
	    color: #fff;
	    font-size: 14px;
	    line-height: 20px;
	    font-family: 'FiraSans-Regular';
	}
	.fh-right {
		position: relative;
		float: right;
		width: 50%;
		height: 100%;
	}
	.online-wrapper {
	    position: absolute;
	    bottom: 0;
	    right: 0;
	}
	.online-wrapper .onl-block {
	    padding: 40px;
	    background-color: #1fb38c;
	    width: 520px;
	    height: 290px;
	}
	.onl-block .top .top__title {
	    font-size: 24px;
	    line-height: 30px;
	    letter-spacing: 0.5px;
	    margin: 0 0 120px 0;
	    color: #fff;
	    position: relative;
	    width: auto;
	    font-family: 'FiraSans-Bold';
	}
	.onl-block .top .top__oval {
	    width: 22px;
	    height: 22px;
	    border-radius: 50%;
	    background-color: rgba(255, 255, 255, 0.3);
	    position: absolute;
	    right: 0px;
	    top: 4px;
	}
	.online-btn {
	    border-radius: 70px;
	    background: #fff;
	    height: 50px;
	    line-height: 50px;
	    width: 100%;
	    font-size: 18px;
	    color: #1fb38c;
	    border: none;
	}
	.top__oval .oval-inner {
	    border-radius: 50%;
	    width: 10px;
	    height: 10px;
	    background-color: #ffffff;
	    position: absolute;
	    top: 6px;
	    left: 6px;
	}
	.onl-block .bottom .bottom__text {
	    font-size: 18px;
	    line-height: 25px;
	    color: #fff;
	    width: auto;
	    font-family: 'FiraSans-Regular';
	}
	@media screen and (min-width: 1200px) {
	    .hide-desktop {
	        display: none;
	    }
	    .hide-mobile {
	        display: block;
	    }
	}
	@media screen and (max-width: 1199px) {
	    .hide-mobile {
	        display: none;
	    }
	    .hide-desktop {
	        display: block;
	    }
	}


</style>
<div class="fh">
	<div class="fh-left">
		<img src="../images/first-hours/map-1-desktop.svg"/>
        <div class="text">
            <h1 class="text__title">
                Первые избирательные <br/>
                участки открылись <br/>
                на Камчатке и Чукотке
            </h1>
            <p class="text__subtitle">
                В Москве еще поздняя ночь, избирательные участки начнут работу через $ часов
            </p>
        </div>
	</div>
	<div class="fh-right">
		<div class="online-wrapper">
            <div class="onl-block">
                <div class="top">
                    <h1 class="top__title">
                        Онлайн
                        <div class="top__oval">
                            <div class="oval-inner"></div>
                        </div>
                    </h1>
                </div>
                <div class="bottom">
                    <p class="bottom__text">
                    	Следите за выборами вместе с нами в прямом эфире 24 на 7, 2к18. Заголовок трансляции и все такое.
                    </p>
                </div>
                <button class="online-btn hide-desktop">
                    Читать трансляцию
                </button>
            </div>
        </div>
	</div>
</div>


