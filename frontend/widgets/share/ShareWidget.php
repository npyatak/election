<?php
namespace frontend\widgets\share;

use Yii;
use yii\helpers\Html;

class ShareWidget extends \yii\base\Widget 
{

	public $share;
	public $wrap;
	public $wrapClass;
	public $itemWrapClass;
	public $itemClass = 'share';

    public function init()
    {
        $this->registerAssets();
    }

    public function run() {
        $view = $this->getView();
		$view->registerMetaTag(['property' => 'og:description', 'content' => $this->share['text']], 'og:description');
		$view->registerMetaTag(['property' => 'og:title', 'content' => $this->share['title']], 'og:title');
		$view->registerMetaTag(['property' => 'og:image', 'content' => $this->share['image']], 'og:image');
		$view->registerMetaTag(['property' => 'og:url', 'content' => $this->share['url']], 'og:url');
		$view->registerMetaTag(['property' => 'og:type', 'content' => 'website'], 'og:type');

    	echo $this->renderWrapOpen($soc = 'fb');
		    echo Html::a('<i class="fa fa-facebook"></i>', '', [
		        'class' => $this->itemClass,
		        'data-type' => 'fb',
		        'data-url' => $this->share['url'],
		        'data-title' => $this->share['title'],
		        'data-image' => $this->share['image'],
		        'data-text' => $this->share['text'],
		    ]);
		echo $this->renderWrapClose();

		echo $this->renderWrapOpen($soc = 'vk');
		    echo Html::a('<i class="fa fa-vk"></i>', '', [
		        'class' => $this->itemClass,
		        'data-type' => 'vk',
		        'data-url' => $this->share['url'],
		        'data-title' => $this->share['title'],
		        'data-image' => $this->share['image'],
		        'data-text' => $this->share['text'],
		    ]);
		echo $this->renderWrapClose();

		echo $this->renderWrapOpen($soc = 'tw');
			echo Html::a('<i class="fa fa-twitter"></i>', '', [
				'class' => $this->itemClass,
				'data-type' => 'tw',
				'data-url' => $this->share['url'],
				'data-title' => $this->share['twitter'],
			]);
		echo $this->renderWrapClose();

		echo $this->renderWrapOpen($soc = 'tg');
		    echo Html::a('<i class="fa fa-telegram"></i>', '', [
		        'class' => $this->itemClass,
		        'data-type' => 'tg',
		        'data-url' => $this->share['url'],
		        'data-title' => $this->share['title'],
		    ]);
		echo $this->renderWrapClose();
    }

    public function renderWrapOpen($soc = null) {
	    if($this->wrap) {
	        $open = '<'.$this->wrap;
	        if($this->wrapClass) {
	            $open .= ' class="'.$this->wrapClass;
	            if($this->itemWrapClass && $soc) {
	                $open .= ' '.$this->itemWrapClass.$soc;
	            }
	            $open .= '"';
	        }
	        $open .= '>';
	        return $open;
	    }
	}
	
	public function renderWrapClose() {
	    if($this->wrap) {
	        return '</'.$this->wrap.'>';
	    }
	}

    private function registerAssets()
    {
        $view = $this->getView();

        $asset = ShareAsset::register($view);
    }
}