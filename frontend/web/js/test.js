$(document).ready(function () {
	var rightAnswers = 0;
	var questLength = 0;
	$('.nextQuestion').on('click', function(e) {
		console.log(rightAnswers);
		$('.nextQuestion').addClass('hide')
		$('.nextQuestion').removeClass('start-position')
		$('.nextQuestion').addClass('next-position')
		$('.nextQuestion').addClass('next-btn') 
		$('.nextQuestion').removeClass('btn-white') 
		var t = document.getElementsByClassName('bb-item container t')
		var currentTemp = parseInt($("#testID").data('value'))
		var current = currentTemp + 1
		questLength = t.length
		document.getElementById("bb-nav-next").innerHTML  = 'Продолжить<i class="fa fa-angle-right"></i>'
		// $('.test-wrap').removeClass('correct incorrect');
		// $('.test-wrap').removeClass('correct incorrect');
		// $(this).closest('.test-wrap').find('.right-sww').removeClass('correct-background incorrect-background');
		// $(this).closest('.right-part').removeClass('correct-background');
		// $(this).closest('.container').addClass('hide');
		key = parseInt($(this).closest('.container').data('key'));
		nextKey = key + 1;
		nextContainer = $('.container[data-key="'+nextKey+'"]');
		if(current <= questLength) {
			// nextContainer.removeClass('hide');
			console.log('continue');
		} else {
			// rightAnswers = 7
			console.log('STOP');
			// $(this).closest('.test-wrap').find('.result-container').removeClass('hide');
			$('#questionBlock').addClass('hide')
			$('#questionBlock[data-key="'+questLength+'"]').addClass('hide')
			$('#resultBlock').removeClass('hide')

			$('result-container test-container').removeClass('hide')
			if (rightAnswers <= 5 ) {
				$('#prgs-circle').addClass('p'+rightAnswers+'0');
			} else if (rightAnswers > 5) {
				$('#prgs-circle').addClass('p'+rightAnswers+'0');
				$('#prgs-circle').addClass('over50');
			}
			document.getElementById("result-text").innerHTML  = rightAnswers
		}

		return false;
	});

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
});