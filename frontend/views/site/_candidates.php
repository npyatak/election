<?php
use common\models\Candidate;
?>

<div class="candidates" id="candidates">
    <div class="container">
        <div class="vertical-title">Кандидаты</div>
        <div class="candidates-inner">
            <?php foreach ($candidates as $c):?>
                <a href="<?=$c->url;?>" class="candidates-item">
                    <div class="candidates-img">
                        <img src="<?=$c->image;?>" alt="<?=$c->nameAndSurname;?>">
                    </div>
                    <div class="candidate">
                        <h4><?=$c->nameAndSurname;?></h4>
                        <?php if($c->active == Candidate::QUIT):?>
                            <div class="out">Выбыл(а) из президентской гонки</div>
                        <?php endif;?>
                    </div>
                </a>
            <?php endforeach;?>
        </div>
    </div>
</div>