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
            [['title', 'subtitle'], 'string', 'max' => 255],
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
