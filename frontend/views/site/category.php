<?php $this->title = $category->title; ?>

<div class="article-preview-page wrap">
    <div class="main">
        <div id="player"></div>
        <div class="content">
        </div>
    </div>

    <?= $this->render('_nav_right', ['categoryPages' => $category->pages, 'categories' => $categories, 'activeCategoryId' => $category->id]); ?>
</div>
