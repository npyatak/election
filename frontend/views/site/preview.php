<?php $this->title = $page->title;?>

<?php 
$this->params['share_title'] = $page->share_title;
$this->params['share_image'] = $page->share_image ? $page->shareImageUrl : '';
$this->params['share_text'] = $page->share_text;
?>

<div class="article-preview-page wrap">
    <div class="main">
        <div class="content-bg" style="background-image: url(<?=$page->imageUrl;?>);"></div>
        <div class="content">
            <span class="article-preview-category-name">Господдержка</span>
            <header class="article-preview-header">
                <h1 class="article-preview-title"><?=$page->title;?></h1>
                <span class="article-preview-second-title"><?=$page->subtitle;?></span>
            </header>
            <p class="article-preview-overview">
                <?=$page->preview;?>
            </p>
            <a class="article-preview-more-btn" href="<?= $page->url; ?>">Подробнее</a>
        </div>
    </div>

    <?=$this->render('_nav_right', ['page' => $page, 'categoryPages' => $categoryPages, 'categories' => $categories, 'activeCategoryId' => $page->category_id]);?>
</div>
