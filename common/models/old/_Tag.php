<?php

namespace common\models\old;


/**
 * This is the model class for table "tag".
 *
 * @property int $id
 * @property string $name
 * @property int $sort
 *
 * @property PostTag[] $postTags
 * @property Post[] $posts
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tag';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sort'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'   => 'ID',
            'name' => 'Name',
            'sort' => 'Sort',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostTags()
    {
        return $this->hasMany(PostTag::className(), ['tag_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['id' => 'post_id'])->via('postTags');
    }

    /**
     * Если не существует соотношения поста и тега, то создается. Если тега нет, то он тоже создается
     * @param int $postId
     * @param string $tagName
     * @return array|PostTag|null|\yii\db\ActiveRecord
     */
    public static function addTag(int $postId, string $tagName)
    {
        $tagName = mb_strtolower($tagName);
        $model = self::find()->where(['name' => $tagName])->one();
        if (!$model) {
            $model = new self();
            $model->name = $tagName;
            $model->save();
        }
        $postTag = PostTag::find()->where(['tag_id' => $model->id, 'post_id' => $postId])->one();
        if (!$postTag) {
            $postTag = new PostTag();
            $postTag->post_id = $postId;
            $postTag->tag_id = $model->id;
            $postTag->save();
        }
        return $postTag;
    }
}
