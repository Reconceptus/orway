<?php

namespace common\models\old;


/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property int $author_id
 * @property string $text
 * @property string $name
 * @property string $email
 * @property int $accept
 * @property int $post_id
 * @property int $parent_id
 * @property string $created_at
 *
 * @property Post $post
 * @property User $author
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author_id', 'post_id'], 'integer'],
            [['text', 'name', 'email'], 'required'],
            [['accept'], 'compare', 'compareValue' => 1, 'message' =>'You must accept'],
            [['created_at'], 'safe'],
            [['text'], 'string', 'max' => 600, 'min' => 3],
            [['name', 'email'], 'string', 'max' => 70, 'min' => 3],
            [['email'], 'email'],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['post_id' => 'id']],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author_id' => 'id']],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => self::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'         => 'ID',
            'author_id'  => 'Author',
            'text'       => 'Text',
            'name'       => 'Name',
            'email'      => 'Email',
            'accept'     => 'Accept',
            'parent_id'  => 'Parent ID',
            'post_id'    => 'Post ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'post_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }
}
