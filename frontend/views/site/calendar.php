<div class="card-header calendar-header">
	<div class="custom-container">
		<div class="left">
			<div id="calendar-date" style="z-index:3;">
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
	<div class="custom-container">
		<div class="calendar-triangle"></div>
	</div>
	<div class="calendar__line">
	  <div class="custom-container">
			<div class="header-timeLine" id="calendar-timeline">
			    <div class="header-timeLine_middle">
		        <div class="green-dot"></div>
			    </div>
			    <div class="left-sw"></div>
			</div>
		</div>
	</div>
	<div class="bottom">
		<div class="cover-up"></div>
		<!-- <div class="bottom__left-button"></div>
		<div class="bottom__right-button"></div> -->
		<div id="calendar-dates" style="z-index:3;">
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
	</div>
</div>

<?php 
	$initial = $id ? $id : 0;
	$script = "
		if ($initial !== 1) $('#calendar-date').find('.col-md-6').addClass('hide')
    $('#calendar-dates').on('beforeChange', function(event, slick, currentSlide, nextSlide){
      $(this).closest('#calendar-date').find('.col-md-6')
      if (nextSlide === 1) $('#calendar-date').find('.col-md-6').removeClass('hide')
      else $('#calendar-date').find('.col-md-6').addClass('hide')
    });

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
        slidesToShow: 5,
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
            breakpoint: 1199,
            settings: {
              arrows: true,
              slidesToShow: 4
            }
          },
          {
            breakpoint: 768,
            settings: {
              arrows: true,
              slidesToShow: 4
            }
          },
          {
            breakpoint: 700,
            settings: {
              arrows: true,
              variableWidth: false,
              centerMode: true,
              focusOnSelect: true,
              slidesToShow: 3,
              nextArrow: '<div class=\"next-arrow-mobile\"><i class=\"fa fa-angle-right\" aria-hidden=\"true\"></i></div>',
              prevArrow: '<div class=\"prev-arrow-mobile\"><i class=\"fa fa-angle-left\" aria-hidden=\"true\"></i></div>'
            }
          }
        ]
    });
	";

	$this->registerJs($script, yii\web\View::POS_END);
?>


<style>
	.bottom__left-button {
		display: none;
	}
	.bottom__right-button {
		display: none;
	}
	.custom-container {
    margin: 0 100px;
    position: relative;
    padding: 0 40px;
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
		padding-bottom: 40px;
	}
	.calendar-header .left h1 {
    margin: 100px 0 40px 0!important;
    text-transform: uppercase;
    max-width: 540px!important;
	}
	.calendar-header .left ul {
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
	.calendar-header .row {
    justify-content: space-around;
    display: flex;
    align-items: flex-start;
	}
	.calendar-header .col-md-6 {
    color: #ffffff;
    line-height: 1.67;
    font-size: 18px;
    margin: 0;
    text-transform: initial;
    float: none;
    width: 50%;
	}
/*timeline styles*/
	.calendar__line {
		position: absolute;
    width: 100%;
    top: 100px;
	}
	#calendar-timeline {
		position: absolute;
		width: 100%;
		top: 0px;
	}
	#calendar-timeline .header-timeLine_middle .green-dot {
		left: -5px;
    z-index: 5;
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
    z-index: 2;
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
    z-index: 2;
	}
