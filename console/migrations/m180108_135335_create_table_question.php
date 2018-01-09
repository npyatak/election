<?php

use yii\db\Migration;

class m180108_135335_create_table_question extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%question}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'comment' => $this->string(),
        ], $tableOptions);

        $this->batchInsert('{{%question}}', ['title', 'comment'], [
            ['Вопрос 1', 'Комментарий к первому вопросу'],
            ['Вопрос 2', ''],
            ['Вопрос 3', ''],
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%question}}');
    }
}
 
 
 
