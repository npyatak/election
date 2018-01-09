<?php

namespace common\models;

use Yii;
use yii\helpers\Url;

class Candidate extends \yii\db\ActiveRecord
{
    public $quotationModels;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'candidate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'second_name', 'surname', 'status'], 'required'],
            [['name', 'second_name', 'surname', 'video_list_1', 'video_list_2'], 'string', 'max' => 100],
            [['status', 'image'], 'string', 'max' => 255],
            [['bio', 'facts'], 'safe'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'second_name' => 'Отчество',
            'surname' => 'Фамилия',
            'status' => 'Статус кандидата',
            'image' => 'Изображение',
            'bio' => 'Биография',
            'facts' => 'Факты',
            'video_list_1' => 'Ссылка на видеофайл в SD качестве',
            'video_list_2' => 'Ссылка на видеофайл в HD качестве',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerks()
    {
        return $this->hasMany(\common\models\items\Perk::className(), ['candidate_id' => 'id']);
    }

    public function getQuotations()
    {
        return $this->hasMany(\common\models\items\Quotation::className(), ['candidate_id' => 'id']);
    }

    public function getTheses()
    {
        return $this->hasMany(\common\models\items\Thesis::className(), ['candidate_id' => 'id']);
    }

    public function getUrl() {
        return Url::toRoute(['site/candidate', 'alias' => $this->alias]);
    }

    public function getFullName() {
        return $this->surname.' '.$this->name.' '.$this->second_name;
    }

    public function getNameAndSurname() {
        return $this->name.' '.$this->surname;
    }
}
