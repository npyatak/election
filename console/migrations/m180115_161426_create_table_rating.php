<?php

use yii\db\Migration;

class m180115_161426_create_table_rating extends Migration {
    
    public function safeUp() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%rating}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'subtitle' => $this->string(255)->notNull(),
            'text' => $this->text(),
        ], $tableOptions);

        $this->batchInsert('{{%rating}}', ['id', 'title', 'subtitle', 'text'], [
            [1, 'Рейтинг кандидатов', 'Опрос ВЦИОМ 15-17 декабря 2017', 'Респондентам задавался вопрос: "А если бы президентские выборы проводились в ближайшее воскресенье и список выглядел бы следующим образом, то за кого из этих кандидатов Вы бы, скорее всего, проголосовали? Вы можете дать один ответ (закрытый вопрос, один ответ)". Ежедневный объем выборки – 1000 человек.'],
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%rating}}');
    }
}