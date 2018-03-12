<?php
use yii\helpers\Url;
?>

<div class="faq">
    <div class="container">
        <div class="vertical-title">Что нужно знать <span>о выборах</span></div>
        <div class="faq-inner">
            <?php foreach ($cards as $card):?>
	            <a href="<?=$card->url;?>" class="faq-item">
	                <h4><?=$card->title;?></h4>
	            </a>
	        <?php endforeach;?>
        </div>
        <div class="faq-bottom">
            <div>
                <a href="<?=Url::toRoute(['site/faq']);?>">Все вопросы<i class="fa fa-angle-right"></i></a>
            </div>
        </div>
    </div>
</div>