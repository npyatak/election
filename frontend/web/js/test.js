$(document).ready(function () {
	var rightAnswers = 0;
	var questLength = 0;
	var step = 0;
	$('input:radio[name="question"]').change(function(e) {
		$(this).closest('.container').find('.check-block').removeClass('hide').find('span').html($(this).closest('.form-group').find('label').html());

	    $(this).closest('.test-checkbox').addClass('hide');

	    if($(this).closest('.form-group').data('right')) {
	    	// adding correct background
			$(this).closest('.hidden-container').addClass('correct-background');
			$(this).closest('.right-part').addClass('correct-background');
			$(this).closest('.right-part').find('.right').removeClass('hide');

			if ($(this).closest('.right-part').hasClass('correct-background') && !$(this).closest('.right-part').hasClass('hide')) {
				$('.nextQuestion').removeClass('hide')
			}
			rightAnswers++;
	    } else {
			// adding incorrect background
			$(this).closest('.hidden-container').addClass('incorrect-background');
			$(this).closest('.right-part').addClass('incorrect-background');
			$(this).closest('.right-part').find('.wrong').removeClass('hide');
			if ($(this).closest('.right-part').hasClass('incorrect-background') && !$(this).closest('.right-part').hasClass('hide')) {
				$('.nextQuestion').removeClass('hide')
			}
	    }
	});


	var Page = (function() {
		var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
		var height = (window.screen.availHeight > 0) ? window.screen.availHeight : window.screen.height;
	   if ((width < 600) && (width>height)) {
			$('#testID').addClass('custom-pos')
			$('#testID2').addClass('custom-pos2')
		}
		var orient = (width >= 1199) ? 'vertical' : 'horizontal'
		
		var config = {
			$bookBlock : $( '#bb-bookblock' ),
			$navNext : $( '#bb-nav-next' ),
			$navPrev : $( '#bb-nav-prev' )
		},
		init = function() {
		config.$bookBlock.bookblock( {
				speed : 900,
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
				if (buttonNext.hasClass('start-position')) {
					$('.nextQuestion').removeClass('start-position')
					$('.nextQuestion').removeClass('btn-white')
					$('.nextQuestion').addClass('next-position')
					$('.nextQuestion').addClass('next-btn')
					step = 1
				} else step++
				$('.nextQuestion').addClass('hide')
				$("#bb-nav-next").html('Продолжить<i class="fa fa-angle-right"></i>')
				if (step === questionsLength) {
					$("#bb-nav-next").html('Результат<i class="fa fa-angle-right"></i>')
				} else if (step > questionsLength) {
					$('#finish-btn-left').addClass('hide-btn')
					$('#finish-btn-right').addClass('hide-btn')
					setTimeout(function() {

						if (rightAnswers < 4 || rightAnswers === 4) {
							console.log(rightAnswers);
							$('#result-range').addClass('animate-fade')
							$('#prgs-circle').addClass('p'+rightAnswers+'0')
							$('#result-range-container').children('#result-range[data-start=0]').removeClass('hide')
							$('#questionBlock').addClass('hide')
							$('#questionBlock[data-key="'+questionsLength+'"]').addClass('hide')
							$('#resultBlock').removeClass('hide')
							$('.result-container').removeClass('hide')
							$('#finish-btn-left').removeClass('hide-btn')
							$('#finish-btn-right').removeClass('hide-btn')
							$('#result-text').html(rightAnswers) 
						} else if (rightAnswers >= 5 && rightAnswers <= 8) {
							$('#result-range').addClass('animate-fade')
							$('#prgs-circle').addClass('p'+rightAnswers+'0')
							$('#prgs-circle').addClass('over50')
							$('#result-range-container').children('#result-range[data-start=5]').removeClass('hide')
							$('#questionBlock').addClass('hide')
							$('#questionBlock[data-key="'+questionsLength+'"]').addClass('hide')
							$('#resultBlock').removeClass('hide')
							$('.result-container').removeClass('hide')
							$('#finish-btn-left').removeClass('hide')
							$('#finish-btn-right').removeClass('hide')
							$('#result-text').html(rightAnswers)
						} else if (rightAnswers === 9 || rightAnswers === 10) {
							$('#result-range').addClass('animate-fade')
							$('#prgs-circle').addClass('p'+rightAnswers+'0')
							$('#prgs-circle').addClass('over50')
							$('#result-range-container').children('#result-range[data-start=9]').removeClass('hide')
							$('#questionBlock').addClass('hide')
							$('#questionBlock[data-key="'+questionsLength+'"]').addClass('hide')
							$('#resultBlock').removeClass('hide')
							$('.result-container').removeClass('hide')
							$('#finish-btn-left').removeClass('hide-btn')
							$('#finish-btn-right').removeClass('hide-btn')
							$('#result-text').html(rightAnswers) 
						}
						$('#prgs-circle').addClass('animate-fade') 
						$('#progress-circle-wrapper').addClass('animate-fade') 
					}, 1300);
				}
				return false;
			});
		};
		return { init : init };
	})();

	Page.init();
});