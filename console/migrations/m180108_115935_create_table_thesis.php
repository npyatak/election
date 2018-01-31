<?php

use yii\db\Migration;

class m180108_115935_create_table_thesis extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/candidates/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%thesis}}', [
            'id' => $this->primaryKey(),
            'candidate_id' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'text' => $this->text()->notNull(),
            'caption' => $this->string(),
        ], $tableOptions);
        
        $this->addForeignKey("{thesis}_candidate_id_fkey", '{{%thesis}}', 'candidate_id', '{{%candidate}}', 'id', 'CASCADE', 'CASCADE');

        $this->batchInsert('{{%thesis}}', ['candidate_id', 'title', 'text'], [
            [
                1,
                'О Крыме',
                '"Мы будем преследовать террористов везде, в аэропорту — в аэропорту. Значит, вы уж меня извините, в туалете поймаем, мы и в сортире их замочим в конце концов".'
            ],
            [   
                1,
                'Об отношениях между Россией и Западом',
                '"Все эти восемь лет я пахал, как раб на галерах, с утра до ночи, и делал это с полной отдачей сил".'
            ],
            [
                1,
                'О захоронении Ленина',
                '"Настоящий мужчина должен всегда пытаться, а настоящая женщина должна сопротивляться" (о проблеме свободы слова).'
            ],
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%thesis}}');
    }
}
 
 
 
