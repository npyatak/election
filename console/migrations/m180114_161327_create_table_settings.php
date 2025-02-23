<?php

use yii\db\Migration;

class m180114_161327_create_table_settings extends Migration {
    
    public function safeUp() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%settings}}', [
            'id' => $this->primaryKey(),
            'key' => $this->string(100)->notNull(),
            'value' => $this->text(),
            'title' => $this->string(100)->notNull(),
            'type' => $this->integer(1)->notNull()->defaultValue(1),
            'section' => $this->integer(1)->notNull()->defaultValue(1),
        ], $tableOptions);

        $this->batchInsert('{{%settings}}', ['key', 'value', 'title', 'type', 'section'], [
            
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%settings}}');
    }
}