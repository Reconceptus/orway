<?php
/**
 * Created by PhpStorm.
 * User: borod
 * Date: 26.07.2018
 * Time: 17:29
 */

/* @var $model \common\models\Post */

use yii\helpers\Url;

?>
<a href="<?= Url::to('/blog/' . $model->slug) ?>" class="article--box">
    <? if ($model->image): ?>
        <figure class="article--img">
            <img src="<?= $model->image ?>">
        </figure>
    <? endif; ?>
    <div class="article--data">
        <time class="article--date"><?= date('d M Y', strtotime($model->created_at)) ?></time>
        <span class="article--tag">media</span>
        <h4 class="article--title"><span><?= $model->name ?></span></h4>
        <div class="article--descr"><?= $model->preview_text ?></div>
    </div>
</a>
