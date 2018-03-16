<?php

use yii\db\Migration;

use common\models\Region;

class m180316_132754_alter_table_region extends Migration
{
    
    public function safeUp() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->addColumn('region', 'time', $this->integer());

        Region::updateAll(['time' => 1521360000]);
        Region::updateAll(['time' => 1521327600], ['in', 'id', [20, 84]]);//-9 Камчатский край, Чукотский АО
        Region::updateAll(['time' => 1521331200], ['in', 'id', [31, 67]]);//-8 Сахалинская область, Магаданская область
        Region::updateAll(['time' => 1521334800], ['in', 'id', [79, 12, 43]]);//-7 Хабаровский край, Еврейская АО, Приморский край
        Region::updateAll(['time' => 1521338400], ['in', 'id', [57, 2, 13]]);//-6 Якутия, Амурская область, Забайкальский край
        Region::updateAll(['time' => 1521342000], ['in', 'id', [48, 16]]);//-5 Бурятия, Иркутская область
        Region::updateAll(['time' => 1521345600], ['in', 'id', [25, 60, 61, 1, 22, 74, 36]]); //-4 Красноярский край, Тыва, Хакасия, Алтай, Кемеровская область, Томская область, Алтайский край, Новосибирская область
        Region::updateAll(['time' => 1521349200], ['in', 'id', [38]]);//3 Омская область
        Region::updateAll(['time' => 1521352800], ['in', 'id', [76, 80, 85, 27, 68, 81, 39, 42, 47]]);//-2 Тюменская область, Ханты-Мансийский АО, Ямало-Ненецкий АО, Курганская область, Свердловская область, Челябинская область, Пермский край, Оренбургская область, Башкирия
        Region::updateAll(['time' => 1521356400], ['in', 'id', [64, 66, 77, 4, 78]]); //-1 Удмуртия, Самарская область, Саратовская область, Ульяновская область, Астраханская область
        Region::updateAll(['time' => 1521363600], ['in', 'id', [18]]); //+1 Калининград
    }

    public function safeDown() {
        $this->dropColumn('region', 'time');
    }
}