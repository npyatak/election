<?php

namespace common\models;

use Yii;

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
            [['title', 'category', 'sub_category', 'rating_id'], 'required'],
            [['title'], 'string', 'max' => 255],
            [['category', 'sub_category', 'rating_id'], 'integer'],
            [['rating_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::className(), 'targetAttribute' => ['rating_id' => 'id']],
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
            'rating_id' => 'Рейтинг',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRatingItems()
    {
        return $this->hasMany(RatingItem::className(), ['rating_group_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRating()
    {
        return $this->hasOne(Rating::className(), ['id' => 'rating_id']);
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
