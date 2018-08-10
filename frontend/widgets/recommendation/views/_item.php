<?php
/**
 * Created by PhpStorm.
 * User: borod
 * Date: 06.08.2018
 * Time: 14:02
 */

/* @var $model \common\models\Post */
?>
<a href="#" class="article--box">
    <div class="article--data">
        <time class="article--date"><?= date('d M Y', strtotime($model->created_at)) ?></time>
        <span class="article--tag"><?= implode(', ', \yii\helpers\ArrayHelper::map($model->getLangTags(Yii::$app->language)->all(), 'id', 'name')) ?></span>
        <h4 class="article--title">
            <span><?= $model->name ?></span></h4>
        <div class="article--descr">
            <?= $model->preview_text ?>
        </div>
    </div>
</a>

