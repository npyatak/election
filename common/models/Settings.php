<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

class Settings extends \yii\db\ActiveRecord
{
    const TYPE_TEXT = 1;
    const TYPE_DROPDOWN_LIST = 2;
    const TYPE_IMAGE = 5;
    const TYPE_EDITOR = 6;

    const SECTION_MAIN = 1;
    const SECTION_TEST = 2;

    const INDEX_ORIGINAL = 1;
    const INDEX_FIRST_HOURS = 2;
    const INDEX_VOTER_PARTICIPATION = 3;
    const INDEX_FIRST_RESULTS = 4;
    const INDEX_FINAL_RESULTS = 5;

    public $imageFile;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['value'], 'required'],
            [['key', 'title'], 'string', 'max' => 100],
            [['value'], 'safe'],
            [['type', 'section'], 'integer'],
            [['imageFile'], 'file', 'extensions'=>'jpg, jpeg, png', 'maxSize'=>1024 * 1024 * 5, 'mimeTypes' => 'image/jpg, image/jpeg, image/png'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'value' => 'Значение',
            'title' => 'Заголовок',
            'imageFile' => 'Изображение',
        ];
    }

    public function getSettings() {
        $settings = static::find()->asArray()->all();
        return ArrayHelper::map($settings, 'key', 'value');
    }

    public function setSetting($key, $value) {
        $model = static::findOne(['key' => $key]);
        if ($model === null) {
            $model = new static();
        }
        $model->key = $key;
        $model->value = strval($value);

        return $model->save();
    }

    public function findSetting($key) {
        return $this->find()->where(['key' => $key])->one();
    }

    public function getImageSrcPath() {
        return __DIR__ . '/../../frontend/web/uploads/';
    }

    public function getMainPageArray() {
        return [
            self::INDEX_ORIGINAL => 'Обычная главная',
            self::INDEX_FIRST_HOURS => 'Первые часы',
            self::INDEX_VOTER_PARTICIPATION => 'Явка',
            self::INDEX_FIRST_RESULTS => 'Первые результаты',
            self::INDEX_FINAL_RESULTS => 'Итоги голосования',
        ];
    }
}