<?php

namespace common\models;

use Yii;
use yii\helpers\Url;

class Calendar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calendar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'title'], 'required'],
            [['date', 'date_to'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['text'], 'safe'],

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
            'date' => 'Дата',
            'date_to' => 'Дата до',
            'text' => 'Текст',
        ];
    }

    public function getUrl() {
        return Url::toRoute(['site/calendar', 'id' => $this->id]);
    }

    public function getViewDate() {
        if($this->date_to) {
            $d = new \DateTime;
            $d->setTimestamp($this->date);
            $day1 = $d->format('d');

            $d->setTimestamp($this->date_to);
            $day2 = $d->format('d');
            $month = $this->getMonth($d->format('n'), true);
            $year = $d->format('Y');

            return $day1.' - '.$day2.' '.$month.' '.$year;
        } else {
            $d = new \DateTime;
            $d->setTimestamp($this->date);

            return $d->format('d').' '.$this->getMonth($d->format('n'), true).' '.$d->format('Y');
        }
    }

    public function getMonth($monthId, $secondForm = false) {
        return $secondForm ? $this->monthsArray[$monthId][1] : $this->monthsArray[$monthId][0];
    }

    public function getMonthsArray() {
        return [
            1 => ['январь', 'января'],
            2 => ['февраль', 'февраля'],
            3 => ['март', 'марта'],
            4 => ['апрель', 'апреля'],
            5 => ['май', 'мая'],
            6 => ['июнь', 'июня'],
            7 => ['июль', 'июля'],
            8 => ['август', 'августа'],
            9 => ['сентябрь', 'сентября'],
            10 => ['октябрь', 'октября'],
            11 => ['ноябрь', 'ноября'],
            12 => ['декабрь', 'декабря'],
        ];
    }
}
