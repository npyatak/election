<?php

namespace common\models;

use Yii;
use yii\helpers\Url;

class Candidate extends \yii\db\ActiveRecord
{
    const ACTIVE = 1;
    const QUIT = 5;

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
            [['name', 'surname', 'status', 'alias', 'active'], 'required'],
            [['name', 'second_name', 'surname', 'video_list_1', 'video_list_2'], 'string', 'max' => 100],
            [['status', 'image', 'alias', 'share_title', 'share_text', 'share_image', 'share_twitter'], 'string', 'max' => 255],
            ['active', 'integer'],
            [['bio_1', 'bio_2', 'bio_3', 'bio_4', 'facts'], 'safe'],

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
            'alias' => 'Алиас',
            'bio_1' => 'Биография 1',
            'bio_2' => 'Биография 2',
            'bio_3' => 'Биография 3',
            'bio_4' => 'Биография 4',
            'share_title' => 'Заголовок поделиться',
            'share_text' => 'Текст поделиться',
            'share_image' => 'Изображение поделиться',
            'share_twitter' => 'Текст для twitter',
            'active' => 'Активность',
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

    public function getRating() {
        return RatingItem::find()->select('score')->where(['candidate_id' => $this->id, 'rating_group_id' => 1])->orderBy('rating_id DESC, id DESC')->column();
    }

    public function getImageUrl() {
        return Yii::$app->urlManagerFrontEnd->createAbsoluteUrl($this->image, $_SERVER['REQUEST_SCHEME']);
    }

    public function getActiveArray() {
        return [
            self::ACTIVE => 'Активен',
            self::QUIT => 'Выбыл из гонки',
        ];
    }
}
