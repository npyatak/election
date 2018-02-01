<?php

namespace common\models;

use Yii;

class Rating extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rating';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'date'], 'required'],
            [['title', 'subtitle', 'date', 'share_title', 'share_text', 'share_image', 'share_twitter'], 'string', 'max' => 255],
            ['text', 'safe'],
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
            'date' => 'Дата',
            'subtitle' => 'Подзаголовок',
            'text' => 'Текст',
            'share_title' => 'Заголовок поделиться',
            'share_text' => 'Текст поделиться',
            'share_image' => 'Изображение поделиться',
            'share_twitter' => 'Текст для twitter',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRatingGroups()
    {
        return $this->hasMany(RatingGroup::className(), ['rating_id' => 'id']);
    }

    public function getGroupIds() {
        return RatingGroup::find()->select('id')->where(['rating_id' => $this->id])->groupBy('id')->column();
    }
}
