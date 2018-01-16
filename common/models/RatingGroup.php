<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "rating_group".
 *
 * @property int $id
 * @property string $title
 *
 * @property RatingItem[] $ratingItems
 */
class RatingGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rating_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRatingItems()
    {
        return $this->hasMany(RatingItem::className(), ['rating_group_id' => 'id']);
    }
}
