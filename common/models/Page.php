<?php

namespace common\models;

use omgdef\multilingual\MultilingualBehavior;
use omgdef\multilingual\MultilingualQuery;
use Yii;

/**
 * This is the model class for table "page".
 *
 * @property int $id
 * @property string $slug
 * @property string $image
 * @property string $created_at
 * @property string $updated_at
 *
 * @property PageLang[] $pageLangs
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'ml' => [
                'class'            => MultilingualBehavior::className(),
                'languages'        => Yii::$app->params['languages'],
                'languageField'    => 'language',
                //'localizedPrefix' => '',
                //'requireTranslations' => false',
                'dynamicLangClass' => true,
//                'langClassName'    => PageLang::className(), // or namespace/for/a/class/PostLang
                'defaultLanguage'  => Yii::$app->params['defaultLanguage'],
                'langForeignKey'   => 'page_id',
                'tableName'        => "pageLang",
                'attributes'       => [
                    'name', 'text', 'title', 'keywords', 'description'
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
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'slug', 'keywords', 'description'], 'string', 'max' => 255],
            [['created_at', 'updated_at'], 'safe'],
            [['text', 'title'], 'string'],
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
            'slug' => Yii::t('app', 'Slug'),
            'image' => Yii::t('app', 'Image'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return MultilingualQuery|\yii\db\ActiveQuery
     */
    public static function find()
    {
        return new MultilingualQuery(get_called_class());
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPageLangs()
    {
        return $this->hasMany(PageLang::className(), ['page_id' => 'id']);
    }
}
