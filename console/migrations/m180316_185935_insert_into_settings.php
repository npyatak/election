<?php

use yii\db\Migration;

use common\models\Region;

class m180316_185935_insert_into_settings extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/candidates/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->batchInsert('{{%settings}}', ['key', 'value', 'title', 'type', 'section'], [
            ['mainPageOnlineBlockLink', 'http://tass.ru', 'Онлайн текст ссылка', 1, 1],
            ['mainPageFirstResultsTitle', 'Общая явка избирателей', 'Заголовок общая явка', 1, 1],
        ]);

        Region::updateAll(['text' => 'Избирательные участки еще не открылись']);
    }

    public function safeDown()
    {
        $this->delete('{{%settings}}', ['key' => 'mainPageOnlineBlockLink']);
        $this->delete('{{%settings}}', ['key' => 'mainPageFirstResultsTitle']);
    }
}