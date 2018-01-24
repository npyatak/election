<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "rating".
 *
 * @property int $id
 * @property string $title
 * @property string $subtitle
 *
 * @property RatingItem[] $ratingItems
 */
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
            [['title', 'subtitle'], 'required'],
            [['title', 'subtitle', 'share_title', 'share_text', 'share_image', 'share_twitter'], 'string', 'max' => 255],
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
    public function getRatingItems()
    {
        return $this->hasMany(RatingItem::className(), ['rating_id' => 'id']);
    }
}
