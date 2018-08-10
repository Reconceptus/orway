<?php
/**
 * Created by PhpStorm.
 * User: suhov.a.s
 * Date: 26.07.2018
 * Time: 10:35
 */

namespace frontend\widgets\recommendation;

use common\models\Post;
use common\models\PostTag;
use yii\base\Widget;
use yii\data\ActiveDataProvider;


class Recommendation extends Widget
{
    public $viewName = 'index';
    public $model;

    public function run()
    {
        $query = Post::find()->alias('p')
            ->innerJoin(PostTag::tableName() . ' pt', 'p.id = pt.post_id')
            ->where(['in', 'pt.tag_id', $this->model->getTagIds()])
            ->andWhere(['!=', 'p.id', $this->model->id])
            ->localized(\Yii::$app->language);
        $count = $query->count();
        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);
        $content = $this->render($this->viewName, ['dataProvider' => $dataProvider, 'count' => $count]);

        return $content;
    }
}