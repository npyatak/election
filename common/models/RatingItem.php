<?php

namespace common\models;

use Yii;

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
            [['candidate_id', 'additional_id', 'rating_group_id', 'no_poll', 'region_id'], 'integer'],
            [['score'], 'required'],
            [['score'], 'number', 'min' => 0, 'max' => 99.99],
            [['candidate_id'], 'exist', 'skipOnError' => true, 'targetClass' => Candidate::className(), 'targetAttribute' => ['candidate_id' => 'id']],
            [['rating_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => RatingGroup::className(), 'targetAttribute' => ['rating_group_id' => 'id']],
            [['rating_group_id',], 'required', 'when' => function($model) {
                return $this->region_id === null;
            }],
            [['region_id',], 'required', 'when' => function($model) {
                return $this->rating_group_id === null;
            }],
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
            'score' => 'Процент',
            'no_poll' => 'Опрос не проводился',
            'region_id' => 'Регион',
        ];
    }

    public function afterFind() {
        $this->score = floatval($this->score);
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

    public function getAdditionalArray() {
        return [
            1 => 'Приду и испорчу бюллетень',
            2 => 'Не стал бы участвовать в выборах',
            3 => 'Другой',
            4 => 'Затрудняюсь ответить',
        ];
    }
}