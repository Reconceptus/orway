<?php
/**
 * Created by PhpStorm.
 * User: borod
 * Date: 26.07.2018
 * Time: 17:18
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;

/* @var $dataProvider \yii\data\ActiveDataProvider */
/* @var $tags \common\models\Tag[] */
/* @var $showTags bool */
/* @var $mainTag string */
?>
<div id="main" class="main">

    <div class="section section--blog">

        <div class="content content--md">

            <h1 class="page-title">Technology</h1>

            <div class="blog--listing">
                <div class="blog--filters">
                    <div class="blog--tags <?= $showTags ? '' : 'hidden' ?>">
                        <ul>
                            <li>
                                <?php
                                $options = ['class' => 'btn btn--dark'];
                                if (!$mainTag) {
                                    Html::addCssClass($options, 'active');
                                }
                                ?>
                                <?= Html::a('all posts', Url::to(['index']), $options) ?>
                            </li>
                            <? foreach ($tags as $tag): ?>
                                <?php
                                $options = ['class' => 'btn btn--dark'];
                                if ($tag->name == $mainTag) {
                                    Html::addCssClass($options, 'active');
                                }
                                ?>
                                <li><?= Html::a($tag->name, Url::to(['index', 'tag' => $tag->name]), $options) ?></li>
                            <? endforeach; ?>
                        </ul>
                    </div>
                    <div class="blog--search">
                        <form action="/blog/search">
                            <div class="blog--search-field">
                                <input type="text" name="q" placeholder="Type What you Search...">
                                <button type="submit" class="submit">
                                    <svg class="icon icon--search">
                                        <use xlink:href="#icon-search"></use>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="blog--articles">
                    <?
                    echo ListView::widget([
                        'dataProvider' => $dataProvider,
                        'options'      => [
                            'tag'   => 'div',
                            'class' => 'grid opacity',
                            'id'    => 'grid'
                        ],
                        'pager'        => [
                            'nextPageLabel'      => '',
                            'prevPageLabel'      => '',
                            'maxButtonCount'     => '10',
                            'activePageCssClass' => 'current',
                            'linkOptions'        => [
                                'class' => 'pager-el',
                            ],
                            'options'            => [
                                'class' => 'pager'
                            ],
                        ],
                        'itemOptions'  => [
                            'tag'   => 'article',
                            'class' => 'article'
                        ],
                        'layout'       => "{items}",
                        'itemView'     => function ($model, $key, $index, $widget) {
                            return $this->render('_list', ['model' => $model]);
                        },
                    ]);
                    ?>
                </div>

            </div>
            <?= \yii\widgets\LinkPager::widget([
                'pagination'         => $dataProvider->getPagination(),
                'linkOptions'        => ['class' => 'page'],
                'activePageCssClass' => 'current',
                'nextPageLabel'      => '>',
                'prevPageLabel'      => '<',
                'prevPageCssClass'   => 'prev',
                'nextPageCssClass'   => 'next',
            ]) ?>
        </div>

    </div>

</div>
