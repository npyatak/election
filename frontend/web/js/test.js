$(document).ready(function () {
	var rightAnswers = 0;
	var questLength = 0;
	var step = 0;
	$('#finish-btn-left').click(function() {
		rightAnswers = 0;
		questLength = 0;
		step = 0;
	})
	$('#finish-btn-right').click(function() {
		rightAnswers = 0;
		questLength = 0;
		step = 0;
	})

	$('input:radio[name="question"]').change(function(e) {
		$(this).closest('.container').find('.check-block').removeClass('hide').find('span').html($(this).closest('.form-group').find('label').html());

	    $(this).closest('.test-checkbox').addClass('hide');

	    if($(this).closest('.form-group').data('right')) {
	    	// adding correct background
			$(this).closest('.hidden-container').addClass('correct-background');
			$(this).closest('.right-part').addClass('correct-background');
			$(this).closest('.right-part').children('.test-text.right').children('p').attr('id','bb-nav-next')
			$(this).closest('.right-part').find('.right').removeClass('hidden-animated');

			if ($(this).closest('.right-part').hasClass('correct-background') && !$(this).closest('.right-part').hasClass('hide')) {
				$('.nextQuestion').removeClass('hide-btn')
			}
			rightAnswers++;
	    } else {
			// adding incorrect background
			$(this).closest('.hidden-container').addClass('incorrect-background');
			$(this).closest('.right-part').addClass('incorrect-background');
			$(this).closest('.right-part').children('.test-text.wrong').children('p').attr('id','bb-nav-next')
			$(this).closest('.right-part').find('.wrong').removeClass('hidden-animated');
			if ($(this).closest('.right-part').hasClass('incorrect-background') && !$(this).closest('.right-part').hasClass('hide')) {
				$('.nextQuestion').removeClass('hide-btn')
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
				shadowSides : 0.9,
				shadowFlip : 0.9,
				orientation : orient
			} );
			initEvents();
		},
		initEvents = function() {
			var $slides = config.$bookBlock.children()
			config.$navNext.on( 'click touchstart', function(e) {
				var questionsLength = $('.test-wrap').children('.t').length
				buttonNext = $('.nextQuestion')
				if (buttonNext.hasClass('start-position')) {
					$('.nextQuestion').removeClass('start-position')
					$('.nextQuestion').removeClass('btn-white')
					$('.nextQuestion').addClass('next-position')
					$('.nextQuestion').addClass('next-btn')
					$('.test-wrap').css('background' ,'#3e43c8')
					
					step = 1

				} else step++
				$('.nextQuestion').addClass('animate-fade')
				$('.nextQuestion').removeClass('next-position')
				$('.nextQuestion').addClass('next-position')
				$('.nextQuestion').addClass('hide-btn')
				$('.test-wrap').css('background' ,'#252aa6')
				$("#bb-nav-next").html('Продолжить<i class="fa fa-angle-right"></i>')
				config.$bookBlock.bookblock( 'next' );
				if (step === questionsLength) {
					config.$bookBlock.bookblock( 'next' );
					$("#bb-nav-next").html('Результат<i class="fa fa-angle-right"></i>')
				} else if (step > questionsLength) {
					$('#finish-btn-left').addClass('hide-btn')
					$('#finish-btn-right').addClass('hide-btn')
					var percentage = parseInt(((rightAnswers * 100) / 8).toFixed())
					setTimeout(function() {
						$('.result-range-item').each(function(index) {
							if($(this).data('start') <= rightAnswers && $(this).data('end') >= rightAnswers) {
								$(this).removeClass('hide');
							}
						});
						if (rightAnswers > 4) {
							$('#prgs-circle').addClass('over50');
						}
						$('#result-range').addClass('animate-fade');
						$('#prgs-circle').addClass('p'+percentage);
						$('#questionBlock').addClass('hide');
						$('#questionBlock[data-key="'+questionsLength+'"]').addClass('hide');
						$('#resultBlock').removeClass('hide');
						$('.result-container').removeClass('hide');
						$('#finish-btn-left').removeClass('hide-btn');
						$('#finish-btn-right').removeClass('hide-btn');
						$('#result-text').html(rightAnswers) ;
						$('#result-range-container').removeClass('hide')
						$('#prgs-circle').addClass('animate-fade') 
						$('#progress-circle-wrapper').addClass('animate-fade') 
					}, 1300);
					config.$bookBlock.bookblock( 'next' );
				}
				return false;
			});
		};
		return { init : init };
	})();

	Page.init();
});