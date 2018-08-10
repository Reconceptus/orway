<?php

namespace common\models;

use omgdef\multilingual\MultilingualBehavior;
use omgdef\multilingual\MultilingualQuery;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $slug
 * @property int $author_id
 * @property string $image
 * @property string $created_at
 * @property string $updated_at
 * @property int $status
 * @property int $sort
 *
 * @property Comment[] $comments
 * @property User $author
 * @property PostLang[] $postLangs
 * @property PostTag[] $postTags
 * @property Tag[] $langTags
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
            [['slug', 'author_id'], 'required'],
            [['name', 'preview_text', 'text', 'title', 'keywords', 'description'], 'string'],
            [['author_id', 'status', 'sort'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['slug'], 'string', 'max' => 255],
            [['slug'], 'unique'],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author_id' => 'id']],
            [['image'], 'file', 'extensions' => 'png, jpg, gif', 'maxSize' => 1024 * 1024 * 3],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'         => Yii::t('app', 'ID'),
            'slug'       => Yii::t('app', 'Slug'),
            'author_id'  => Yii::t('app', 'Author ID'),
            'image'      => Yii::t('app', 'Image'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'status'     => Yii::t('app', 'Status'),
            'sort'       => Yii::t('app', 'Sort'),
        ];
    }

    public function behaviors()
    {
        return [
            'ml' => [
                'class'            => MultilingualBehavior::className(),
                'languages'        => Yii::$app->params['languages'],
                'languageField'    => 'language',
                //'localizedPrefix' => '',
                //'requireTranslations' => false',
//                'dynamicLangClass' => true,
                'langClassName'    => PostLang::className(), // or namespace/for/a/class/PostLang
                'defaultLanguage'  => Yii::$app->params['defaultLanguage'],
                'langForeignKey'   => 'post_id',
                'tableName'        => "postLang",
                'attributes'       => [
                    'name', 'preview_text', 'text', 'title', 'keywords', 'description'
                ]
            ],
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
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['post_id' => 'id']);
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
    public function getPostLangs()
    {
        return $this->hasMany(PostLang::className(), ['post_id' => 'id']);
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
     * Возвращает теги к посту с фильтром по языку
     * @param string $lang
     * @return \yii\db\ActiveQuery
     */
    public function getLangTags($lang)
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])->andWhere(['language' => $lang])->via('postTags');
    }


    /**
     * Возвращает массив с id тегов, которые прилеплены к посту
     * @return array
     */
    public function getTagIds()
    {
        $tags = [];
        foreach ($this->postTags as $postTag) {
            $tags[] = (int)$postTag->id;
        }
        return $tags;
    }

    /**
     * Обновляет теги на те, которые переданы
     * @param array $tagsArray
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function updateTags(array $tagsArray)
    {
        foreach ($tagsArray as $lang => $tags) {
            $tags = explode(',', $tags);
            foreach ($tags as $k => $tag) {
                $tags[$k] = trim($tag);
            }
            $existTags = ArrayHelper::map($this->getlangTags($lang)->all(), 'name', 'id');
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
            foreach ($tags as $addTag) {
                if ($addTag) {
                    Tag::addTag($this->id, $addTag, $lang);
                }
            }
        }
    }

    /**
     * Получаем соседние статьи
     * @param $currentId
     * @return array
     */
    public static function getNeighbors($currentId)
    {
        $records = self::find()->orderBy('id DESC')->all();

        foreach ($records as $i => $record) {
            if ($record->id == $currentId) {
                $next = isset($records[$i - 1]) ? $records[$i - 1]->slug : null;
                $prev = isset($records[$i + 1]) ? $records[$i + 1]->slug : null;
                break;
            }
        }
        return ['next' => $next ?? null, 'prev' => $prev ?? null];
    }
}
