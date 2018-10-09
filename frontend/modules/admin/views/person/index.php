<?php
/* @var $dataProvider \yii\data\ActiveDataProvider */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Persons';

$columns = [
    [
        'class'   => 'yii\grid\SerialColumn',
        'options' => ['style' => 'width:40px'],
    ],
    [
        'attribute' => 'image',
        'format'    => 'html',
        'options'   => ['style' => 'width:100px'],
        'value'     => function ($model) {
            return $model->image ? Html::img($model->image, ['class' => 'post-list-image-preview']) : '';
        }
    ],
    'name',
    'description',
    [
        'class'    => 'yii\grid\ActionColumn',
        'template' => '{update}   {delete}',
        'options'  => ['style' => 'width:100px']
    ]
];
?>
    <h1><?= $this->title ?></h1>
<?= Html::a('Create post', Url::to('/admin/person/create'), ['class' => 'btn btn-admin add-big-button']) ?>
    <div class="posts-table">
        <?= \yii\grid\GridView::widget(
            [
                'dataProvider' => $dataProvider,
                'rowOptions'   => function ($model, $key, $index, $grid) {
                    return ['onclick' => 'window.location = "' . Url::to(['update', 'id' => $model->id]) . '"'];
                },
                'layout'       => '{items}{pager}',
                'columns'      => $columns
            ]
        );
        ?>
    </div>
<?= Html::a('Go to site', Url::to('/blog'), ['target' => '_blank', 'class' => 'btn btn-admin go-site']) ?>