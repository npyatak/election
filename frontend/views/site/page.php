<?php $this->title = $page->title; ?>

<?php
$this->params['share_title'] = $page->share_title;
$this->params['share_image'] = $page->share_image ? $page->shareImageUrl : '';
$this->params['share_text'] = $page->share_text;
?>

<div class="article-page wrap">
    <div class="main">
        <div class="content">
            <span class="article-category-name"><?=$page->category->title;?></span>
            <header class="page-header">
                <h1 class="page-title"><?= $page->title; ?></h1>
                <span class="page-subtitle"><?= $page->subtitle; ?></span>
                <p class="page-intro"><?= $page->preview; ?></p>
            </header>
            <?= $page->text; ?>
        </div>
    </div>

    <?= $this->render('_nav_right', ['page' => $page, 'categoryPages' => $categoryPages, 'categories' => $categories, 'activeCategoryId' => $page->category_id]); ?>
</div>
