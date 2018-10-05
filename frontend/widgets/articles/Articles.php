<?php
/**
 * Created by PhpStorm.
 * User: suhov.a.s
 * Date: 26.07.2018
 * Time: 10:35
 */

namespace frontend\widgets\articles;

use common\models\Post;
use Yii;
use yii\base\Widget;


class Articles extends Widget
{
    public $viewName = 'index';

    public function run()
    {
        $models = Post::find()->localized(Yii::$app->language)->limit(3)->orderBy(['id' => SORT_DESC])->all();
        $content = $this->render($this->viewName, ['models' => $models]);

        return $content;
    }
}