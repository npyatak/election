<?php

use yii\db\Migration;

class m180115_161327_create_table_test_text extends Migration {
    
    public function safeUp() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%test_text}}', [
            'id' => $this->primaryKey(),
            'image' => $this->string(255),
            'title' => $this->string(255)->notNull(),
            'subtitle' => $this->string(255),
            'button_title' => $this->string(255),
        ], $tableOptions);

        $this->batchInsert('{{%test_text}}', ['image', 'title', 'subtitle', 'button_title'], [
            ['/images/icons/amphora.svg', 'Амфора или урна?', 'Проверьте, как хорошо вы знаете кандидатов', 'Пройти тест'],
            ['/images/icons/amphora.svg', 'Заголовок теста 2', 'Подзаголовок теста 2', 'Текст на кнопке теста 2'],
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%test_text}}');
    }
}