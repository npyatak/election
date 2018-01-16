<?php

use yii\db\Migration;

class m180108_145335_create_table_answer extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%answer}}', [
            'id' => $this->primaryKey(),
            'question_id' => $this->integer()->notNull(),
            'title' => $this->string(255)->notNull(),
            'is_right' => $this->integer(1)
        ], $tableOptions);
        
        $this->addForeignKey("{answer}_question_id_fkey", '{{%answer}}', 'question_id', '{{%question}}', 'id', 'CASCADE', 'CASCADE');

        $this->batchInsert('{{%answer}}', ['question_id', 'title', 'is_right'], [
            [1, 'Таз', 1],
            [1, 'Стакан', null],
            [1, 'Амфора', null],
            [1, 'Урна', null],

            [2, 'Таз', 1],
            [2, 'Стакан', null],
            [2, 'Амфора', null],
            [2, 'Урна', null],

            [3, 'Таз', 1],
            [3, 'Стакан', null],
            [3, 'Амфора', null],
            [3, 'Урна', null],
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%answer}}');
    }
}