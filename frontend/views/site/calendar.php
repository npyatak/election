<?php 
use yii\helpers\Url;

$this->registerCssFile(Url::toRoute('css/calendar.css'));
?>

<div class="card-header calendar-header">
	<div class="custom-container">
		<div class="left">
			<div id="calendar-date" style="z-index:3;">
				<?php foreach ($items as $item):?>
					<div 
						class="item <?=$item->id == $id ? 'slick-active slick-current' : '';?>"
						data-id="<?=$item->id;?>"
					>
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
		<div id="calendar-dates" style="z-index:3;">
			<?php $initialId = $id ? $id : $closestId;?>
			<?php foreach ($items as $key => $item):?>
				<?php if($initialId == $item->id) {
					$initial = $key;
				}?>
				<div class="item slick-active" data-id=<?=$item->id;?>>
			        <p class="item__title"><?=$item->viewDate;?></p>
			        <p class="item__text" id="item-text">
			        	<?=$item->title;?>
			        </p>
			        <div class="timeline"></div>
		      	</div>
		    <?php endforeach;?>
	  </div>	
	</div>
</div>

<?php $script = "
	if ($initial !== 1) $('#calendar-date').find('.col-md-6').addClass('hide');
    $('#calendar-dates').on('beforeChange', function(event, slick, currentSlide, nextSlide) {
		$(this).closest('#calendar-date').find('.col-md-6')
		$('.slick-slide[data-id=21]').children('.item__title').css('width', '94px')
		if (nextSlide === 1) {
			$('#calendar-date').find('.col-md-6').removeClass('hide')
			$('.slick-slide[data-id=2]').children('#item-text').children('span').addClass('change-line')

		}
		else {
			$('#calendar-date').find('.col-md-6').addClass('hide')
			$('.slick-slide[data-id=2]').children('#item-text').children('span').removeClass('change-line')
		}
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

$('#calendar-dates .item').on('click', function() {
    window.history.pushState(null, '', '".Url::toRoute(['site/calendar'])."/'+$(this).data('id'));
});
";

$this->registerJs($script, yii\web\View::POS_END);