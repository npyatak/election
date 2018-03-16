<?php
	use common\models\Candidate;
?>
<style>
	.online-wrapper .onl-block:hover {
	    background: rgba(47, 178, 136, 0.8);
	    transition: all ease-in .2s;
	}
	.fh {
		width: 100%;
		position: relative;
	}
	.fh-header {
		height: 620px;
		background-color: #3e43c8;
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
        max-width: 800px;
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
	    margin: 0 0 105px 0;
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
	.right-part__content {
	    width: 520px;
	    float: right;
	    padding: 40px;
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
	.fh-page__middle .left-part__content {
	    background: #f9f9f9;
	    height: auto;
	    float: left;    
	    width: calc(100% - 520px);
	    display: -webkit-box;
	    display: -moz-box;
	    display: -ms-flexbox;
	    display: -webkit-flex;
	    display: flex;
	    flex-wrap: wrap;
	    padding-left: 120px; 
	}
	.fh-page__middle .left-part__title {
	    background: #f9f9f9;
	    width: 100%;
	}
	.fh-page__middle .left-part__title .title {
	    color: #000;
	    text-transform: capitalize;
	    font-family: 'FiraSans-Bold';
	    font-size: 24px;
	    line-height: 30px;
	    letter-spacing: 0.5px;
	    margin: 40px 0 0 40px;
	}
	.fh-page__middle .candidates-item {
	    position: relative;
	    display: block;
	    width: 50%;
	    height: 340px;
	    -webkit-transition: .25s;
	    -moz-transition: .25s;
	    -ms-transition: .25s;
	    -o-transition: .25s;
	    transition: .25s;
	}
	.fh-page__middle .candidates-item:hover {
	    background-color: #e0e0e0;
	}
	.fh-page__middle .candidates-img {
	    float: right;
	    margin-right: 80px;
	    margin-top: 60px;
	}
	.fh-page__middle .candidates-img img {
	    display: block;
	    height: 170px;
	}
	.fh-page__middle .candidate {
	    position: absolute;
	    bottom: 15px;
	    left: 40px;
	}
	.fh-page__middle .candidate h4 {
	    max-width: 100px;
	    color: #000;
	    text-transform: capitalize;
	    font-family: 'FiraSans-Bold';
	    font-size: 24px;
	    line-height: 30px;
	    letter-spacing: 0.5px;
	    margin: 0 0 30px 0;
	}
	.map img {
	    width: 100%;
	    height: 100%;
	}
	.map {
	    position: relative;
	}
	.fh-page__middle .candidate p {
	    color: #636363;
	    font-family: 'FiraSans-Regular';
	    font-size: 14px;
	    line-height: 30px;
	    position: absolute;
	    min-width: 222px;
	    margin: 0;
	    left: 0;
	    bottom: 5px;
	}
	.news-part {
	    width: 520px;
	    height: auto;
	    float: right; 
	    padding: 40px 0 40px 40px;   
	}
	.news-part .right-part__title {
	    background: #fff;
	}
	.news-part .right-part__title .title {
	    color: #000;
	    text-transform: capitalize;
	    font-family: 'FiraSans-Bold';
	    font-size: 24px;
	    line-height: 30px;
	    letter-spacing: 0.5px;
	    margin: 0 0 30px 0;
	}
	.news-item {
	    text-decoration: none;
	    margin-bottom: 40px;
	    display: block;
	}
	.news-item .item__time {
	    font-family: 'FiraSans-Light';
	    color: #636363;
	    font-size: 14px;
	    line-height: 20px;
	    padding: 0;
	    margin: 0 0 10px 0;
	}
	.news-item .item__text {
	    font-family: 'FiraSans-Regular';
	    color: #252aa6;
	    font-size: 18px;
	    line-height: 25px;
	    max-width: 360px;
	    padding: 0;
	    margin: 0;
	}
@media screen and (min-width: 320px) and (max-width: 1199px) {
	.online-wrapper .onl-block {
	    width:  auto;
	    height:  auto;
	}

	.fh-right {
	    float: none;
	    position: relative;
	    width: 100%;
	    height:  auto;
	}

	.fh-left {
	    float:  none;
	    width: 95%;
	}

	.fh-left .text {
	    left: 40px;
	}

	.online-wrapper {
        position: relative;
	}

	.onl-block .top .top__title {
		margin-bottom: 20px;
	}

	.fh-page__middle .left-part__content {
	    padding-left:  0;
	    width: 100%;
	    float:  none;
	    height:  auto;
	    display:  flex;
	    position:  relative;
	}

	.fh-page__middle {
	    height: auto;
	    display: block;
	    position: relative;
	}
}

</style>
<style>
	.map {
    padding: 80px 120px 40px 120px;
}
/*polygon:hover {
    fill: red;
}*/
.online-btn:active {
    outline: none;
    background-color: rgba(255, 255, 255, 0.8);
}
.online-btn:focus {
    outline: none;
    background-color: rgba(255, 255, 255, 0.8);
}
.right-part__content .news-item {
    width: auto;
    margin-bottom: 40px;
}
#hidden-menu_cls {
    position: fixed;
    right: 0;
    top: 0;
    width: 80px;
    height: 80px;
    background-color: #fff;
    color: #252aa6;
    font-size: 15px;
    z-index: 10;
    cursor: pointer;
    -webkit-transition: .3s;
    -moz-transition: .3s;
    -ms-transition: .3s;
    -o-transition: .3s;
    transition: .3s;
    display: none;
}
#hidden-menu_cls i {
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%,-50%);
    -moz-transform: translate(-50%,-50%);
    -ms-transform: translate(-50%,-50%);
    -o-transform: translate(-50%,-50%);
    transform: translate(-50%,-50%);
}
@keyframes pulse {
    0%   { transform: scale( 1 ); }
    50% { transform: scale( 1.4 ); }
    100%  { transform: scale( 1 ); }
}
.reg_id {
    width: 280px;
    font-family: 'FiraSans-Medium';
    font-size: 30px;
    font-weight: 500;
    font-style: normal;
    font-stretch: normal;
    line-height: 1;
    letter-spacing: normal;
    text-align: left;
    color: #000000;
}
.reg_title {
    width: 280px;
    font-family: 'FiraSans-Medium';
    font-size: 20px;
    font-weight: 500;
    font-style: normal;
    font-stretch: normal;
    line-height: 1.25;
    letter-spacing: normal;
    text-align: left;
    color: #000000;
}
.reg_desc {
    width: 280px;
    font-family: 'FiraSans-Light';
    font-size: 14px;
    font-weight: 300;
    font-style: normal;
    font-stretch: normal;
    line-height: 1.43;
    letter-spacing: normal;
    text-align: left;
    color: #636363;
}
.top__oval {
    animation: pulse 2s infinite;
}
.fh-page__header {
    background: #3e43c8;
}
.fh-page__header .top__part {
    text-align: center;
    text-align: -webkit-center;
}
.bottom__part .left-part {
    width: calc(100% - 520px);
    position: relative;
    float: left;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    height: 290px;
}
.bottom__part {
    height: 290px;
}
.bottom__part .left-part img {
    position: absolute;
    top: 80px;
    left: 0;
}
.left-part .text {
    position: relative;
    padding-left: 160px;
}
.custom-left-part-text {
    padding-left: 0!important;
}
.left-part .text .text__title {
    width: 420px;
    margin-bottom: 20px;
    color: #fff;
    font-size: 30px;
    line-height: 35px;
    font-family: 'FiraSans-Medium';    
}
.left-part .text .text__subtitle {
    width: 420px;
    margin-bottom: 20px;
    color: #fff;
    font-size: 14px;
    line-height: 20px;
    font-family: 'FiraSans-Regular';
}
.left-part .text .text__number {
    width: 400px;
    margin-bottom: 10px;
    margin-top: 0px;
    color: #fff;
    font-size: 100px;
    line-height: 100px;
    font-family: 'FiraSans-Medium'; 
    text-align: left;
    text-align: -webkit-left;   
}
.left-part .text .text__middle {
    width: 400px;
    margin-bottom: 10px;
    margin-top: 0px;
    color: #fff;
    font-size: 28px;
    line-height: 35px;
    font-family: 'FiraSans-Medium';
    text-align: left;
    text-align: -webkit-left;    
}
.left-part .text .text__bottom {
    width: 400px;
    margin-bottom: 10px;
    margin-top: 0px;
    color: #fff;
    font-size: 14px;
    line-height: 20px;
    font-family: 'FiraSans-Regular';
    text-align: left;
    text-align: -webkit-left;    
}
.online-parent {
    padding: 0!important;
}
.right-part__content {
    padding: 40px 0 40px 40px!important;
}
.right-part__content .owl-dots {
    right: 65px!important;
}
.right-part__content.news::before {
    background: none!important;
}
.custom-candidates {
    width: calc(100% - 640px)!important;
}
.map-bottom {
    position: absolute;
    bottom: 40px;
    left: 160px;
}
.map-bottom-colors {
    position: absolute;
    bottom: 20px;
    right: 0;
    left: 0;
    margin: 0 auto;
    padding-left: 200px;
}
.color-block {
    width: 185px;
    height: auto;
    display: inline-block;
}
.color-block .text {
    width: 140px;
    height: 45px;
    font-family: 'FiraSans-Regular';
    font-size: 12px;
    font-weight: normal;
    font-style: normal;
    font-stretch: normal;
    line-height: 1.25;
    letter-spacing: normal;
    text-align: left;
    color: #ffffff;
    display: inline-block;
}
.color-box {
    width: 30px;
    height: 20px;
    display: block;
    display: inline-block;
    float: left;
}
.color-1 {
    background-color: #6569db;
}
.color-2 {
    background-color: #1fb38c;
}
.color-3 {
    background-color: #4a90e2;
}
.bottom__part .right-part {
    width: 520px;
    height: 290px;
    background: #1fb38c;
    position: relative;
    float: right;
}
.bottom__part .online-block {
    padding: 40px;
}
.online-block .top .top__title {
    font-size: 24px;
    line-height: 30px;
    letter-spacing: 0.5px;
    margin: 0 0 120px 0;
    color: #fff;
    position: relative;
    width: 360px;
    font-family: 'FiraSans-Bold';
}
.online-block .top .top__oval {
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
.online-block .bottom .bottom__text {
    font-size: 18px;
    line-height: 25px;
    color: #fff;
    width: 360px;
    font-family: 'FiraSans-Regular';
}
.fh-page__middle .left-part__content {
    background: #f9f9f9;
    height: auto;
    float: left;    
    width: calc(100% - 520px);
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    flex-wrap: wrap;
    padding-left: 120px; 
}
.news-part {
    width: 520px;
    height: auto;
    float: right; 
    padding: 40px 0 40px 40px;   
}
.news-part .right-part__title {
    background: #fff;
}
.news-part .right-part__title .title {
    color: #000;
    text-transform: capitalize;
    font-family: 'FiraSans-Bold';
    font-size: 24px;
    line-height: 30px;
    letter-spacing: 0.5px;
    margin: 0 0 30px 0;
}
.news-item {
    text-decoration: none;
    margin-bottom: 40px;
    display: block;
}
.news-item .item__time {
    font-family: 'FiraSans-Light';
    color: #636363;
    font-size: 14px;
    line-height: 20px;
    padding: 0;
    margin: 0 0 10px 0;
}
.news-item .item__text {
    font-family: 'FiraSans-Regular';
    color: #252aa6;
    font-size: 18px;
    line-height: 25px;
    max-width: 360px;
    padding: 0;
    margin: 0;
}
.fh-page__middle .left-part__title {
    background: #f9f9f9;
    width: 100%;
}
.fh-page__middle .left-part__title .title {
    color: #000;
    text-transform: capitalize;
    font-family: 'FiraSans-Bold';
    font-size: 24px;
    line-height: 30px;
    letter-spacing: 0.5px;
    margin: 40px 0 0 40px;
}
.fh-page__middle .candidates-item {
    position: relative;
    display: block;
    width: 50%;
    height: 340px;
    -webkit-transition: .25s;
    -moz-transition: .25s;
    -ms-transition: .25s;
    -o-transition: .25s;
    transition: .25s;
}
.fh-page__middle .candidates-item:hover {
    background-color: #e0e0e0;
}
.fh-page__middle .candidates-img {
    float: right;
    margin-right: 80px;
    margin-top: 60px;
}
.fh-page__middle .candidates-img img {
    display: block;
    height: 170px;
}
.fh-page__middle .candidate {
    position: absolute;
    bottom: 15px;
    left: 40px;
}
.fh-page__middle .candidate h4 {
    max-width: 100px;
    color: #000;
    text-transform: capitalize;
    font-family: 'FiraSans-Bold';
    font-size: 24px;
    line-height: 30px;
    letter-spacing: 0.5px;
    margin: 0 0 30px 0;
}
.map img {
    width: 100%;
    height: 100%;
}
.map {
    position: relative;
}
.fh-page__middle .candidate p {
    color: #636363;
    font-family: 'FiraSans-Regular';
    font-size: 14px;
    line-height: 30px;
    position: absolute;
    min-width: 222px;
    margin: 0;
    left: 0;
    bottom: 5px;
}
.tooltipster-sidetip.tooltipster-punk .tooltipster-box {
    border-radius: 0px;
    border: none;
    background: #fff;
    height: 135px;
    width: 350px;
}
.tooltipster-sidetip.tooltipster-punk.tooltipster-top .tooltipster-box {
    margin-bottom: 7px;
}
.tooltipster-sidetip.tooltipster-punk .tooltipster-content {
    color:#000;
    padding: 8px 16px;
}
.tooltipster-sidetip.tooltipster-punk .tooltipster-arrow-background {
    display:none;
}
.tooltipster-sidetip.tooltipster-punk.tooltipster-bottom .tooltipster-arrow-border {
    border-bottom-color:#2a2a2a;
}
.tooltipster-sidetip.tooltipster-punk.tooltipster-left .tooltipster-arrow-border {
    border-left-color:#2a2a2a;
}
.tooltipster-sidetip.tooltipster-punk.tooltipster-right .tooltipster-arrow-border {
    border-right-color:#2a2a2a;
}
.tooltipster-sidetip.tooltipster-punk.tooltipster-top .tooltipster-arrow-border {
    border-top-color:#f71169;
    display: none;
}
.tooltip__top {
    height: 25px;
    font-family: 'FiraSans';
    font-size: 20px;
    line-height: 1.25;
    color: #000000;
    margin: 15px 0 10px 0;
    padding: 0;
}
.tooltip__middle {
    height: 30px;
    font-family: 'FiraSans';
    font-size: 30px;
    font-weight: 500;
    line-height: 1;
    color: #000000;
    margin: 0 0 10px 0;
    padding: 0;
}
.tooltip__bottom {
    height: 20px;
    font-family: 'FiraSans';
    font-size: 14px;
    font-weight: 300;
    line-height: 1.43;
    color: #636363;
    margin: 0;
    padding: 0;
}
@media screen and (min-width: 1200px) {
    .hide-desktop {
        display: none;
    }
    .hide-mobile {
        display: block;
    }
}
@media screen and (min-width: 768px) and (max-width: 1199px) {
    .map {
        padding: 120px 20px 40px 20px;
    }
    .left-part .text .text__number {
        font-size: 80px;
        line-height: 80px;
    }
    .map-bottom-colors {
        position: relative;
        width: 100%;
        bottom: initial;
        left: initial;
        text-align: left;
        text-align: -webkit-left;
        padding-left: 20px;
    }
    .left-part .text {
        padding-left: 0;
        width: 100%;
        height: 100%;
        left: 0!important;
    }
    .color-block .text {
        margin-left: 10px;
    }
    .fh-page__header .left-part.map-bottom {
        position: relative;
        padding: 0!important;
        float: none;
        text-align: left;
        text-align: -webkit-left;
        left: initial;
        bottom: initial;
        margin-top: -130px;
        margin-bottom: 30px;
        margin-left: 20px;
    }
    .news-part {
        width:  100%!important;
    }
    .active-modal {
        padding: 120px 40px 40px 40px;
    }
    #logo {
        display: block;
        position: fixed;
        top: 0;
        left: 40px;
        width: 80px;
        height: 80px;
        background: url(../images/logo/logo.svg) no-repeat center;
        -webkit-background-size: 80px;
        background-size: 80px;
        z-index: 10;
    }

}
@media screen and (min-width: 320px) and (max-width: 1199px) {
    .hide-desktop {
        display: block;
    }
    .hide-mobile {
        display: none;
    }
    .right-part__content .news-item {
        width: 150px;
    }
    .fh-page__header .left-part {
        width: 100%;
        padding-bottom: 20px;
        position: relative;
        float: none;
    }
    .bottom__part {
        height: auto;
    }
    .bottom__part .right-part {
        float: none;
        position: relative;
        width: 100%;
        height: auto;
    }
    .right-part__content {
        padding: 40px 0 40px 40px;
        width: 100%;
        background: #fff;
    }
    .btn-yavka {
        color: #2724ad;
        margin: 20px 0 30px 0;
    }
    .left-part .text {
        left: 40px;
    }
    .online-block {
        width: auto;
        height: auto;
        background: #1fb38c;
        position: relative;
        padding: 40px;
        margin-top: -20px;
    }
    .left-part .text {
        padding-left: 0;
    }
    .online-block .top {
        width: 100%;
    }
    .online-block .top .top__title {
        font-size: 24px;
        line-height: 30px;
        letter-spacing: 0.5px;
        margin: 0 0 25px 0;
        color: #fff;
        position: relative;
        width: 100%;
        font-family: 'FiraSans-Bold';
    }
    .online-block .bottom .bottom__text {
        font-size: 18px;
        line-height: 25px;
        color: #fff;
        width: 100%;
        font-family: 'FiraSans-Regular';
    }
    .fh-page__middle .right-part {
        float: none;
        width: auto;
        height: auto;
    }
    .fh-page__middle .left-part {
        float: none;
    }
    .news-item {
        text-decoration: none;
        margin-bottom: 40px;
        display: inline-block;
        width: 32.3333%;
    }
    .fh-page__middle .left-part__content {
        width: auto;
        padding: 0;
    }
    .news-part {
        width: calc(100% - 40px);
        height: auto;
        float: none;
        padding: 40px 0px 40px 40px;
    }
    .voters-block {
        opacity: 0;
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: #3e43c8;
        z-index: 9;
        height: 0%;
        transition: all ease-in .2s;
        overflow-y: auto;
    }
    .active-modal {
        opacity: 1;
        height: 100%;
        transition: all ease-in .2s;
    }
    .voters-block__title {
        width: 520px;
        font-family: 'FiraSans-Medium';
        font-size: 30px;
        font-weight: 500;
        font-style: normal;
        font-stretch: normal;
        line-height: 1.17;
        letter-spacing: normal;
        text-align: left;
        color: #ffffff;
        margin: 0 0 10px 0;
    }
    .voters-block__subtitle {
        width: 360px;
        font-family: 'FiraSans-Regular';
        font-size: 14px;
        font-weight: normal;
        font-style: normal;
        font-stretch: normal;
        line-height: 1.43;
        letter-spacing: normal;
        text-align: left;
        color: #ffffff;
        margin: 0 0 30px 0;
    }
    .voters-block .content {
        width: 100%;
        height: 50px!important;
    }
    .content__left {
        float: left;
        position: relative;
        padding-right: 10px;
        font: 20px 'FiraSans-Bold', sans-serif;
        color: #000;
        z-index: 1;
        background: #3e43c8;
        color: #fff;
    }
    .content__right {
        float: right;
        position: relative;
        padding-left: 10px;
        font: 20px 'FiraSans-Bold', sans-serif;
        color: #000;
        z-index: 1;
        background: #3e43c8;
        color: #fff;
    }
    .voters-block .content {
        position: relative;
        height: 20px;
        padding: 10px 0;
    }
    .voters-block .content::before {
        content: '';
        display: block;
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        border-top: 1px dashed #fff;
    }
    .first-items {
        margin-bottom: 40px;
    }
    .right-part__content .news-item {
        margin-bottom: 0px;
    }
}
@media screen and (min-width: 320px) and (max-width: 767px) {
    #russian_map svg {
        display: none;
    }
    .active-modal {
        padding: 70px 20px 20px 20px;
    }
    .right-part__content {
        padding: 20px 0 20px 20px!important;
    }
    .map {
        padding: 160px 20px 40px 20px;
    }
    .left-part .text .text__number {
        font-size: 50px;
        line-height: 50px;
        width: 100%;
    }
    .left-part .text .text__middle {
        width: 100%;
        margin-bottom: 10px;
        margin-top: 0px;
        color: #fff;
        font-size: 20px;
        line-height: 25px;
        font-family: 'FiraSans-Medium';
        text-align: left;
        text-align: -webkit-left;
    }
    .left-part .text .text__bottom {
        width: 100%;
        margin-bottom: 10px;
        margin-top: 0px;
        color: #fff;
        font-size: 12px;
        line-height: 15px;
        font-family: 'FiraSans-Regular';
        text-align: left;
        text-align: -webkit-left;
    }
    .map-bottom-colors {
        display: none;
    }
    .left-part .text {
        padding-left: 0;
        width: 100%;
        height: 100%;
        left: 0!important;
    }
    .color-block .text {
        margin-left: 10px;
    }
    .fh-page__header .left-part.map-bottom {
        position: relative;
        padding: 0!important;
        float: none;
        text-align: left;
        text-align: -webkit-left;
        left: initial;
        bottom: initial;
        margin-top: 0;
        margin-bottom: 0px;
        margin-left: 10px;
    }
    .news-part {
        width:  100%!important;
    }
    .btn-yavka {
        font-size: 16px!important;
        line-height: 20px!important;
        margin: 20px 0 10px 0!important;
    }
    .online-btn {
        height: 40px!important;
        line-height: 40px!important;
        font-size: 16px!important;
    }
    .fh-page__middle .candidates-item {
        width: 100%!important;
    }
    .online-wrapper .onl-block {
	    padding: 20px;
	}
	.onl-block .top .top__title {
	    font-size: 20px;
	    line-height: 25px;
	}
	.onl-block .bottom .bottom__text {
	    font-size: 12px;
	    line-height: 15px;
	}
	.fh-left .text .text__title {
	    width: auto;
	    font-size: 20px;
	    line-height: 25px;
	    margin-bottom: 10px;
	}
	.fh-left .text .text__subtitle {
	    width: auto;
	    font-size: 12px;
	    line-height: 15px;
	    margin-bottom: 10px;
	}
	.fh-header {
	    height: 300px;
	}
	.fh-left .text {
	    left: 20px;
	    width: auto;
	    bottom: 20px;
	}
	.fh-page__middle .candidates-item {
	    height: 150px;
	}

	.fh-page__middle .candidates-img {
	    margin: 25px 10px 10px 10px;
	}

	.fh-page__middle .candidates-img img {
	    width:  104px;
	    height: 104px;
	}

	.fh-page__middle .candidate h4 {
	    font-size:  18px;
	    line-height: 20px;
	    margin: 0;
	}

}

