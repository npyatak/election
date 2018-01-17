<div class="card-wrap">
    <div class="card-header">
        <div class="container">
            <div class="left">
                <h1 class="tt-up">Что нужно знать о выборах</h1>
            </div>
            <div class="right"></div>
        </div>
    </div>
    <div class="card-content">
        <div class="container">
            <div class="card-content_inner">
                <div class="cards">
                    <h3>Как выбирают призедента</h3>
                    <?php foreach ($cards as $card):?>
                        <?php if($card->category == 1):?>
                            <div class="card <?=$card->id == $id ? 'active' : '';?>">
                                <div class="card-title card-show">
                                    <h4><?=$card->title;?></h4>
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                                <div class="card-text" <?=$card->id == $id ? 'style="display: block;"' : '';?>>
                                    <?=$card->text;?>
                                </div>
                            </div>
                        <?php endif;?>
                    <?php endforeach;?>
                </div>
                <div class="cards">
                    <h3>Как голосовать</h3>
                    <?php foreach ($cards as $card):?>
                        <?php if($card->category == 2):?>
                            <div class="card <?=$card->id == $id ? 'active' : '';?>">
                                <div class="card-title card-show">
                                    <h4><?=$card->title;?></h4>
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                                <div class="card-text" <?=$card->id == $id ? 'style="display: block;"' : '';?>>
                                    <?=$card->text;?>
                                </div>
                            </div>
                        <?php endif;?>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</div>

<?=$this->render('_candidates', ['candidates' => $candidates]);?>

<?php 
$script = "
    $(document)
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
        });

    if($('.card.active').length) {
        $('html, body').animate({scrollTop:($('.card.active').offset().top)},500);
    }
    
";

$this->registerJs($script, yii\web\View::POS_END);?>
