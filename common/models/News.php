<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title
 * @property string $url
 * @property int $date
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'url', 'date'], 'required'],
            [['date'], 'integer'],
            [['title', 'url'], 'string', 'max' => 255],
            ['url', 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'url' => 'Url',
            'date' => 'Date',
        ];
    }

    public function getViewDate() {
        $d = new \DateTime;
        $d->setTimestamp($this->date);

        return $d->format('d').' '.$this->getMonth($d->format('n'), true).', '.$d->format('H:i');
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
