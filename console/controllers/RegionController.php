<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use yii\imagine\Image;
use console\components\RssParser;

use common\models\Region;

class RegionController extends Controller {

	public function actionStatus() {
        $regions = Region::find()->all();

        foreach ($regions as $region) {
            if($region->status != $region->statusFromTime) {
                $region->status = $region->statusFromTime;
                if($region->statusFromTime == Region::STATUS_WAITING) {
                    $region->text = 'Избирательные участки еще не открылись';
                } elseif($region->statusFromTime == Region::STATUS_OPENED && $region->voter_participation == 0.0) {
                    $region->text = 'Данных еще нет';
                } 

                $region->save(false);
            }
        }
	}
}