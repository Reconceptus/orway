<?php
/**
 * Created by PhpStorm.
 * User: suhov.a.s
 * Date: 26.07.2018
 * Time: 10:37
 */

use yii\widgets\ListView;

/* @var $count integer */
?>
<? if ($count): ?>
    <div class="section section--blog">
        <div class="content content--md">
            <h2 class="page-title">More technology</h2>
            <div class="blog--listing">
                <div class="blog--articles more">
                    <?= ListView::widget([
                        'dataProvider' => $dataProvider,
                        'options'      => [
                            'tag'   => 'div',
                            'class' => 'grid',
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
                        'layout'       => '{items}',
                        'itemView'     => function ($model, $key, $index, $widget) {
                            return $this->render('_item', ['model' => $model]);
                        },
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
<? endif; ?>