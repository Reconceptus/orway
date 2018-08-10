<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "postLang".
 *
 * @property int $id
 * @property string $name
 * @property string $preview_text
 * @property string $text
 * @property string $title
 * @property string $keywords
 * @property string $description
 * @property string $language
 * @property int $post_id
 *
 * @property Post $post
 */
class PostLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'postLang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'preview_text', 'text'], 'required'],
            [['text'], 'string'],
            [['post_id'], 'integer'],
            [['name', 'title', 'keywords', 'description'], 'string', 'max' => 255],
            [['preview_text'], 'string', 'max' => 500],
            [['language'], 'string', 'max' => 6],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['post_id' => 'id']],
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
            'preview_text' => Yii::t('app', 'Preview Text'),
            'text' => Yii::t('app', 'Text'),
            'title' => Yii::t('app', 'Title'),
            'keywords' => Yii::t('app', 'Keywords'),
            'description' => Yii::t('app', 'Description'),
            'language' => Yii::t('app', 'Language'),
            'post_id' => Yii::t('app', 'Post ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'post_id']);
    }
}
