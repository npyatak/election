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

    // $('#calendar-dates').owlCarousel({
    //     items: 1,
    //     margin: 10,
    //     loop: true,
    //     autoplay: false,
    //     nav: true,
    //     navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    //     dots: true
    // });
    // $('#calendar-dates').owlCarousel({
    //     loop:true,
    //     margin:10,
    //     responsiveClass:true,
    //     navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    //     responsive:{
    //         0:{
    //             items:1,
    //             nav:true
    //         },
    //         600:{
    //             items:3,
    //             nav:false
    //         },
    //         1000:{
    //             items:5,
    //             nav:true,
    //             loop:false
    //         }
    //     }
    // });

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

    $('#calendar-dates').slick({
        dots: false,
        slidesToShow: 6,
        arrows: true,
        variableWidth: true,
        slidesToScroll: 1,
        infinite: true,
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
        nextArrow: '<i class="fa fa-angle-right next-arrow" aria-hidden="true"></i>',
        prevArrow: '<i class="fa fa-angle-left prev-arrow" aria-hidden="true"></i>',
    });

    $('.slick-slider').slick({
        dots: true,
        vertical: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        verticalSwiping: true,
        arrows: false
    });
});
