<?php
/**
 * Created by PhpStorm.
 * User: suhov.a.s
 * Date: 26.07.2018
 * Time: 10:35
 */

namespace frontend\widgets\layout;

use yii\base\Widget;


class Layout extends Widget
{
    public $viewName = 'index';

    public function run()
    {
        $content = $this->render($this->viewName);
        return $content;
    }
}