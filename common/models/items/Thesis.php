<?php

namespace common\models\items;

use Yii;

use common\models\Candidate;

class Thesis extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'thesis';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text', 'title'], 'required'],
            [['candidate_id'], 'integer'],
            ['title', 'string'],
            [['text', 'caption'], 'safe'],
            [['candidate_id'], 'exist', 'skipOnError' => false, 'targetClass' => Candidate::className(), 'targetAttribute' => ['candidate_id' => 'id']],
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
            'text' => 'Текст',
            'title' => 'Заголовок',
            'caption' => 'Подпись',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCandidate()
    {
        return $this->hasOne(Candidate::className(), ['id' => 'candidate_id']);
    }
}
