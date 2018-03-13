<?php

use yii\db\Migration;

class m180305_132754_alter_table_rating_item extends Migration
{
    
    public function safeUp() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->alterColumn('rating_item', 'rating_group_id', $this->integer());
        $this->addColumn('rating_item', 'region_id', $this->integer());
        
        $this->addForeignKey("{rating_item}_region_id_fkey", '{{%rating_item}}', 'region_id', '{{%region}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function safeDown() {
        $this->dropForeignKey('{rating_item}_region_id_fkey', '{{%rating_item}}');
        $this->dropColumn('rating_item', 'region_id');
    }
}