/*timeline styles___*/
/*slick modifications*/
	.next-arrow {
    position: absolute;
    right: 50px;
    top: -100px;
    color: #fff;
    font-size: 40px;
    width: 80px;
    height: 80px;
    transition: background-color .2s;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 4;
    margin: 0 100px 0 0;
    padding: 0 40px
	}
	.next-arrow-mobile {
    position: absolute;
    right: 0;
    top: 0;
    color: #252aa6;
    font-size: 30px;
    align-self: center;
    height: 10vh;
    display: flex;
    justify-content: center;
    width: 50px;
    background: #f3f3f3;
    z-index: 4;
	}
	.next-arrow-mobile i {
		display: flex;
		align-self: center;
	}
	.next-arrow:hover {
		background-color: #1c9576;
		transition: background-color .2s; 
		cursor: pointer;
	}
	.next-arrow:active {
    background-color: #188569;
		transition: background-color .2s; 
		cursor: pointer;
	}
	.prev-arrow {
    position: absolute;
    right: 230px;
    top: -100px;
    color: #fff;
    font-size: 40px;
    width: 80px;
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background-color .2s;
    z-index: 4;
	}
	.prev-arrow-mobile {
    position: absolute;
    left: 0;
    top: 0;
    color: #252aa6;
    font-size: 30px;
    align-self: center;
    height: 10vh;
    display: flex;
    justify-content: center;
    width: 50px;
    background: #f9f9f9;
    z-index: 4;
	}
	.prev-arrow-mobile i {
		display: flex;
		align-self: center;
	}
	.prev-arrow:hover {
		background-color: #1c9576;
		transition: background-color .2s; 
		cursor: pointer;
	}
	.prev-arrow:active {
    background-color: #188569;
		transition: background-color .2s; 
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
    width: 325px;
    padding-left: 40px;
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
    white-space: nowrap;
	}
	#calendar-dates .item__text {
		color: #636363;
    font-size: 14px;
    line-height: 1.43;
    margin: 50px 0 0 0;
    position: relative;
    padding-left: 105px;
    width: 255px;
	}
	#calendar-dates .item__text::before {
    content: '';
    display: block;
    position: absolute;
    top: -30px;
    right: 130px;
    height: 10px;
    width: 25px;
    background: #f9f9f9 url(../images/icons/dot.svg) no-repeat center;
    z-index: 2;
	}
	#calendar-dates .item__text span::before {
    content: '';
    display: block;
    position: absolute;
    top: -37px;
    right: 53px;
    height: 25px;
    width: 25px;
    background: #f9f9f9 url(../images/icons/green-dot.svg) no-repeat center;
    z-index: 2;
	}
	#calendar-dates .item__text span::after {
    content: '_______';
    display: block;
    position: absolute;
    top: -40px;
    color: #1fb38c;
    right: 75px;
    height: 20px;
    width: 55px;
    z-index: 2;
	}
