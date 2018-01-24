<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "share".
 *
 * @property int $id
 * @property string $uri
 * @property string $title
 * @property string $text
 * @property string $image
 * @property string $twitter
 */
class Share extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'share';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uri', 'title', 'text', 'image', 'twitter'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uri' => 'Uri',
            'title' => 'Share Title',
            'text' => 'Share Text',
            'image' => 'Share Image',
            'twitter' => 'Share Twitter',
        ];
    }
}
