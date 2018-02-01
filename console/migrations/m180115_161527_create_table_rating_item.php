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
            'score' => $this->decimal(3, 1)->notNull(),
        ], $tableOptions);
        
        $this->addForeignKey("{rating_item}_candidate_id_fkey", '{{%rating_item}}', 'candidate_id', '{{%candidate}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey("{rating_item}_rating_group_id_fkey", '{{%rating_item}}', 'rating_group_id', '{{%rating_group}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropTable('{{%rating_item}}');
    }
}