/*main slider___*/
/*@media*/
	@media screen and (max-width : 1199px) {
		.card-header .container .right {
      top: initial;
	    bottom: 0;
	    right: 0;
		}
		.calendar-header .left ul {
			width: 80%!important;
		}
		.calendar-header .col-md-6:last-child {
			margin-bottom: 40px;
		}
    .calendar-header .right {
	    padding-left: 105px!important;
      top: inherit!important;
			bottom: 0;
		}
		.custom-container {
      margin: 0 15px;
	    padding: 0 15px;
		}
		#calendar-dates .item {
	    width: 220px;
	    display: flex;
	    justify-content: space-between;
	    align-items: flex-start;
	    flex-direction: column;
	    padding-left: 30px;
		}
		#calendar-dates .item__title {
			margin-left: 0;
		}
		#calendar-dates .item__text {
      margin: 35px 0 0 -1px;
	    padding-left: 0;
	    width: 160px;
		}
		#calendar-dates .item__text::before {
			top: -25px;
			left: -3px;
		}
		#calendar-dates .item__text span::before {
			top: -32px;
	    left: 72px;
		}
		#calendar-dates .item__text span::after {
			top: -35px;
	    right: 85px;
		}
		.next-arrow {
			margin: 0 20px 0 0;
			right: 0;
		}
		.prev-arrow {
			right: 100px;
		}
	}
	@media screen and (min-width : 768px) and (max-width : 1198px) {
		.calendar-header .right {
			right: 240px;
		}
		.calendar-header .left {
			height: 77vh;
		}
		.dates-wrapper {
			height: 23vh;
		}
		.calendar-header .row {
	    flex-direction: column;
		}
		.calendar-header .col-md-6 {
	    width: 100%;
		}
		.calendar-header .col-md-6:not(:last-child) {
			margin-bottom: 20px;
		}
	}
	@media screen and (min-width : 320px) and (max-width : 767px) {
		.calendar-header .row {
	    flex-direction: column;
		}
		.calendar-header .col-md-6 {
	    width: 100%;
		}
		.calendar-header .col-md-6:not(:last-child) {
			margin-bottom: 20px;
		}
		.calendar-header .right {
	    margin: 0 25% 0 0;
		}
		.next-arrow {
			right: 5%;
		}
		.prev-arrow {
			right: 15%;
		}
		#calendar-dates .item__text:before {
			top: -45px;
    }
		#calendar-timeline .header-timeLine_middle {
	  	background-color: #d0d0d0;
	  }
    .container-custom-mobile {
	    display: block;
	    left: 50%;
	    position: absolute;
		}
    .calendar__line {
      display: none;
    }
		.calendar-header {
			height: 90vh;
		}
		.calendar-header .col-md-6 {
			font-size: 16px;
			margin-bottom: 10px;
		}
    .calendar-header .right:after {
	    right: 0px;
	    width: 160px;
	    left: inherit;
		}
		.calendar-header .left {
	    height: 90vh;
	    overflow: auto;
	    padding-bottom: 10px;
		}
		.calendar-header .left h1 {
	    margin: 60px 0 20px 0!important;
		}
		.calendar-header .left ul {
			padding-right: 10px;
			margin: 0 0 20px 0!important;
			font-size: 16px;
			width: 100%!important;
		}
		.calendar-triangle {
			display: none;
		}
		.calendar-triangle-mobile {
			display: none;
		}
		.dates-wrapper {
	    z-index: 5;
	    bottom: 0;
      height: 10vh;
      padding: 0;
		}
		#calendar-dates .item {
	    margin: 0;
	    padding: 0;
	    align-items: center;
	  }
	  #calendar-dates .item__title {
      padding-top: 5px!important;
	    height: 10vh;
	    display: flex;
	    align-items: center;
	    justify-content: center;
	    font-size: 12px;
	    white-space: unset;
	    padding-left: 0;
	    padding-right: 0;
	    margin: 0;
	    transition: all .2s;
		}
		#calendar-dates .item__text {
			display: none;
		}
		.bottom {
			padding: 0;
		}
		.slick-current .item__title {
			display: none!important;
			transition: all .2s;
		}
		#calendar-dates {
			background: #f9f9f9;
			background: -moz-linear-gradient(left, #f9f9f9 0%, #ffffff 48%, #f9f9f9 50%, #f3f3f3 50%, #f3f3f3 100%);
			background: -webkit-linear-gradient(left, #f9f9f9 0%,#ffffff 48%,#f9f9f9 50%,#f3f3f3 50%,#f3f3f3 100%);
			background: linear-gradient(to right, #f9f9f9 0%,#ffffff 48%,#f9f9f9 50%,#f3f3f3 50%,#f3f3f3 100%);
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f9f9f9', endColorstr='#f3f3f3',GradientType=1 );
		}
		.cover-up {
			display: block;
	    width: 20%;
	    background: #f9f9f9;
			background: -moz-linear-gradient(left, #f9f9f9 0%, #ffffff 48%, #f9f9f9 50%, #f3f3f3 50%, #f3f3f3 100%);
			background: -webkit-linear-gradient(left, #f9f9f9 0%,#ffffff 48%,#f9f9f9 50%,#f3f3f3 50%,#f3f3f3 100%);
			background: linear-gradient(to right, #f9f9f9 0%,#ffffff 48%,#f9f9f9 50%,#f3f3f3 50%,#f3f3f3 100%);
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f9f9f9', endColorstr='#f3f3f3',GradientType=1 );
	    position: absolute;
	    bottom: 0px;
	    height: 10vh;
	    left: 40%;
	    z-index: 3;
		}
		.bottom__left-button {
			display: initial;
			position: absolute;
	    left: 0;
	    top: 0;
	    color: #252aa6;
	    font-size: 30px;
	    align-self: center;
	    height: 10vh;
	    display: flex;
	    justify-content: center;
	    width: 50%;
	    background: green;
	    z-index: 4;			
		}
		.bottom__right-button {
			display: initial;
			position: absolute;
	    right: 0;
	    top: 0;
	    color: #252aa6;
	    font-size: 30px;
	    align-self: center;
	    height: 10vh;
	    display: flex;
	    justify-content: center;
	    width: 50%;
	    background: red;
	    z-index: 3;
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

