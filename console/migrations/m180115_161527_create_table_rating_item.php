<?php

use yii\db\Migration;

class m180115_161527_create_table_rating_item extends Migration {
    
    public function safeUp() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%rating_item}}', [
            'id' => $this->primaryKey(),
            'candidate_id' => $this->integer(),
            'additional_id' => $this->integer(1),
            'rating_group_id' => $this->integer()->notNull(),
            'rating_id' => $this->integer()->notNull(),
            'score' => $this->decimal(3, 1)->notNull(),
        ], $tableOptions);
        
        $this->addForeignKey("{rating_item}_candidate_id_fkey", '{{%rating_item}}', 'candidate_id', '{{%candidate}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey("{rating_item}_rating_id_fkey", '{{%rating_item}}', 'rating_id', '{{%rating}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey("{rating_item}_rating_group_id_fkey", '{{%rating_item}}', 'rating_group_id', '{{%rating_group}}', 'id', 'CASCADE', 'CASCADE');

        $this->batchInsert('{{%rating_item}}', ['candidate_id', 'additional_id', 'rating_group_id', 'rating_id', 'score'], [
            [1, null, 1, 1, 74.8],
            [2, null, 1, 1, 5.3],
            [null, 1, 1, 1, 0.6],//'Приду и испорчу бюллетень',
            [null, 2, 1, 1, 5.7],//'Не стал бы участвовать в выборах',
            [null, 3, 1, 1, 2],//'Другой',
            [null, 4, 1, 1, 5.7],//'Затрудняюсь ответить',
            
            [1, null, 3, 1, 69.1],
            [2, null, 3, 1, 6.9],
            [null, 1, 3, 1, 0.6],
            [null, 2, 3, 1, 6.5],
            [null, 3, 3, 1, 2.9],
            [null, 4, 3, 1, 5.5]
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%rating_item}}');
    }
}