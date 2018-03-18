<?php

use yii\db\Migration;

class m180318_072754_alter_table_rating_item extends Migration
{
    
    public function safeUp() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->alterColumn('rating_item', 'score', $this->decimal(4, 2)->notNull());

    }

    public function safeDown() {
        $this->alterColumn('rating_item', 'score', $this->decimal(3, 1)->notNull());
    }
}