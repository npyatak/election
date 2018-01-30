$(document).ready(function () {
	var rightAnswers = 0;
	var questLength = 0;
	var step = 0;
	$('input:radio[name="question"]').change(function() {
		$('.nextQuestion').removeClass('hide')
		$(this).closest('.container').find('.check-block').removeClass('hide').find('span').html($(this).closest('.form-group').find('label').html());

	    $(this).closest('.test-checkbox').addClass('hide');

	    if($(this).closest('.form-group').data('right')) {
	    	// adding correct background
			$(this).closest('.hidden-container').addClass('correct-background');
			$(this).closest('.test-wrap').find('.right-sww').addClass('correct-background');
			$(this).closest('.right-part').addClass('correct-background');

			$(this).closest('.right-part').find('.right').removeClass('hide');
			$(this).closest('.right-part').find('.correct-icon').removeClass('hide');
			rightAnswers++;
	    } else {
			// adding incorrect background
			$(this).closest('.hidden-container').addClass('incorrect-background');
			$(this).closest('.test-wrap').find('.right-sww').addClass('incorrect-background');
			$(this).closest('.right-part').addClass('incorrect-background');

			$(this).closest('.right-part').find('.wrong').removeClass('hide');
			$(this).closest('.right-part').find('.incorrect-icon').removeClass('hide');
	    }
	});


	var Page = (function() {
		var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
		var orient = (width >= 1199) ? 'vertical' : 'horizontal'
		var config = {
			$bookBlock : $( '#bb-bookblock' ),
			$navNext : $( '#bb-nav-next' ),
			$navPrev : $( '#bb-nav-prev' )
		},
		init = function() {
		config.$bookBlock.bookblock( {
				speed : 600,
				shadowSides : 0.6,
				shadowFlip : 0.6,
				orientation : orient
			} );
			initEvents();
		},
		initEvents = function() {
			var $slides = config.$bookBlock.children();
			config.$navNext.on( 'click touchstart', function() {
				config.$bookBlock.bookblock( 'next' );
				var questionsLength = $('.test-wrap').children('.t').length
				buttonNext = $('.nextQuestion')
				console.log('click');
				console.log('orient', orient)
				if (buttonNext.hasClass('start-position')) {
					$('.nextQuestion').removeClass('start-position')
					$('.nextQuestion').removeClass('btn-white')
					$('.nextQuestion').addClass('next-position')
					$('.nextQuestion').addClass('next-btn')
					step = 1
				} else step++
				$('.nextQuestion').addClass('hide')
				$("#bb-nav-next").html('Продолжить<i class="fa fa-angle-right"></i>')
				if(step <= questionsLength) console.log('continue')
				else {
					setTimeout(function() { 

						$('#questionBlock').addClass('hide')
						$('#questionBlock[data-key="'+questionsLength+'"]').addClass('hide')
						$('#resultBlock').removeClass('hide')

						$('.result-container').removeClass('hide')
						if (rightAnswers <= 4) {
							$('#prgs-circle').addClass('p'+rightAnswers+'0')
							$('#result-range-container').children('#result-range[data-start=0]').removeClass('hide')
						} else if (rightAnswers >= 5 && rightAnswers <=8) {
							$('#prgs-circle').addClass('p'+rightAnswers+'0')
							$('#prgs-circle').addClass('over50')
							$('#result-range-container').children('#result-range[data-start=5]').removeClass('hide')
						} else if (rightAnswers === 9 || rightAnswers === 10) {
							$('#prgs-circle').addClass('p'+rightAnswers+'0')
							$('#prgs-circle').addClass('over50')
							$('#result-range-container').children('#result-range[data-start=9]').removeClass('hide')
						}
						$('#result-text').html(rightAnswers) 

					}, 1000);
					
				}
				return false;
			});
		};
		return { init : init };
	})();

	Page.init();
});