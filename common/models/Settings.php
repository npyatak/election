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

    const MAIN_PAGE_ORIGINAL = 1;
    const MAIN_PAGE_FIRST_HOURS = 2;
    const MAIN_PAGE_FIRST_RESULTS = 5;

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
            self::MAIN_PAGE_ORIGINAL => 'Обычная главная',
            2 => 'Голосование еще не началось',
            3 => 'Ход голосования',
            4 => 'Ход голосования',
            5 => 'Предварительные итоги голосования',
        ];
    }
}
