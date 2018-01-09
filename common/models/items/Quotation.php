<?php

namespace common\models\items;

use Yii;

use common\models\Candidate;

class Quotation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quotation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'required'],
            [['candidate_id'], 'integer'],
            [['text', 'caption'], 'string', 'max' => 255],
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
