<?php
use yii\helpers\Url;
use yii\helpers\Html;

$url = Url::canonical();
$title = isset($this->params['share_title']) ? $this->params['share_title'] : '';
$text = isset($this->params['share_text']) ? $this->params['share_text'] : '';
$image = isset($this->params['share_image']) ? $this->params['share_image'] : '';

$this->registerMetaTag(['property' => 'og:description', 'content' => $text], 'og:description');
$this->registerMetaTag(['property' => 'og:title', 'content' => $title], 'og:title');
$this->registerMetaTag(['property' => 'og:image', 'content' => $image], 'og:image');
$this->registerMetaTag(['property' => 'og:url', 'content' => $url], 'og:url');
$this->registerMetaTag(['property' => 'og:type', 'content' => 'website'], 'og:type');
?>

<button class="psb-nav-mobile-btn" onclick="onToggleNavigation()"></button>

<div class="psb-nav">
    <div class="psb-nav_wrap">
        <div>
            <div class="psb-nav-logo-cnt">
                <a href="https://www.psbank.ru/" target="_blank">
                    <img src="/img/psbank-logo.svg" width="240" height="40" alt="Промсвязьбанк">
                </a>
            </div>
            <div class="psb-nav-header">
                <ul class="psb-nav-social-links">
                    <li>
                        <?= Html::a('<img src="/img/vk.svg">', '', [
                            'class' => 'share',
                            'data-type' => 'vk',
                            'data-url' => $url,
                            'data-title' => $title,
                            'data-image' => $image,
                            'data-desc' => $text,
                        ]); ?>
                    </li>
                    <li>
                        <?= Html::a('<img src="/img/fb.svg">', '', [
                            'class' => 'share',
                            'data-type' => 'fb',
                            'data-url' => $url,
                            'data-title' => $title,
                            'data-image' => $image,
                            'data-desc' => $text,
                        ]); ?>
                    </li>
                    <li>
                        <?= Html::a('<img src="/img/ok.svg">', '', [
                            'class' => 'share',
                            'data-type' => 'ok',
                            'data-url' => $url,
                            'data-desc' => $text,
                        ]); ?>
                    </li>
                </ul>
                <span class="psb-nav-close-btn" onclick="onCloseNavigation()"></span>
            </div>

            <?php if($categoryPages):?>
                <ul class="psb-nav-articles">
                    <?php foreach ($categoryPages as $p):?>
                        <li class="psb-nav-article-item <?=(isset($page) && $p->id == $page->id) ? 'active' : '';?>">
                            <a href="<?=$p->previewUrl;?>"><?=$p->menuTitle;?></a>
                        </li>
                    <?php endforeach;?>
                </ul>
            <?php endif;?>
        </div>

        <div class="psb-nav-footer">
            <?php if ($categories): ?>
                <ul class="psb-nav-categories">
                    <?php foreach ($categories as $cat): ?>
                        <li class="psb-nav-category-item <?= $cat->id == $activeCategoryId ? 'active' : ''; ?>">
                            <a class="psb-nav-category-icon <?= $cat->alias; ?>" href="<?= $cat->url; ?>">
                            </a>
                            <a class="psb-nav-category-link <?= $cat->id == $activeCategoryId ? 'active' : ''; ?>"
                               href="<?= $cat->url; ?>">
                                <?= $cat->title; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <ul class="psb-nav-social-links">
                <li>
                    <?= Html::a('<img src="/img/vk.svg">', '', [
                        'class' => 'share',
                        'data-type' => 'vk',
                        'data-url' => $url,
                        'data-title' => $title,
                        'data-image' => $image,
                        'data-desc' => $text,
                    ]); ?>
                </li>
                <li>
                    <?= Html::a('<img src="/img/fb.svg">', '', [
                        'class' => 'share',
                        'data-type' => 'fb',
                        'data-url' => $url,
                        'data-title' => $title,
                        'data-image' => $image,
                        'data-desc' => $text,
                    ]); ?>
                </li>
                <li>
                    <?= Html::a('<img src="/img/ok.svg">', '', [
                        'class' => 'share',
                        'data-type' => 'ok',
                        'data-url' => $url,
                        'data-desc' => $text,
                    ]); ?>
                </li>
            </ul>
        </div>
    </div>
</div>