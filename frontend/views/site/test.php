<?php $this->title = $page->title; ?>

<?php
$this->params['share_title'] = $page->share_title;
$this->params['share_image'] = $page->share_image ? $page->shareImageUrl : '';
$this->params['share_text'] = $page->share_text;

\frontend\assets\TestAsset::register($this);
?>

<div class="test-page wrap">
    <div class="main">
        <div class="content">
            <span class="test-category-name">Господдержка</span>
            <header class="page-header">
                <h1 class="page-title">Тест: Что вы знаете о господдержке малого и среднего бизнеса?</h1>
            </header>
            <div class="page-content">
                <div class="test-container" data-view="">
                    <?php $count = count($questions);
                    foreach ($questions as $key => $question):?>
                        <div class="test-questions-cnt">
                            <div class="test-question">
                                <span class="test-question-counter"><?= $key + 1; ?>/<?= $count; ?></span>
                                <span class="test-question-text"><?= $question->title; ?></span>
                            </div>

                            <?php foreach ($question->answers as $answer): ?>
                                <div class="test-answer" onclick="onSelectAnswer(event, <?= $answer->is_right ?>)">
                                    <span><?= $answer->title; ?></span>
                                </div>
                            <?php endforeach; ?>

                            <p class="test-tip">
                                <span class="test-selected-result" style="font-weight: bold;"></span>
                                <?= $question->comment; ?>
                            </p>
                            <button class="test-next-btn" onclick="onNextQuestion()">Следующий вопрос ></button>
                        </div>
                    <?php endforeach; ?>
                    <div class="test-results-cnt">
                        <div class="test-result-score-cnt">
                            <span class="test-result-score">4/8</span>
                            <span>правильных ответов</span>
                        </div>
                        <div class="test-result-desc-cnt">
                            <h2 class="test-result-title">Ваш результат</h2>
                            <p class="test-result-description"></p>
                            <button class="test-again-btn" onclick="onAgain()">Пройти заново</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $this->render('_nav_right', ['page' => $page, 'categoryPages' => $categoryPages, 'categories' => $categories, 'activeCategoryId' => $page->category_id]); ?>
</div>
