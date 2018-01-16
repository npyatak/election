<?php

use yii\db\Migration;

class m180115_161427_create_table_rating_group extends Migration {
    
    public function safeUp() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%rating_group}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
        ], $tableOptions);

        $this->batchInsert('{{%rating_group}}', ['id', 'title'], [
            [1, 'общий'],
            [2, 'мужчины/женщины'],
            [3, 'Работающие'],
            [4, 'Занятые в бюджетной сфере'],
            [5, 'Занятые в коммерческом секторе'],
            [6, 'Со среднедушевым доходом: до 5000'],
            [7, 'Со среднедушевым доходом: от 5000 до 8000'],
            [8, 'Жители: Москвы и Санкт-Петербурга'],
            [9, 'Жители: Городов-миллионников'],
            [10, 'Жители: 500-950 тыс. жителей'],
            [11, 'Жители: 100-500 тыс, жителей'],
            [12, 'Жители: до 100 тыс. жителей'],
            [13, 'Жители: Сельской местности'],
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%rating_group}}');
    }
}