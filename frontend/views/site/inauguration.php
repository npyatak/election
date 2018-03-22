<?php \frontend\assets\InaugurationAsset::register($this);?>
<style type="text/css">
	.inag-page .header__left .text {
		letter-spacing: normal;
	}
	.inag-page .middle__left .title {
		letter-spacing: normal;
	}
	.inag-page .middle .middle__right {
		z-index: -1;
	}
	.header__left .text {
		padding-right: 10px;
	}
</style>
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
                <img class="images__fw-1 hide-mobile" src="/images/inauguration/fireworks-1.svg" alt="Салют-1">
                <img class="images__fw-1 hide-desktop" src="/images/inauguration/fireworks-1-mobile.svg" alt="Салют-1">
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
                    На Соборной площади президент проводит смотр парадного расчета Кремлевского полка. 7 мая — день образования этого полка.
                </p>
            </div>
        </div>
        <div class="middle__right hide-mobile" id="four">
            <img src="/images/inauguration/temp-1.png" alt="Image-1">
            <img src="/images/inauguration/temp-2.png" alt="Image-2">
            <img src="/images/inauguration/temp-3.png" alt="Image-2">
        </div>
    </div>
</div>

<?php 
$script = "
    function checkWidth() {
        return (window.innerWidth > 0) ? window.innerWidth : screen.width;
    }
    function applyStyles() {
        var leftHeight = $('.header__left').outerHeight(true) + $('.middle').outerHeight(true);
        var rightHeight = $('.header__right').outerHeight(true) + $('.middle__right').outerHeight(true);
        var fiveH = $('#five').outerHeight(true) + $('#five').offset().top;
        var width = checkWidth();
        var pos = $(window).scrollTop();
        var speed = (pos) / (leftHeight/rightHeight)  - 60;

        $('#four').css('top', fiveH + 'px');
        if (pos == 0) {
            $('.header__right').css({
                transform: 'translateY(0px)'
            });
            $('#four').css({
                transform: 'translateY(0px)'
            });
        }
        $('.header__right').css({
            position: (width >= 1199) ? ('fixed') : (width < 1199 && width > 767) ? 'relative' : 'relative',
            right: (width >= 1199) ? ('0') : (width < 1199 && width > 767) ? 'initial' : 'initial',
            height: (width >= 1199) ? ('700px') : (width < 1199 && width > 767) ? ('500px') : 'initial',
            transform: (width >= 1199) ? ('translateY(-' + (speed) + 'px)') : (width < 1199 && width > 767) ? 'none' : 'none'
        });
        $('#four').css({
            position: (width >= 1199) ? ('fixed') : (width < 1199 && width > 767) ? 'relative' : 'relative',
            top: (width >= 1199) ? ('700px') : (width < 1199 && width > 767) ? 'initial' : 'initial',
            right: (width >= 1199) ? ('0') : (width < 1199 && width > 767) ? 'initial' : 'initial',
            height: (width < 1199 && width > 767) ? ('auto') : 'auto',
            transform: (width >= 1199) ? ('translateY(-' + (speed) + 'px)') : (width < 1199 && width > 767) ? 'none' : 'none'
        });
    }
    $(document).ready(function() {
        $(window).on('resize', applyStyles);
        $(window).scroll(applyStyles);
    });
";
$this->registerJs($script, yii\web\View::POS_END);?>