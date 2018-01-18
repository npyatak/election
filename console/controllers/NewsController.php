<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use yii\imagine\Image;
use console\components\RssParser;

use common\models\News;

class NewsController extends Controller {

	public function actionRss($url = 'http://tass.ru/rss/v2.xml?sections=Njc1Nw==') {
        $rssData = RssParser::parseCode($url);
        $count = 0;

        foreach ($rssData as $data) {
            $n = News::find()->where(['url' => $data['link']])->count();
            if($n == 0) {
                $news = new News;
                $news->url = $data['link'];
                $news->title = $data['title'];
                $news->date = $data['publicationDate'];

                if($news->save()) {
                    $count++;
                }
            }
        }

        Yii::info('News added: '.$count, 'rss');
	}
}