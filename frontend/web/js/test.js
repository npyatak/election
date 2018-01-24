$(document).ready(function () {
	var rightAnswers = 0;
	$('.nextQuestion').on('click', function(e) {
		$('.nextQuestion').addClass('hide')
		$('.test-wrap').removeClass('correct incorrect');
		$('.test-wrap').removeClass('correct incorrect');
		$(this).closest('.test-wrap').find('.right-sww').removeClass('correct-background incorrect-background');
		$(this).closest('.right-part').removeClass('correct-background');
		$(this).closest('.container').addClass('hide');
		key = parseInt($(this).closest('.container').data('key'));
		nextKey = key + 1;
		nextContainer = $('.container[data-key="'+nextKey+'"]');
		if(nextContainer.length) {
			nextContainer.removeClass('hide');
		} else {
			// rightAnswers = 7
			$(this).closest('.test-wrap').find('.result-container').removeClass('hide');
			if (rightAnswers <= 5 ) {
				$(this).closest('.test-wrap').find('.progress-circle').addClass('p'+rightAnswers+'0');
			} else if (rightAnswers > 5) {
				$(this).closest('.test-wrap').find('.progress-circle').addClass('p'+rightAnswers+'0');
				$(this).closest('.test-wrap').find('.progress-circle').addClass('over50');
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