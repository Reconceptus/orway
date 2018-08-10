<?php
/**
 * Created by PhpStorm.
 * User: borod
 * Date: 06.08.2018
 * Time: 15:49
 */

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $prev string */
/* @var $next string */
/* @var $model \common\models\Post */
?>
<div class="single-article--actions">
    <div class="prev-page">
        <? if ($prev): ?>
            <?= Html::a('previous', Url::to('/blog/' . $prev)) ?>
        <? endif; ?>
    </div>
    <ul class="socials">
        <li>
            <a href="https://www.facebook.com/sharer.php?u=<?= Yii::$app->request->getAbsoluteUrl() ?>" class="fb">
                <svg class="icon icon--fb">
                    <use xlink:href="#icon-share-facebook"></use>
                </svg>
            </a>
        </li>
        <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?= Yii::$app->request->getAbsoluteUrl() ?>"
               class="in">
                <svg class="icon icon--in">
                    <use xlink:href="#icon-share-linkedin"></use>
                </svg>
            </a></li>
        <li>
            <a href="http://twitter.com/share?text=<?= $model->name ?>&url=<?= Yii::$app->request->getAbsoluteUrl() ?>"
               class="tw">
                <svg class="icon icon--tw">
                    <use xlink:href="#icon-share-twitter"></use>
                </svg>
            </a>
        </li>
    </ul>
    <div class="next-page">
        <? if ($next): ?>
            <?= Html::a('next', Url::to('/blog/' . $next)) ?>
        <? endif; ?>
    </div>
</div>
