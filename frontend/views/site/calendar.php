<div class="card-header calendar-header">
	<div class="container">
		<div class="left">
			<p class="tt-top">
				Выборы президента России
			</p>
			<div id="calendar-date">
				<?php foreach ($items as $item):?>
					<div class="item <?=$item->id == $id ? 'slick-active' : '';?>" data-id="<?=$item->id;?>">
		        		<h1>
							<?=$item->viewDate;?>
						</h1>
						<?=$item->text;?>				
		      		</div>
		      	<?php endforeach;?>
			</div>
		</div>
		<div class="right"></div>
	</div>
</div>
<div class="dates-wrapper">
	<div class="container-custom">
		<div class="calendar-triangle"></div>
	</div>
	<div class="container-custom-mobile">
		<div class="calendar-triangle-mobile"></div>
	</div>
	<div class="bottom">
		<div id="calendar-dates" style="z-index:1;">
			<?php foreach ($items as $item):?>
				<div class="item slick-active" data-id=<?=$item->id;?>>
			        <p class="item__title"><?=$item->viewDate;?></p>
			        <p class="item__text">
			        	<?=$item->title;?>
			        </p>
			        <div class="timeline"></div>
		      	</div>
		    <?php endforeach;?>
	  </div>
	  <div class="calendar__line">
		  <div class="container-custom">
				<div class="header-timeLine" id="calendar-timeline">
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

<?php 
	$initial = $id ? $id : 0;
	$script = "
		$('#calendar-date').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			initialSlide: ".$initial.",
			arrows: false,
			fade: true,
			asNavFor: '#calendar-dates',
			focusOnSelect: true
		});


	    $('#calendar-dates').slick({
	        dots: false,
	        slidesToShow: 6,
			initialSlide: ".$initial.",
	        arrows: true,
	        variableWidth: true,
	        slidesToScroll: 1,
	        infinite: true,

	        asNavFor: '#calendar-date',

	        nextArrow: '<i class=\"fa fa-angle-right next-arrow\" aria-hidden=\"true\"></i>',
	        prevArrow: '<i class=\"fa fa-angle-left prev-arrow\" aria-hidden=\"true\"></i>',
	        focusOnSelect: true,
	        responsive: [
	          {
	            breakpoint: 768,
	            settings: {
	              arrows: true,
	              slidesToShow: 5
	            }
	          },
	          {
	            breakpoint: 480,
	            settings: {
	              arrows: true,
	              variableWidth: false,
	              slidesToShow: 3,
	              nextArrow: `
	              <div class=\"next-arrow-mobile\">
	                <i class=\"fa fa-angle-right\" aria-hidden=\"true\"></i>
	              </div>`,
	              prevArrow: `
	              <div class=\"prev-arrow-mobile\">
	                <i class=\"fa fa-angle-left\" aria-hidden=\"true\"></i>
	              </div>`
	            }
	          }
	        ]
	    });
	";

	$this->registerJs($script, yii\web\View::POS_END);
?>


<style>
	.test1 {
		display: inline-block;
		width: 44%!important;
	}
	.test2 {
		display: inline-block;
		width: 48%!important;
	}
	.test3 {
		max-width: 560px!important;
	}
	.test4 {
		display: flex;
		justify-content: space-between;
	}
	#calendar-dates .special-date {
		position: relative;
	}
	#calendar-dates .special-date .item__text::before {
    position: absolute;
    top: -37px;
    left: 80px;
    width: 25px;
    height: 25px;
    background: #f9f9f9 url(../images/icons/green-dot.svg) no-repeat center;
    z-index: 2;
	}
	#calendar-dates .special-date .timeline {
		position: absolute;
    height: 1px;
    background-color: #1fb38c;
    width: 60px;
    bottom: 46%;
    z-index: 1;
    right: 90px;
	}
	.container-custom {
		margin-left: 105px;
	}
	.container-custom-mobile {
		display: none;
	}
	.calendar-triangle {
		width: 0;
		height: 0;
		border-style: solid;
		border-width: 20px 10px 0 10px;
		border-color: #1fb38c transparent transparent transparent;
	}
	.calendar-triangle-mobile {
		display: none;		
	}	
	.calendar-header {
		background-color: #1fb38c;
	}
	.calendar-header .right {
    position: absolute!important;
    bottom: 0;
    right: 0;
    width: 50%!important;
    height: 500px;
    z-index: 0;
	}
	.calendar-header .right:after {
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
	.calendar-header .left {
		width: 100%!important;
		z-index: 1;
	}
	.calendar-header .left h1 {
    margin: 100px 0 40px 0!important;
    text-transform: uppercase;
	}
	.calendar-header .left p {
		color: #ffffff;
    line-height: 1.67;
    font-size: 18px;
    margin: 0;
    text-transform: initial;
    margin-bottom: 15%;
    height: auto;
    overflow: auto;
    padding-right: 10px;
    width: 50%;
	}
	.tt-top {
		color: #ffffff;
    line-height: 1.25;
    font-size: 24px;
    position: absolute;
    top: 58px;
	}
/*timeline styles*/
	.calendar__line {
		position: absolute;
    width: 100%;
    top: 48%;
	}
	#calendar-timeline {
		position: absolute;
		width: 100%;
		top: 50%;
	}
	#calendar-timeline .header-timeLine_middle .green-dot {
		left: -5px;
	}
	#calendar-timeline .header-timeLine_middle:after {
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
	#calendar-timeline .header-timeLine_middle:before {
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
/*timeline styles___*/
/*slick modifications*/
	.next-arrow {
		position: absolute;
    right: 12%;
    top: -80px;
    display: flex;
    color: #fff;
    font-size: 40px;
	}
	.next-arrow-mobile {
    position: absolute;
    right: -25px;
    top: 0;
    color: #252aa6;
    font-size: 30px;
    align-self: center;
    height: 10vh;
    display: flex;
    justify-content: center;
	}
	.next-arrow-mobile i {
		display: flex;
		align-self: center;
	}
	.next-arrow:hover {
		cursor: pointer;
	}
	.prev-arrow {
		position: absolute;
    right: 20%;
    top: -80px;
    display: flex;
    color: #fff;
    font-size: 40px;
	}
	.prev-arrow-mobile {
    position: absolute;
    left: -25px;
    top: 0;
    color: #252aa6;
    font-size: 30px;
    align-self: center;
    height: 10vh;
    display: flex;
    justify-content: center;
	}
	.prev-arrow-mobile i {
		display: flex;
		align-self: center;
	}
	.prev-arrow:hover {
		cursor: pointer;
	}
