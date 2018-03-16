<?php

namespace common\models;

use Yii;

class Region extends \yii\db\ActiveRecord
{
    const STATUS_WAITING = 0;
    const STATUS_OPENED = 5;
    const STATUS_CLOSED = 9;

    public $timeFormatted;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%region}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'timeFormatted'], 'required'],
            [['data'], 'string'],
            [['status', 'time'], 'integer'],
            [['title', 'text'], 'string', 'max' => 255],
            [['voter_participation'], 'number', 'min' => 0, 'max' => 99.9],
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
            'data' => 'Данные для карты',
            'status' => 'Избирательные участки',
            'voter_participation' => 'Явка',
            'text' => 'Подпись',
            'timeFormatted' => 'Время открытия',
        ];
    }

    public function beforeSave($insert) {
        //print_r($this->timeFormatted);exit;
        $this->time = \DateTime::createFromFormat('!d.m.Y H.i', $this->timeFormatted)->format('U');

        return parent::beforeSave($insert);
    }

    public function afterFind() {
        $this->timeFormatted = date('d.m.Y H.i', $this->time);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRatingItems()
    {
        return $this->hasMany(RatingItem::className(), ['region_id' => 'id']);
    }

    public function getStatusArray() {
        return [
            self::STATUS_WAITING => 'В ожидании',
            self::STATUS_OPENED => 'Открыты',
            self::STATUS_CLOSED => 'Закрыты',
        ];
    }

    public function getStatusFromTime() {
        if(time() < $this->time) {
            return self::STATUS_WAITING;
        } elseif(time() > ($this->time + 3600 * 12)) {
            return self::STATUS_CLOSED;
        } else {
            return self::STATUS_OPENED;
        }
    }
}
