<style>
    @media screen and (min-width: 1200px) {
        .hide-desktop {
            display: none;
        }
        .hide-mobile {
            display: block;
        }
    }
    @media screen and (max-width: 1199px) {
        .hide-mobile {
            display: none;
        }
        .hide-desktop {
            display: block;
        }
    }
    .inag-page {
        display: block;
        position: relative;
    }
    .inag-page .header {
        height: 700px;
    }
    .inag-page .header .header__left {
        position: relative;
        display: flex;
        justify-content: flex-start;
        align-items: flex-end;
        height: 100%;
        float: left;
        width: 50%;
        background: #1fb38c;
    }
    .header__left .text {
        width: 520px;
        font-family: 'FiraSans-Medium';
        font-size: 50px;
        line-height: 1.2;
        text-align: left;
        text-align: -webkit-left;
        color: #ffffff;
        margin: 0;
        position: relative;
        margin-bottom: 80px;
        margin-left: 160px;
    }
    .inag-page .header .header__right {
        position: relative;
        height: 100%;
        float: right;
        background: #2724ad;
        width: 50%;
        display: flex;
        justify-content: flex-start;
        align-items: flex-end;
    }
    .header__right .images {
        position: relative;
        height: auto;
        width: auto;
    }
    .images__main {
        width: 100%;
        vertical-align: bottom;
    }
    .images__fw-1 {
        position: absolute;
        left: 0;
        top: 0;
    }
    .images__fw-2 {
        position: absolute;
        right: -40px;
        top: -60px;
    }
    .images__fw-3 {
        position: absolute;
        right: -120px;
        bottom: 120px;
    }
    /* middle part */
    .inag-page .middle .middle__left {
        height: 100%;
        width: 50%;
        /* float: left; */
        display: inline-block;
    }
    .inag-page .middle .middle__left .middle-part {
        padding: 80px 40px 80px 160px;
        
    }
    .middle__left .title {
        font-family: 'FiraSans-Medium';
        font-size: 30px;
        line-height: 40px;
        text-align: left;
        text-align: -webkit-left;
        color: #000000;
        margin: 0;
        position: relative;
        margin: 0 0 40px 0;
    }
    .middle__left .text {
        font-family: 'FiraSans-Medium';
        font-size: 18px;
        line-height: 30px;
        text-align: left;
        text-align: -webkit-left;
        color: #4a4a4a;
        margin: 0;
        position: relative;
        margin: 0 0 40px 0;
    }
    .middle__left .text:last-child {
        margin-bottom: 0;
    }
    .middle__left-dark {
        background: #3e43c8;
    }
    .middle__left-dark .text, .middle__left-dark .title {
        color: #ffffff;
        padding-left: 160px;
    }
    .middle__left-dark.middle-part {
        padding: 80px 40px 160px 0!important;
    }
    .middle__left-dark .special-text {
        padding: 40px 0 0 0;
    }
    .middle__left-dark .special-text .text::before {
        content: "";
        background: #1fb38c;
        height: 1px;
        width: 80px;
        display: block;
        position: absolute;
        left: 0px;
        top: 25px;
    }
    .inag-page .middle .middle__right {
        height: 100%;
        width: 50%;
        float: right;
        /* display: inline-block; */
        /* margin-left: 50%; */
    }
    .middle__right img {
        height: 100%;
        width: 100%;
    }
    @media screen and (min-width: 768px) and (max-width: 1199px) {
        .inag-page .header {
            height: 500px;
        }
        .header__left .text {
            font-size: 30px;
            line-height: 35px;
            margin-left: 40px;
            margin-bottom: 40px;
            width: 320px;
        }
        .images__main {
            width: 100%;
        }
        .images__fw-1 {
            left: 0;
            top: 40px;
        }
        .images__fw-2 {
            right: 0;
            top: 20px;
            width: 103px;
        }
        .images__fw-3 {
            right: -60px;
            bottom: 120px;
            width: 81px;
        }
        .inag-page .middle .middle__left .middle-part {
            padding: 40px!important;
        }
        .inag-page .middle .middle__left {
            width:  100%;
            float:  none;
        }
        .middle__left .text {
            max-width: 100%;
        }
        .middle__left-dark .text, .middle__left-dark .title {
            padding-left: 0;
        }
        .middle__left-dark .special-text .text::before {
            display: none;
        }
        .middle__left-dark .special-text {
            padding: 0;
        }
    }
    @media screen and (min-width: 320px) and (max-width: 767px) {
        .inag-page .header .header__right {
            display: none;
        }
        .header__left .text {
            font-size: 20px;
            line-height: 25px;
            margin-left: 20px;
            margin-bottom: 20px;
            width: auto;
        }
        .inag-page .header {
            height: 220px;
        }
        .inag-page .header .header__left {
            float: none;
            width: 100%;
        }
        .inag-page .middle .middle__left .middle-part {
            padding: 20px!important;
        }
        .inag-page .middle .middle__left {
            width:  100%;
            float:  none;
        }
        .middle__left .title {
            margin-bottom: 30px;
            margin-top: 15px;
        }
        .middle__left .text {
            max-width: 100%;
            margin-bottom: 30px;
        }
        .middle__left-dark .text, .middle__left-dark .title {
            padding-left: 0;
        }
        .middle__left-dark .special-text .text::before {
            display: none;
        }
        .middle__left-dark .special-text {
            padding: 0;
        }
    }

        #one {
            background: #fff;
        }
        #two {
            background: #2724ad;
        }
        #three {
            background: #fff;
        }
