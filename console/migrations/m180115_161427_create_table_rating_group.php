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
            'category' => $this->integer(1),
            'sub_category' => $this->integer(1),
        ], $tableOptions);

        $this->batchInsert('{{%rating_group}}', ['id', 'title', 'category', 'sub_category'], [
            [1, 'Общий', 1, null],
            [2, 'Антирейтинг', 3, null],
            [3, 'Мужчины', 2, 1],
            [4, 'Женщины', 2, 1],
            [5, '18-24 года', 2, 2],
            [6, '60 лет и старше', 2, 2],
            [7, 'Работающие', 2, 3],
            [8, 'Бюджетники', 2, 3],
            [9, 'Предприниматели', 2, 3],
            [10, '5 000 ₽ — 8 000 ₽', 2, 4],
            [11, 'До 5 000 ₽', 2, 4],
            [12, '8 000 ₽ — 10 000 ₽', 2, 4],
            [13, '10 000 ₽ — 15 000 ₽', 2, 4],
            [14, '15 000 ₽ +', 2, 4],
            [15, 'Москва и Санкт-Петербург', 2, 5],
            [16, 'Города-миллионники', 2, 5],
            [17, '500 — 950 тыс. жит.', 2, 5],
            [18, '100 — 500 тыс. жит.', 2, 5],
            [19, 'До 100 тыс. жит.', 2, 5],
            [20, 'Жители сельской местности', 2, 5],
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%rating_group}}');
    }
}