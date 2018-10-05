<?php
/**
 * Created by PhpStorm.
 * User: suhov.a.s
 * Date: 26.07.2018
 * Time: 10:35
 */

namespace frontend\widgets\pages;

use common\models\Page;
use Yii;
use yii\base\Widget;

class Pages extends Widget
{
    public $viewName = 'index';
    private $pages;

    public function run()
    {
        if (!$this->pages) {
            $cache = Yii::$app->cache;
            $language = Yii::$app->language;
            $this->pages = $cache->getOrSet('pages_' . $language, function () use ($language) {
                return Page::find()->localized($language)->where(['to_footer' => 1])->all();
            }, 1000);
        }
        $content = $this->render($this->viewName, ['pages' => $this->pages]);

        return $content;
    }
}