<?php

use yii\db\Migration;

class m180207_132754_alter_table_rating_item extends Migration
{
    
    public function safeUp() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->addColumn('rating_item', 'no_poll', $this->integer());
    }

    public function safeDown() {
        $this->dropColumn('rating_item', 'no_poll');
    }
}