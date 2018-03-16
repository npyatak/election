<?php

use yii\db\Migration;

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
        ]);
    }

    public function safeDown()
    {
        $this->delete('{{%settings}}', ['key' => 'mainPageOnlineBlockLink']);
    }
}