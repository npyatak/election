<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "rating_item".
 *
 * @property int $id
 * @property int $candidate_id
 * @property int $additional_id
 * @property int $rating_group_id
 * @property int $rating_id
 * @property string $score
 *
 * @property Candidate $candidate
 * @property RatingGroup $ratingGroup
 * @property Rating $rating
 */
class RatingItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rating_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['candidate_id', 'additional_id', 'rating_group_id', 'rating_id'], 'integer'],
            [['rating_group_id', 'rating_id', 'score'], 'required'],
            [['score'], 'number', 'min' => 0, 'max' => 99.9],
            [['candidate_id'], 'exist', 'skipOnError' => true, 'targetClass' => Candidate::className(), 'targetAttribute' => ['candidate_id' => 'id']],
            [['rating_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => RatingGroup::className(), 'targetAttribute' => ['rating_group_id' => 'id']],
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
            'candidate_id' => 'Кандидат',
            'additional_id' => 'Другое',
            'rating_group_id' => 'Группа',
            'rating_id' => 'Рейтинг',
            'score' => 'Процент',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCandidate()
    {
        return $this->hasOne(Candidate::className(), ['id' => 'candidate_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRatingGroup()
    {
        return $this->hasOne(RatingGroup::className(), ['id' => 'rating_group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRating()
    {
        return $this->hasOne(Rating::className(), ['id' => 'rating_id']);
    }

    public function getAdditionalArray() {
        return [
            1 => 'Не определилися',
            2 => 'Другой кандидат',
            3 => 'Приду и испорчу бюллетень',
        ];
    }
}