</style>
<div class="fh">
	<div class="fh-header">
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
		<div class="fh-right hide-mobile">
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
	<div class="fh-right hide-desktop">
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
	<div class="fh-page__middle">
		<div class="news right-part__content hide-desktop">
            <div><h4 class="title">Новости</h4></div>
            <div class="news_inner">
                <?php if($news):?>
                    <div id="news-slider" class="owl-carousel">
                        <?php foreach ($news as $n):?>
                            <div class="news-item">
                                <div class="news-item_date"><?=$n->viewDate;?></div>
                                <div class="news-item_title">
                                    <a href="<?=$n->url;?>" target="_blank"><?=$n->title;?></a>
                                </div>
                                <a href="http://tass.ru/vybory-prezidenta-rf-2018" class="all-news" target="_blank">Все новости</a>
                            </div>
                        <?php endforeach;?>
                    </div>
                <?php endif;?>
            </div>
        </div>
        <div class="left-part">
            <div class="left-part__content">
                <div class="left-part__title">
                    <h2 class="title">
                        Кандидаты
                    </h2>
                </div>
                <?php foreach ($candidates as $c):?>
                    <a href="<?=$c->url;?>" class="candidates-item">
                        <div class="candidates-img">
                            <img src="<?=$c->imageUrl;?>" alt="<?=$c->nameAndSurname;?>">
                        </div>
                        <div class="candidate">
                            <h4><?=$c->nameAndSurname;?></h4>
                            <?php if($c->active == Candidate::QUIT):?>
                            <p>
                                Выбыла из президентской гонки
                            </p>
                            <?php endif;?>
                        </div>
                    </a>
                <?php endforeach;?>
            </div>
        </div>
        <div class="right-part__content hide-mobile">
            <div class="right-part__title">
                <h2 class="title">
                    Новости
                </h2>
            </div>
            
            <?php if($news):?>
                <?php foreach ($news as $n):?>
                    <a href="<?=$n->url;?>" class="news-item">
                        <p class="item__time"><?=$n->viewDate;?></p>
                        <p class="item__text"><?=$n->title;?></p>                   
                    </a>
                <?php endforeach;?>
            <?php endif;?>
        </div>
    </div>  
</div>