</style>
<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
<div class="inag-page">
    <div class="header">
        <div class="header__left">
            <h1 class="text">
                Как проходит инаугурация <br/> президента России
            </h1>
        </div>
        <div class="header__right" id="five">
            <div class="images">
                <img class="images__main" src="/images/inauguration/kremlin-inaguracia.svg" alt="Кремль">
                <img class="images__fw-1" src="/images/inauguration/fireworks-1.svg" alt="Салют-1">
                <img class="images__fw-2" src="/images/inauguration/fireworks-2.svg" alt="Салют-1">
                <img class="images__fw-3" src="/images/inauguration/fireworks-3.svg" alt="Салют-1">
            </div>
        </div>
    </div>
    <div class="middle">
        <div class="middle__left">
            <div class="middle-part" id="one">
                <h1 class="title">
                    Время и место
                </h1>
                <p class="text">
                    Избранный президент вступает в должность в день истечения шестилетнего срока предыдущего главы государства. В современной истории России инаугурация будет проходить в седьмой раз. Прежде эта церемония проводилась в 1991, 1996, 2000, 2004, 2008 и 2012 годах.
                </p>
                <p class="text">
                    С 2000 года церемония вступления в должность президента России проводится 7 мая. Когда в должность вступал Борис Ельцин, инаугурация проходила в Кремлевском дворце съездов. С 2000 года церемония проводится в Георгиевском, Александровском и Андреевском залах Большого Кремлевского дворца.
                </p>
            </div>
            <div class="middle__left-dark middle-part" id="two">
                <h1 class="title">
                    Символы и детали
                </h1>
                <p class="text">
                    Курсанты Кремлевского полка проносят через залы государственный флаг РФ и штандарт президента РФ. Затем вносят конституцию и знак президента РФ.
                </p>
                <div class="special-text">
                    <p class="text">
                        Переплет специального экземпляра конституции изготовлен в 1996 году из кожи варана красного цвета, на обложке — накладной серебряный герб и тисненная золотом надпись.
                    </p>
                    <p class="text">
                        Знак президента выполнен в виде креста ордена "За заслуги перед Отечеством" I степени, его девиз — "Польза, честь, слава". На обороте звеньев выгравированы фамилия, имя, отчество главы государства и дата вступления в должность. В этот раз будет заполнено седьмое звено.
                    </p>
                    <p class="text">
                        Президентский штандарт — государственный флаг с вышитым золотом двуглавым орлом. На древке закреплена серебряная скоба с выгравированными фамилией, именем и отчеством главы государства и датами его пребывания на этом посту.
                    </p>
                </div>
            </div>
            <div class="middle-part" id="three">
                <h1 class="title">
                    Действующие лица
                </h1>
                <p class="text">
                    Перед началом инаугурации в зал входят главы Совета Федерации и Госдумы, председатель Конституционного суда. За несколько минут до полудня через Спасские ворота в Кремль въезжает избранный президент.
                </p>
                <p class="text">
                    Список приглашенных на церемонию определяет служба протокола президента. Обычно это Герои России, кавалеры ордена "За заслуги перед Отечеством" I и II степеней, главы министерств и ведомств, первые лица регионов, представители разных конфессий, деятели культуры, науки, образования и спорта.
                </p>
                <p class="text">
                    Глава Конституционного суда приглашает избранного президента принять присягу, а после этого объявляет о его вступлении в должность.
                </p>
                <h1 class="title" style="padding-top: 40px;">
                    Первые шаги президента
                </h1>
                <p class="text">
                    После принятия присяги звучит гимн России. Президентский штандарт поднимается над куполом Сената.
                </p>
                <p class="text">
                    Новый глава государства произносит инаугурационную речь и под песню Михаила Глинки "Славься" выходит на Соборную площадь. Производится салют из 30 залпов.
                </p>
                <p class="text">
                    Если в должность президента вступает новое лицо, перед выходом в специальном защищенном помещении Большого Кремлевского дворца ему передают ядерный чемоданчик.
                </p>
                <p class="text">
                    На Соборной площади президент проводит смотр парадного расчета Кремлевского полка. 7 мая — день образования этого полка.присягу, а после этого объявляет о его вступлении в должность.
                </p>
            </div>
        </div>
        <div class="middle__right hide-mobile" id="four">
            <img src="/images/inauguration/temp-1.png" alt="Солдаты-1">
            <img src="/images/inauguration/temp-2.png" alt="Солдаты-2">
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
    $(window).on('resize', function() {
        var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
    });
    if (width >= 1199) {
        var leftHeight = $('.header__left').outerHeight(true) + $('.middle').outerHeight(true);
        var rightHeight = $('.header__right').outerHeight(true) + $('.middle__right').outerHeight(true);
        var fiveH = $('#five').outerHeight(true);
        $('#four').css('top', $('#five').offset().top + fiveH + 'px');

        $(window).scroll(function() {
            var pos = $(window).scrollTop();
            var top_pos = $('.header__left').outerHeight(true);
            var widthHeader = $('.header__left').width();
            var speed = (pos) / (leftHeight/rightHeight);
            $('.header__right').css({
                position: 'fixed',
                right: '0',
                height: '700px',
                transform: 'translateY(-' + (speed) + 'px)'
            });
            $('#four').css({
                position: 'fixed',
                right: '0',
                transform: 'translateY(-' + (speed) + 'px)',
                height: 'auto'
            });
        });
        
    } else {
        $('.header__right').css({
            position: 'relative',
            right: 'initial',
            height: (width >= 767) ? '500' : 'initial',
            transform: 'none'
        });
        $('#four').css({
            position: 'relative',
            right: 'initial',
            height: 'auto',
            transform: 'none'
        });
    }
});
</script>