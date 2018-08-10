<?php
/**
 * Created by PhpStorm.
 * User: suhov.a.s
 * Date: 26.07.2018
 * Time: 10:37
 */

use common\models\Page;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $pages Page[] */
?>
<div class="footer--links">
    <ul>
        <?php foreach ($pages as $page): ?>
            <li>
                <?= Html::a($page->name, Url::to('/' . $page->slug)) ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>