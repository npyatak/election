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
                        <div class="card">
                            <div class="card-title card-show">
                                <h4>В какие часы открыты избирательные участки?</h4>
                                <i class="fa fa-chevron-down"></i>
                            </div>
                            <div class="card-text">
                                <p>На участок нужно прийти с паспортом или заменяющим его документом. В особых случаях при голосовании не по месту жительства нужно взять также заявление с особой маркой.</p>
                                <p>Каждый избиратель имеет право получить один бюллетень. Чтобы отдать свой голос за кандидата, нужно в пустом квадратике напротив его данных поставить любой знак.</p>
                                <p>Недействительными считаются бюллетени, в которых нет отметок в квадратах напротив фамилий кандидатов или проставлено больше одной отметки. Такие бюллетени будут учитываться при подсчете общего количества голосов избирателей, но не будут засчитаны ни за одного из кандидатов.</p>
                                <h4>Надписи или рисунки, сделанные избирателем на бюллетене за пределами клеточек для голосования, не имеют значения. Только знаки в квадратиках делают бюллетень действительным или недействительным.</h4>
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