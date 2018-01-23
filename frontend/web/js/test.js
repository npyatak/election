$(document).ready(function () {
	var rightAnswers = 0;

	$('.nextQuestion').on('click', function(e) {
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
			alert('Правильных: '+rightAnswers);
		}

		return false;
	});

	$('input:radio[name="question"]').change(function() {
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



				// $(this).closest('.test-wrap').addClass('incorrect');
				// $(this).closest('.test-wrap').find('.right-sww').addClass('incorrect-background');
				// $(this).closest('.right-part').find('.wrong').removeClass('hide');
				// $(this).closest('.right-part').find('.incorrect-icon').removeClass('hide');

	    }
	});
});