/*slick modifications___*/
/*main slider*/
	.dates-wrapper {
		background: #f9f9f9;
		padding-bottom: 30px;
		position: relative;
	}
	#calendar-dates .item {
    margin: 30px 0 0 -1px;
    width: 272px;
	}
	#calendar-dates .item:focus {
		outline: none;
	}
	#calendar-dates .item:hover {
		cursor: pointer;
	}
	#calendar-dates .item__title {
		max-width: 160px;
		color: #252aa6;
		font-size: 18px;
		line-height: 1.39;
    margin-left: 105px;
	}
	#calendar-dates .item__text {
		max-width: 160px;
		color: #636363;
		font-size: 14px;
		line-height: 1.43;
		margin: 50px 0 0 0;
		position: relative;
    margin-left: 105px;
	}
	#calendar-dates .item__text::before {
    content: '';
    display: block;
    position: absolute;
    top: -30px;
    left: -3px;
    height: 10px;
    width: 25px;
    background: #f9f9f9 url(../images/icons/dot.svg) no-repeat center;
    z-index: 2;
	}
/*main slider___*/
/*@media*/
	@media screen and (max-width : 1000px) {
		.card-header .container .right {
      top: initial;
	    bottom: 0;
	    right: 0;
		}
	}
	@media screen and (min-width : 768px) and (max-width : 1321px) {
		.calendar-header .tt-top {
      left: 142px;
    }
    .calendar-header .right {
	    padding-left: 105px!important;
      top: inherit!important;
			bottom: 0;
		}
	}
	@media screen and (min-width : 501px) and (max-width : 800px) {
		.calendar-header .left p {
			width: 90%!important;
		}
		.calendar-header .right {
	    margin: 0 25% 0 0;
		}
		.next-arrow {
			right: 5%;
		}
		.prev-arrow {
			right: 10%;
		}
	}
	@media screen and (min-width : 501px) and (max-width : 767px) {
    #calendar-dates .item__text:before {
			top: -45px;
    }
	}
	@media screen and (max-width : 767px) {
		.test1 {
	    display: block;
	    width: 100%!important;
		}
		.test2 {
	    display: block;
	    width: 100%!important;
		}
		.test4 {
			display: flex;
	    justify-content: space-between;
	    flex-direction: column;
	    margin-top: 30px;
		}
		#calendar-timeline .header-timeLine_middle {
	  	background-color: #d0d0d0;
	  }
	  .calendar-header .tt-top {
      display: none;
    }
    #calendar-dates .special-date .timeline {
    	display: none;
    }
	}
	@media screen and (max-width : 650px) {
		.container-custom-mobile {
	    display: block;
	    left: 65px;
	    position: absolute;
		}
    .calendar__line {
      display: none;
    }
		.calendar-header {
			height: 90vh;
		}
    .calendar-header .right:after {
	    right: 0px;
	    width: 160px;
	    left: inherit;
		}
		.calendar-header .left {
	    height: 90vh;
	    overflow: auto;
		}
		.calendar-header .left h1 {
	    margin: 60px 0 0 0!important;
		}
		.calendar-header .left p {
			padding-right: 10px;
			margin: 0 0 20px 0!important;
			font-size: 16px;
			width: 100%;
		}
		.calendar-triangle {
			display: none;
		}
		.calendar-triangle-mobile {
			display: block;	
			width: 0;
			height: 0;
			border-style: solid;
			border-width: 1vh 10px 0 10px;
			border-color: #1fb38c transparent transparent transparent;	
		}
		.dates-wrapper {
	    z-index: 9999;
	    bottom: 0;
      height: 10vh;
      padding: 0 30px;
		}
		#calendar-dates .item {
	    margin: 0;
	    width: 150px;
	  }
	  #calendar-dates .item__title {
	    margin-left: 20px;
      padding-top: 5px!important;
      height: 10vh;
	    display: flex;
	    align-items: center;
	    justify-content: center;
	    font-size: 12px;
		}
		#calendar-dates .item__text {
			display: none;
		}
	}
/*@media___*/
::-webkit-scrollbar-track {
	border-radius: 10px;
	background-color: #1fb38c;
}
::-webkit-scrollbar {
	width: 2px;
}
::-webkit-scrollbar-thumb {
	border-radius: 10px;
	background-color: #f9f9f9;
}
</style>

