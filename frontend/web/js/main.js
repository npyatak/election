$(window).on('load', function () {
    $('#loaders').fadeOut(500);
});

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

        if($(window).width() <= 767){

        }
    });
    $(window).trigger('resize');

    $('#candidate-quotes, #candidate-quotes_mobile').owlCarousel({
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
        loop: true,
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
    

    // $('#slick-slider').slick({
    //     dots: true,
    //     slidesToShow: 1,
    //     slidesToScroll: 1,
    //     responsive: [
    //         {
    //             breakpoint: 1279,
    //             settings: {
    //                 vertical: false,
    //                 arrows: true,
    //                 nextArrow: '<span class="next-arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span>',
    //                 prevArrow: '<span class="prev-arrow"><i class="fa fa-angle-left" aria-hidden="true"></i></span>',
    //             }
    //         },
    //         {
    //             breakpoint: 2560,
    //             settings: {
    //                 vertical: true,
    //                 verticalSwiping: true,
    //                 arrows: false
    //             }
    //         }
    //     ]
    // });

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
    $('#hidden-menu a').on('click', function(e) {
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

    if($(this).scrollTop() >= 10){
        $('.main-menu').addClass('shadow');
    }else {
        $('.main-menu').removeClass('shadow');
    }

    if($(window).width() <= 767){
        $('.main-menu').addClass('bg-white');
    }else{
        $('.main-menu').removeClass('bg-white');
    }

    $(this)
        .on('click', '.main-share_btn', function (e) {
            e.preventDefault();
            $(this).toggleClass('show');
            $(this).parent().find('.share-buttons').toggleClass('show');
            $(this).find('i').toggleClass('fa fa-share-alt fa fa-close');
        })
        .on('click', '.question-icon i', function () {
            $('.question-icon').removeClass('popup-open');
            $(this).parent().addClass('popup-open');
        })

        .on('click', '.question-close', function () {
            $('.question-icon').removeClass('popup-open');
        });
    //
    // $('.popup-open').mouseenter(function () {
    //     $(this).parent().find('.question-popup').fadeIn(300);
    //     return false;
    // });
    // $('.popup-open').mouseleave(function () {
    //     $('.question-popup').fadeOut(300);
    //     return false;
    // });

    $(this).click(function (event) {
        if (!$(event.target).closest('.question-icon>i').length) {
            $('.question-icon').removeClass('popup-open');
        }
    });


    $('.play').click(function () {
        $('body').addClass('overflow');
        $('.video-modal').fadeIn(300);
    });
    $('.play-close').click(function () {
        $('body').removeClass('overflow');
        $('.video-modal').fadeOut(300);
    });

    var url = document.location.href;
    $.each($('#hidden-menu .container .left a'), function () {
        if(this.href === url){$(this).addClass('active')}
    });

    $('.tab a').click(function (e) {
        e.preventDefault();
        $('.tab a').removeClass('active');
        $(this).addClass('active');
        if($(this).hasClass('show-rating-cat')){
            $('#rating-cat').addClass('transform');
        }else{
            $('#rating-cat').removeClass('transform');
        }
    });
    

    $('#rating-cat').owlCarousel({
        margin: 30,
        loop: false,
        autoplay: false,
        dots: false,
        nav: true,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        autoWidth:true,
        items: 4
    });
    
    $(this)
        .on('click', '.tabs .owl-prev', function () {
            var act = $('.tabs .owl-item:nth-child(2)');
            if(act.hasClass('active')){
                $('body').find('.mobile-rating-cat').addClass('transform');
            }else{
                $('body').find('.mobile-rating-cat').removeClass('transform');
            }
        })
        .on('click', '.tabs .owl-next', function () {
            var act = $('.tabs .owl-item:nth-child(2)');
            if(act.hasClass('active')){
                $('body').find('.mobile-rating-cat').addClass('transform');
            }else{
                $('body').find('.mobile-rating-cat').removeClass('transform');
            }
        });

    $('.rating-cat_el').click(function (e) {
        e.preventDefault();
        $('.rating-cat_el').removeClass('active');
        $(this).toggleClass('active');
    });
    
    $('.selectpicker').selectpicker();
    // $.fn.moveIt = function() {
    //   var $window = $(window);
    //   var instances = [];
      
    //   $(this).each(function(){
    //     instances.push(new moveItItem($(this)));
    //   });
      
    //   window.onscroll = function(){
    //     var scrollTop = $window.scrollTop();
    //     instances.forEach(function(inst){
    //       inst.update(scrollTop);
    //     });
    //   }
    // }

    // var moveItItem = function(el){
    //   this.el = $(el);
    //   this.speed = parseInt(this.el.attr('data-scroll-speed'));
    // };

    // moveItItem.prototype.update = function(scrollTop){
    //   var pos = scrollTop / this.speed - this.speed;
    //   this.el.css('transform', 'translateY(' + -pos + 'px)');
    // };

    // // Initialization
    // $(function(){
    //   $('[data-scroll-speed]').moveIt();
    // });
    
    
    $('.map-item')
            .mouseenter(function (e) {
                var reg = $(this).attr('data-id');
                var popup_c = $('.popup-candidates');
                var region_name = JSON.parse(regionIdsArr)[reg];

                popup_c.addClass('active');
                popup_c.find('.region').html(region_name['title']);
                popup_c.find('.caption').html(region_name['text']);

                var same = $('body').find('.map-item[data-id='+reg+']');
                $.each(same, function () {
                    $(this).css({fill:'#1BA07D'});
                });

                var oldArr = JSON.parse(regionResultsArr)[reg];
                var arr = [];
                for (key in oldArr) { arr.push({key: key, val: oldArr[key]}) }
                arr.sort(function(a,b) { return b.val-a.val });
                if(JSON.parse(regionResultsArr)[reg]) {
                    $.each(arr, function () {
                        var c_name = $('.can_i_'+this.key).text();
                        popup_c.find('.candidate_ids').append('<div class="candidate_id clearfix">\n' +
                            '<div class="pull-left"><span>'+c_name+'</span></div>\n' +
                            '<div class="pull-right"><span class="popup-percent">' + this.val + '</span>%</div>\n' +
                            '</div>')
                    });
                }else{
                    popup_c.find('.candidate_ids>div').remove();
                }
            })
            .mouseleave(function () {
                $('.popup-candidates').removeClass('active');
                $('.popup-candidates').find('.candidate_id').remove();
                $('.map-item').css({fill:'#1FB28B'});
            });
    
    $('.rating_select li').click(function () {
        $('.mobCandidates_ids>li').remove();
        var mob_reg = $(this).find('a').attr('data-tokens');

        var oldArr = JSON.parse(regionResultsArr)[mob_reg];
        var arr = [];
        for (key in oldArr) { arr.push({key: key, val: oldArr[key]}) }
        arr.sort(function(a,b) { return b.val-a.val });

        for(var i=0;i<arr.length;i++){
            var el = arr[i];
            var c_name = $('.can_i_'+el.key).text();
            $('.mobCandidates_ids').append('<li class="candidate_mobile_id">\n'+
                '<div class="left-li">'+c_name+'</div>\n'+
                '<div class="right-li ">'+el.val+'%</div>\n'+
                '</li>')
        }
        // $.each(arr, function () {
        //     var c_name = $('.can_i_'+this.key).text();
        //     $('.mobCandidates_ids').append('<li class="candidate_mobile_id">\n'+
        //         '<div class="left-li">'+c_name+'</div>\n'+
        //     '<div class="right-li ">'+this.val+'%</div>\n'+
        //     '</li>')
        // });

    })
    

});

$('.result-map').mousemove(function(e){
    var X = e.pageX; // положения по оси X
    var Y = e.pageY; // положения по оси Y
    var popup_candidates = $('.popup-candidates');
    if(window.popup_candidates != 0){
        if($(window).width() <= (X + 350)){
            popup_candidates.addClass('p-left');
        }else{
            popup_candidates.removeClass('p-left');
        }
        popup_candidates.css({left: X + 15, right: 'auto', top: Y + 15});
    }
});

$('#online-block-fr').hover(function() { 
    $('.first-results .online').addClass('hovered');
}, function() {     
    $('.first-results .online').removeClass('hovered');
});





