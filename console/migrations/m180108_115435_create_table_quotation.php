<?php

use yii\db\Migration;

class m180108_115435_create_table_quotation extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/candidates/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%quotation}}', [
            'id' => $this->primaryKey(),
            'candidate_id' => $this->integer()->notNull(),
            'text' => $this->string()->notNull(),
            'caption' => $this->string(),
        ], $tableOptions);
        
        $this->addForeignKey("{quotation}_candidate_id_fkey", '{{%quotation}}', 'candidate_id', '{{%candidate}}', 'id', 'CASCADE', 'CASCADE');

        $this->batchInsert('{{%quotation}}', ['candidate_id', 'text'], [
            [
                1,
                '"Мы будем преследовать террористов везде, в аэропорту — в аэропорту. Значит, вы уж меня извините, в туалете поймаем, мы и в сортире их замочим в конце концов".'
            ],
            [   
                1,
                '"Все эти восемь лет я пахал, как раб на галерах, с утра до ночи, и делал это с полной отдачей сил".'
            ],
            [
                1,
                '"Настоящий мужчина должен всегда пытаться, а настоящая женщина должна сопротивляться" (о проблеме свободы слова).'
            ],
            [
                1,
                '"Все на своем конкретном месте должны каждый день, как святой Франциск, мотыжить свой участок. У нас 143 миллиона человек в стране проживают, и никаких сбоев в управлении страной быть не должно".'
            ],
            [
                1,
                '"Я абсолютный и чистый демократ. Но вы знаете, в чем беда? Даже не беда, трагедия настоящая. В том, что я такой один, других таких в мире просто нет… После смерти Махатмы Ганди поговорить не с кем".'
            ]
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%quotation}}');
    }
}
 
 
 
