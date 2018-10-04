<?php
/**
 * Created by PhpStorm.
 * User: borod
 * Date: 27.07.2018
 * Time: 10:44
 */

/* @var $model \common\models\Post */
/* @var $tags array */

/* @var $newComment \common\models\Comment */

use yii\helpers\Html;

$this->registerMetaTag(['name' => 'keywords', 'content' => $model->keywords]);
$this->registerMetaTag(['name' => 'description', 'content' => $model->description]);
$this->title = $model->title;
?>
<?= \frontend\widgets\layout\Layout::widget(['viewName' => 'header']) ?>
<div id="main" class="main">

    <div class="section section--article">
        <div class="content content--sm">
            <article class="single-article">
                <div class="single-article--data">
                    <span class="single-article--tag">
                        <? foreach ($tags as $tag): ?>
                            <?= Html::a($tag, \yii\helpers\Url::to(['/blog/', 'tag' => $tag])) ?>
                        <? endforeach; ?>
                    </span>
                    <h1 class="single-article--title"><span><?= $model->name ?></span></h1>
                    <time class="single-article--date"><?= date('d M Y', strtotime($model->created_at)) ?></time>
                </div>
                <div class="text-box">
                    <?= $model->text ?>
                </div>
                <?= \frontend\widgets\share\Share::widget(['model' => $model]) ?>
                <?= $this->render('_comments', ['newComment' => $newComment, 'model' => $model]) ?>
            </article>
        </div>
    </div>
    <?= \frontend\widgets\recommendation\Recommendation::widget(['model' => $model]) ?>
</div>
<?= \frontend\widgets\layout\Layout::widget(['viewName' => 'footer']) ?>