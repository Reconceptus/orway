<?php

namespace common\models;

use omgdef\multilingual\MultilingualBehavior;
use omgdef\multilingual\MultilingualQuery;
use Yii;

/**
 * This is the model class for table "person".
 *
 * @property int $id
 * @property string $name
 * @property string $position
 * @property string $description
 * @property string $image
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'person';
    }

    public function behaviors()
    {
        return [
            'ml' => [
                'class'           => MultilingualBehavior::className(),
                'languages'       => Yii::$app->params['languages'],
                'languageField'   => 'language',
                //'localizedPrefix' => '',
                //'requireTranslations' => false',
                //                'dynamicLangClass' => true,
                'langClassName'   => PersonLang::className(), // or namespace/for/a/class/PostLang
                'defaultLanguage' => Yii::$app->params['defaultLanguage'],
                'langForeignKey'  => 'person_id',
                'tableName'       => "personLang",
                'attributes'      => [
                    'name', 'description', 'position'
                ]
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'position'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 600],
            [['image'], 'file', 'extensions' => 'png, jpg, gif', 'maxSize' => 1024 * 1024 * 3],
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
            'position' => Yii::t('app', 'Position'),
            'description' => Yii::t('app', 'Description'),
            'image' => Yii::t('app', 'Image'),
        ];
    }

    /**
     * @return MultilingualQuery|\yii\db\ActiveQuery
     */
    public static function find()
    {
        return new MultilingualQuery(get_called_class());
    }


}
