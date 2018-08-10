<?php
/**
 * Created by PhpStorm.
 * User: borod
 * Date: 03.08.2018
 * Time: 16:19
 */

use vova07\imperavi\Widget;
use yii\helpers\Url;
use yii\web\JsExpression;

/* @var $tags string */
?>
<?= $form->field($model, 'name_es') ?>
<?= $form->field($model, 'text_es')->textarea()->widget(Widget::className(), [
    'settings' => [
        'lang'                     => Yii::$app->language,
        'minHeight'                => 200,
        'imageUpload'              => Url::to(['page/image-upload']),
        'imageUploadErrorCallback' => new JsExpression('function (response) { alert("An error occurred during the upload process! Max image width 1200px. Max image height 1000px."); }'),
        'buttons'                  => ['html', 'formatting', 'bold', 'italic', 'deleted', 'unorderedlist', 'orderedlist', 'link', 'image'],
        'plugins'                  => [
            'fullscreen',
            'imagemanager',
            'video'
        ],
    ]]) ?>
<div class="seo-form">
    <?= $form->field($model, 'title_es') ?>
    <?= $form->field($model, 'keywords_es') ?>
    <?= $form->field($model, 'description_es')->textarea() ?>
</div>
