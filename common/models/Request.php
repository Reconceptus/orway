<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "request".
 *
 * @property int $id
 * @property string $name
 * @property string $contact_info
 * @property string $message
 * @property int $accept
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['message'], 'string'],
            [['accept'], 'integer'],
            [['name', 'contact_info'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'contact_info' => Yii::t('app', 'Contact Info'),
            'message' => Yii::t('app', 'Message'),
            'accept' => Yii::t('app', 'Accept'),
        ];
    }
}
