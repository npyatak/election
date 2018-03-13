<?php

use yii\db\Migration;

class m180312_185935_insert_into_settings extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/candidates/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->batchInsert('{{%settings}}', ['key', 'value', 'title', 'type', 'section'], [
            ['mainPage', 1, 'Главная страница', 2, 1],

            ['mainPageOnlineTitle', 'Первые избирательные участки открылись на камчатке', 'Заголовок главной', 1, 1],
            ['mainPageOnlineText', 'В Москве поздняя ночь', 'Текст главной', 1, 1],
            ['mainPageOnlineBlockText', 'В Москве поздняя ночь', 'Онлайн текст главной', 1, 1],
            ['mainPageOnlineImage', '', 'Изображение главной', 5, 1],

            ['mainPageFirstResultsTitle', '', 'Подпись к данным', 1, 1],
            ['mainPageFirstResultsVoterParticipation', 0, 'Общая явка', 1, 1],
            ['mainPageFirstResultsVotingCardsCount', 0, 'Количество обработанных бюллетеней', 1, 1],

        ]);

        $this->batchInsert('{{%rating}}', ['id', 'title', 'subtitle', 'date'], [
            [
                4,
                'Результаты выборов', 
                '',
                '18 марта 2018',
            ],
        ]);

        $this->batchInsert('{{%rating_group}}', ['id', 'rating_id', 'title', 'category', 'sub_category'], [
            [21, 4, 'Общий', 9, null],
        ]);
    }

    public function safeDown()
    {
        $this->delete('{{%rating_group}}', ['id' => 21]);
        $this->delete('{{%rating}}', ['id' => 4]);
        $this->truncateTable('{{settings}}');
    }
}