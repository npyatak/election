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
            'is_right' => $this->integer(1),
            'comment' => $this->string(255)->notNull(),
        ], $tableOptions);
        
        $this->addForeignKey("{answer}_question_id_fkey", '{{%answer}}', 'question_id', '{{%question}}', 'id', 'CASCADE', 'CASCADE');

        $this->batchInsert('{{%answer}}', ['title', 'question_id', 'is_right', 'comment'], [
            ['Ответ 1', 1,  null, 'Не угадал'],
            ['Правильный ответ', 1, 1, 'Угадал'],
            ['Ответ 3', 1, null, 'Не угадал'],
            ['Ответ 4', 1, null, 'Не угадал'],
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%answer}}');
    }
}