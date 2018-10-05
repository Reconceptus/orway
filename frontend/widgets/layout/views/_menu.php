<?php
/**
 * Created by PhpStorm.
 * User: borod
 * Date: 2018-10-04
 * Time: 15:41
 */

use yii\helpers\Html;

?>
<ul class="nav--menu">
    <? if (Yii::$app->user->can('adminPanel')): ?>
        <li><a href="/admin">admin</a></li>
    <? endif; ?>
    <? if (!Yii::$app->user->isGuest): ?>
        <li><?= Html::a('logout', \yii\helpers\Url::to('/site/logout')) ?></li>
    <? endif; ?>
    <li><?= Html::a('technology', \yii\helpers\Url::to('/blog')) ?></li>
    <li><a href="#">events</a></li>
    <li><a href="#">products</a></li>
    <li><?= Html::a('about', \yii\helpers\Url::to('/site/about')) ?></li>
</ul>
