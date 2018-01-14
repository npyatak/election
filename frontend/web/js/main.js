$(document).ready(function () {
    
    $(window).resize(function () {
        var cont = $('.container').width();
        var win = $(this).width();
        var hei = $(this).height();
        $('.left-sw').css({left: -(win - cont) / 2});
        $('.right-sw').css({right: -(win - cont) / 2});
        
        $('.height').css({'min-height':hei});
    });
    $(window).trigger('resize');

    $('#candidate-quotes').owlCarousel({
        items: 1,
        margin: 10,
        loop: true,
        autoplay: false,
        nav: true,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        dots: true
    });

    $('#candidate-hobbies').owlCarousel({
        items: 1,
        margin: 10,
        loop: false,
        autoplay: false,
        nav: true,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        dots: true
    });

    $('.slick-slider').slick({
        dots: true,
        vertical: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        verticalSwiping: true,
        arrows: false
    });
    
    $(this)
        .on('click', '.card-show', function () {
            $(this).toggleClass('card-show card-hide');
            $(this).parent().toggleClass('active');
            $(this).parent().find('.card-text').slideDown(300);

            $('html,body').animate({scrollTop: $(this).offset().top}, 500);
        })
        .on('click', '.card-hide', function () {
            $(this).toggleClass('card-show card-hide');
            $(this).parent().toggleClass('active');
            $(this).parent().find('.card-text').slideUp(300);
            
            $('html,body').animate({scrollTop: $(this).offset().top}, 500);
        })

});
