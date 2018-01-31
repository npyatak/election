<?php

use yii\db\Migration;

class m180123_115935_create_table_test_result extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/candidates/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%test_result}}', [
            'id' => $this->primaryKey(),
            'range_start' => $this->integer()->notNull(),
            'range_end' => $this->integer()->notNull(),
            'title' => $this->text(),
        ], $tableOptions);
        
        $this->batchInsert('{{%test_result}}', ['range_start', 'range_end', 'title'], [
            [0, 4, 'не молодец'],
            [5, 8, '5-8'],
            [9, 10, 'молодец'],
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%test_result}}');
    }
}
 
 
 
