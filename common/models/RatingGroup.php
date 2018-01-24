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
            [['title', 'category', 'sub_category'], 'required'],
            [['title'], 'string', 'max' => 255],
            [['category', 'sub_category'], 'integer'],
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
            'sub_category' => 'Подкатегория',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRatingItems()
    {
        return $this->hasMany(RatingItem::className(), ['rating_group_id' => 'id']);
    }

    public function getSubCategoryArray() {
        return [
            1 => '',
            2 => 'Возраст',
            3 => 'Трудоустройство',
            4 => 'Среднедушевой доход',
            5 => 'Населенные пункты',
        ];
    }
}
