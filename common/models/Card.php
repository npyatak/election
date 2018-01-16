<?php

namespace common\models;

use Yii;
use yii\helpers\Url;

class Card extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'card';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category', 'title'], 'required'],
            [['category', 'show_on_main'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['text'], 'safe'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'category' => 'Категория',
            'text' => 'Текст',
            'show_on_main' => 'Показать на главной',
        ];
    }

    public function getUrl() {
        return Url::toRoute(['site/cards', 'id' => $this->id]);
    }

    public function getCategoryArray() {
        return [
            1 => 'Как выбирают президента',
            2 => 'Как голосовать',
        ];
    }

    public function getShowOnMainArray() {
        return [
            1 => 'Да',
            0 => 'Нет',
        ];
    }
}
