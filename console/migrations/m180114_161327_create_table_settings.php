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
            ['testMainImage', '', 'Поле для картинки теста на главной ', 5, 2],
            ['testTitle', 'тест', 'Заголовок теста', 1, 2],
            ['testSubTitle', 'подзаголовок тест', 'Подзаголовок теста', 1, 2],
            ['testButtonTitle', 'текст на кнопке тест', 'Текст на кнопке теста', 1, 2],
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%settings}}');
    }
}