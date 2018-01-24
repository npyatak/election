<?php

use yii\db\Migration;

class m180124_115935_create_table_share extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/candidates/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%share}}', [
            'id' => $this->primaryKey(),
            'uri' => $this->string(255),
            'title' => $this->string(255),
            'text' => $this->string(),
            'image' => $this->string(255),
            'twitter' => $this->string(255),
        ], $tableOptions);
        
        $this->batchInsert('{{%share}}', ['uri', 'title', 'text', 'image', 'twitter'], [
            [
                '/', 
                'Выборы президента России — 2018', 
                'Все о кандидатах, новых правилах голосования и ходе предвыборной гонки — в специальном проекте ТАСС', 
                '', 
                'Все о кандидатах, новых правилах голосования и ходе предвыборной гонки — в специальном проекте ТАСС'
            ],
            [
                '/calendar', 
                'Президентская гонка день за днем', 
                'Как проходит предвыборная кампания — 2018 — в спецпроекте ТАСС', 
                '', 
                'Как проходит предвыборная кампания — 2018 — в спецпроекте ТАСС'
            ],
            [
                '/test', 
                'Приватизировать или национализировать?', 
                'Пройдите тест в спецпроекте ТАСС и узнайте больше о кандидатах в президенты', 
                '', 
                'Пройдите тест в спецпроекте ТАСС и узнайте больше о кандидатах в президенты'
            ],
            [
                '/cards', 
                'Как проголосовать дома, в пути и за границей', 
                'Все, что нужно знать о выборах президента РФ, — в специальном проекте ТАСС', 
                '', 
                'Все, что нужно знать о выборах президента РФ, — в специальном проекте ТАСС'
            ],
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%share}}');
    }
}