$(document).ready(function () {
    var maxHeight = 0;
    var highestElement = {};
    $('.faq-item').each(function() {
        var thisHeight = $(this).height();
        if (thisHeight>maxHeight) {
            maxHeight = thisHeight;
            highestElement = $(this);
            $('.faq-item').css({'min-height':$(highestElement).height() + 80})
        }
    });

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
     $('#calendar-date').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      asNavFor: '#calendar-dates',
      focusOnSelect: true
    });
    $('#calendar-dates').slick({
        dots: false,
        slidesToShow: 6,
        arrows: true,
        variableWidth: true,
        slidesToScroll: 1,
        infinite: true,
<<<<<<< HEAD
        asNavFor: '#calendar-date',
=======
        // nextArrow: `
        // <button
        //     class="slick-next
        //     slick-arrow"
        //     type="button"
        // ></button>`,
        // prevArrow:  `
        // <button
        //     class="slick-prev
        //     slick-arrow"
        //     type="button"
        // ></button>`
>>>>>>> 63e2d15d471892da4d00fe05c0e75d0dce8aa0a5
        nextArrow: '<i class="fa fa-angle-right next-arrow" aria-hidden="true"></i>',
        prevArrow: '<i class="fa fa-angle-left prev-arrow" aria-hidden="true"></i>',
        focusOnSelect: true,
        responsive: [
          {
            breakpoint: 768,
            settings: {
              arrows: true,
              slidesToShow: 5
            }
          },
          {
            breakpoint: 480,
            settings: {
              arrows: true,
              variableWidth: false,
              slidesToShow: 3,
              nextArrow: `
              <div class="next-arrow-mobile">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
              </div>`,
              prevArrow: `
              <div class="prev-arrow-mobile">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
              </div>`
            }
          }
        ]
    });
<<<<<<< HEAD
    $('.slick-slider').slick({
=======

    $('#slick-slider').slick({
>>>>>>> 63e2d15d471892da4d00fe05c0e75d0dce8aa0a5
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1279,
                settings: {
                    vertical: false,
                    arrows: true,
                    nextArrow: '<span class="next-arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span>',
                    prevArrow: '<span class="prev-arrow"><i class="fa fa-angle-left" aria-hidden="true"></i></span>',
                }
            },
            {
                breakpoint: 2560,
                settings: {
                    vertical: true,
                    verticalSwiping: true,
                    arrows: false
                }
            }
        ]
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

    $(window).scroll(function () {
        if($(this).scrollTop() >= 10){
            $('.main-menu').addClass('shadow');
        }else {
            $('.main-menu').removeClass('shadow');
        }
    });

    $(this)
        .on('click', '.main-share_btn', function (e) {
            e.preventDefault();
            $(this).toggleClass('show');
            $(this).parent().find('.share-buttons').toggleClass('show');
            $(this).find('i').toggleClass('fa fa-share-alt fa fa-close');
        })
        .on('click', '.popup-open', function () {
            $(this).parent().find('.question-popup').fadeIn(300);
        })
        .on('click', '.popup-close', function () {
            $('.question-popup').fadeOut(300);
        });

    $('.play').click(function () {
        $('body').addClass('overflow');
        $('.video-modal').fadeIn(300);
    });
    $('.play-close').click(function () {
        $('body').removeClass('overflow');
        $('.video-modal').fadeOut(300);
    });

});
