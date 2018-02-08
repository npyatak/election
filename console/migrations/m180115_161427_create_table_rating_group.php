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
            'rating_id' => $this->integer()->notNull(),
            'title' => $this->string(255)->notNull(),
            'category' => $this->integer(1),
            'sub_category' => $this->integer(1),
        ], $tableOptions);

        $this->batchInsert('{{%rating_group}}', ['id', 'rating_id', 'title', 'category', 'sub_category'], [
            [1, 1, 'Общий', 1, null],
            [2, 3, 'Антирейтинг', 3, null],
            [3, 2, 'Мужчины', 2, 1],
            [4, 2, 'Женщины', 2, 1],
            [5, 2, '18-24 года', 2, 2],
            [6, 2, '60 лет и старше', 2, 2],
            [7, 2, 'Работающие', 2, 3],
            [8, 2, 'Бюджетники', 2, 3],
            [9, 2, 'Предприниматели', 2, 3],
            [10, 2, 'До 5 000 ₽', 2, 4],
            [11, 2, '5 000 ₽ — 8 000 ₽', 2, 4],
            [12, 2, '8 000 ₽ — 10 000 ₽', 2, 4],
            [13, 2, '10 000 ₽ — 15 000 ₽', 2, 4],
            [14, 2, '15 000 ₽ +', 2, 4],
            [15, 2, 'Москва и Санкт-Петербург', 2, 5],
            [16, 2, 'Города-миллионники', 2, 5],
            [17, 2, '500 — 950 тыс. жит.', 2, 5],
            [18, 2, '100 — 500 тыс. жит.', 2, 5],
            [19, 2, 'До 100 тыс. жит.', 2, 5],
            [20, 2, 'Жители сельской местности', 2, 5],
        ]);
        
        $this->addForeignKey("{rating_group}_rating_id_fkey", '{{%rating_group}}', 'rating_id', '{{%rating}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropTable('{{%rating_group}}');
    }
}