<?php

use yii\db\Migration;

class m180108_115735_create_table_perk extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/candidates/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%perk}}', [
            'id' => $this->primaryKey(),
            'candidate_id' => $this->integer()->notNull(),
            'text' => $this->string()->notNull(),
            'image' => $this->string(),
        ], $tableOptions);
        
        $this->addForeignKey("{perk}_candidate_id_fkey", '{{%perk}}', 'candidate_id', '{{%candidate}}', 'id', 'CASCADE', 'CASCADE');

        $this->batchInsert('{{%perk}}', ['candidate_id', 'text', 'image'], [
            [
                1,
                'Боевые искусства: мастер спорта по дзюдо и самбо, имеет черный пояс по карате. Любит бокс.',
                '/images/icons/Shape.svg',
            ],    
            [
                1,
                'Хоккей: участник Ночной хоккейной лиги. Впервые встал на коньки в 2011 году.',
                '/images/icons/Shape1.svg',
            ],
            [
                1,
                'Собаки, леопарды, стерхи и другие животные. Ввел запрет охоты на бельков и серок —детенышей тюленя.',
                ''
            ],
            [
                1,
                'Рыбалка: ловил в Туве щуку.',
                ''
            ],
            [
                1,
                'Ездил верхом в Хакасии и Туве.',
                ''
            ],
            [
                1,
                'Погружается с аквалангом: доставал амфоры из моря в районе археологических раскопок на Таманском полуострове.',
                ''
            ],
            [
                1,
                'Управлял боевым самолетом Су-27 и пожарным Бе-200.',
                ''
            ],
            [
                1,
                'Управлял болидом Формулы 1 на специальной трассе в Сочи.',
                ''
            ],
            [
                1,
                'Играет на фортепиано.',
                ''
            ],
            [
                1,
                'Владеет русским, немецким языками и учит английский.',
                ''
            ]
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%perk}}');
    }
}
 
 
 
