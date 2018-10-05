<?php
/**
 * Created by PhpStorm.
 * User: borod
 * Date: 06.08.2018
 * Time: 15:49
 */

/* @var $models \common\models\Post[] */
?>
<div class="tech">
    <div class="section section--blog">
        <div class="content content--md">
            <h2 class="page-title">technology</h2>
            <div class="blog--listing">
                <div class="blog--articles more">
                    <div class="grid">
                        <? foreach ($models as $model): ?>
                            <article class="article">
                                <a href="/blog/<?= $model->slug ?>" class="article--box">
                                    <div class="article--data">
                                        <time class="article--date"><?= date('d M Y', strtotime($model->created_at)) ?></time>
                                        <span class="article--tag"><?= $model->tags ? $model->tags[0]->name: ''?></span>
                                        <h4 class="article--title">
                                            <span><?= $model->name ?></span>
                                        </h4>
                                        <div class="article--descr"><?= $model->preview_text ?></div>
                                    </div>
                                </a>
                            </article>
                        <? endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
