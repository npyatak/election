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
        loop: false,
        autoplay: false,
        responsive: {
            0: {
                items:1,
                margin: 0,
                nav: false,
                dots: false,
                touchDrag: false,
                mouseDrag: false
            },
            1280: {
                items:1,
                margin: 10,
                nav: true,
                navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
                dots: true
            }
        }
    });

    $('#news-slider').owlCarousel({
        margin: 0,
        autoplay: false,
        nav: false,
        responsive: {
            0: {
                loop: false,
                margin: 0,
                items: 1,
                autoWidth:true,
                dots: true,
                mouseDrag: true
            },
            768: {
                loop: false,
                margin: 40,
                items: 3,
                dots: false,
                mouseDrag: false,
                touchDrag: false
            }
        }
    });

    $('.slick-slider').slick({
        dots: true,
        vertical: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        verticalSwiping: true,
        arrows: false
    });

    $('.main-menu_btn').click(function (e) {
        e.preventDefault();
        $('#hidden-menu').fadeIn(300);
        $('body').addClass('overflow');
    });
    $('#hidden-menu_btn').click(function (e) {
        e.preventDefault();
        $('#hidden-menu').fadeOut(300);
        $('body').removeClass('overflow');
    });

});
