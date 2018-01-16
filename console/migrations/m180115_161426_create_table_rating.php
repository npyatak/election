<?php

use yii\db\Migration;

class m180115_161426_create_table_rating extends Migration {
    
    public function safeUp() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%rating}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'subtitle' => $this->string(255)->notNull(),
        ], $tableOptions);

        $this->batchInsert('{{%rating}}', ['id', 'title', 'subtitle'], [
            [1, 'Рейтинг кандидатов', 'Опрос ВЦИОМ 15-17 декабря 2017'],
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%rating}}');
    }
}