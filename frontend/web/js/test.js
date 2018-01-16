$(document).ready(function () {
	var rightAnswers = 0;

	$('.nextQuestion').on('click', function(e) {
		$('.test-wrap').removeClass('correct incorrect');
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
	       $(this).closest('.test-wrap').addClass('correct');
	       $(this).closest('.pull-right').find('.right').removeClass('hide');
	       rightAnswers++;
	    } else {
	       $(this).closest('.test-wrap').addClass('incorrect');
	       $(this).closest('.pull-right').find('.wrong').removeClass('hide');
	    }
	});
});