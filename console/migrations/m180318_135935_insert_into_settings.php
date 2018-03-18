<?php

use yii\db\Migration;

class m180318_135935_insert_into_settings extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/candidates/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->batchInsert('{{%settings}}', ['key', 'value', 'title', 'type', 'section'], [['mainPageOnlineBlockText', 'В Москве поздняя ночь', 'Онлайн текст главной', 1, 1],
            ['mainPageResultsImage', '/images/putin_.svg', 'Результаты: изображение', 5, 1],
            ['mainPageResultsTitle', 'Объявлены окончательные резултаты президентских выборов 18 марта 2018', 'Результаты: заголовок', 1, 1],
            ['mainPageResultsText', 'Владимир Путин становится избранным президентом набрав 56% голосов', 'Результаты: текст', 1, 1],
            ['mainPageResultsButtonText', 'Инаугурация 7 мая', 'Результаты: текст кнопки', 1, 1],
        ]);
    }

    public function safeDown()
    {
        $this->delete('{{%settings}}', ['key' => 'mainPageResultsImage']);
        $this->delete('{{%settings}}', ['key' => 'mainPageResultsTitle']);
        $this->delete('{{%settings}}', ['key' => 'mainPageResultsText']);
        $this->delete('{{%settings}}', ['key' => 'mainPageResultsButtonText']);
    }
}