<?php
/**
 * Created by PhpStorm.
 * User: borod
 * Date: 07.08.2018
 * Time: 17:38
 */
/* @var $model \common\models\Page*/

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
                    <h1 class="single-article--title"><span><?= $model->name ?></span></h1>
                </div>
                <div class="text-box">
                    <?= $model->text ?>
                </div>
                <div class="clearfix"></div>
            </article>
        </div>
    </div>
</div>
<?= \frontend\widgets\layout\Layout::widget(['viewName' => 'footer']) ?>