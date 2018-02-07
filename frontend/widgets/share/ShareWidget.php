<?php
namespace frontend\widgets\share;

use Yii;
use yii\helpers\Url;
use yii\helpers\Html;

use common\models\Share;

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
        $this->share['url'] = Url::current([], true);
        $this->share['imageUrl'] = Url::to([$this->share['image']], true);

        $view = $this->getView();
		$view->registerMetaTag(['property' => 'og:description', 'content' => $this->share['text']], 'og:description');
		$view->registerMetaTag(['property' => 'og:title', 'content' => $this->share['title']], 'og:title');
		$view->registerMetaTag(['property' => 'og:url', 'content' => $this->share['url']], 'og:url');
		$view->registerMetaTag(['property' => 'og:type', 'content' => 'website'], 'og:type');
		if($this->share['image']) {
        	$imagePath = Share::getImageSrcPath().$this->share['image'];
        	if(is_file($imagePath)) {
				$view->registerMetaTag(['property' => 'og:image', 'content' => $this->share['imageUrl']], 'og:image');
				$size = getimagesize($imagePath);
				if(is_array($size)) {
					$view->registerMetaTag(['property' => 'og:image:width', 'content' => $size[0]], 'og:image:width');
					$view->registerMetaTag(['property' => 'og:image:height', 'content' => $size[1]], 'og:image:height');
				}
			}
		}

    	echo $this->renderWrapOpen($soc = 'fb');
		    echo Html::a('<i class="fa fa-facebook"></i>', '', [
		        'class' => $this->itemClass,
		        'data-type' => 'fb',
		        'data-url' => $this->share['url'],
		        'data-title' => $this->share['title'],
		        'data-image' => $this->share['imageUrl'],
		        'data-text' => $this->share['text'],
		    ]);
		echo $this->renderWrapClose();

		echo $this->renderWrapOpen($soc = 'vk');
		    echo Html::a('<i class="fa fa-vk"></i>', '', [
		        'class' => $this->itemClass,
		        'data-type' => 'vk',
		        'data-url' => $this->share['url'],
		        'data-title' => $this->share['title'],
		        'data-image' => $this->share['imageUrl'],
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

		echo $this->renderWrapOpen($soc = 'wa');
			echo Html::a('<i class="fa fa-whatsapp"></i>', 'whatsapp://send?text='.$this->share['text'], ['class' => 'whatsapp-share', 'target' => '_blank']);
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