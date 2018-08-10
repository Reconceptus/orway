<?php

namespace common\models\old;


use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $image
 * @property int $author_id
 * @property string $preview_text
 * @property string $text
 * @property string $title
 * @property string $keywords
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property int $status
 * @property int $sort
 *
 * @property Comment[] $comments
 * @property User $author
 * @property PostTag[] $postTags
 * @property Tag[] $tags
 */
class Post extends \yii\db\ActiveRecord
{
    const STATUS_PUBLISHED = 1;
    const STATUS_NOT_PUBLISHED = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author_id', 'status', 'sort'], 'integer'],
            [['author_id', 'name', 'text', 'preview_text'], 'required'],
            [['text'], 'string'],
            [['image'], 'file', 'extensions' => 'png, jpg, gif', 'maxSize' => 1024 * 1024 * 3],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'slug', 'title', 'keywords', 'description'], 'string', 'max' => 255],
            [['preview_text'], 'string', 'max' => 500],
            [['slug'], 'unique'],
            [['author'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'           => 'ID',
            'name'         => 'Name',
            'slug'         => 'Slug',
            'image'        => 'Image',
            'author_id'    => 'Author',
            'preview_text' => 'Preview Text',
            'text'         => 'Text',
            'title'        => 'Title',
            'keywords'     => 'Keywords',
            'description'  => 'Description',
            'created_at'   => 'Created At',
            'updated_at'   => 'Updated At',
            'status'       => 'Status',
            'sort'         => 'Sort',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['post_id' => 'id'])->orderBy('created_at');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostTags()
    {
        return $this->hasMany(PostTag::className(), ['post_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])->via('postTags');
    }

    /**
     * Обновляет теги на те, которые переданы
     * @param string $tags
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function updateTags(string $tags)
    {
        $tags = explode(',', $tags);
        foreach ($tags as $k => $tag){
            $tags[$k] = trim($tag);
        }
        $existTags = ArrayHelper::map($this->tags, 'name', 'id');
        foreach ($tags as $k => $tag) {
            if (array_key_exists($tag, $existTags)) {
                unset($existTags[$tag]);
                unset($tags[$k]);
            }
        }
        // В массиве остались только те теги, которые были удалены
        foreach ($existTags as $existTag) {
            PostTag::deleteTag($this->id, $existTag);
        }
        foreach ($tags as $tag) {
            Tag::addTag($this->id, $tag);
        }
    }
}
