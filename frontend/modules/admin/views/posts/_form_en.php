<?php
/**
 * Created by PhpStorm.
 * User: borod
 * Date: 03.08.2018
 * Time: 16:18
 */

use vova07\imperavi\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;

/* @var $tags string */
?>
<?= $form->field($model, 'name') ?>
<?= $form->field($model, 'preview_text')->textarea(['maxlength' => 500, 'rows' => 3]) ?>
<div class="form-group field-post-slug">
    <label class="control-label" for="tags">Tags (separate by comma)</label>
    <?= Html::input('string', 'tags[en]', $tags, ['class' => 'form-control', 'id' => 'tags']) ?>
</div>

<?= $form->field($model, 'text')->textarea()->widget(Widget::className(), [
    'settings' => [
        'lang'                     => Yii::$app->language,
        'minHeight'                => 200,
        'imageUpload'              => Url::to(['posts/image-upload']),
        'imageUploadErrorCallback' => new JsExpression('function (response) { alert("An error occurred during the upload process! Max image width 1200px. Max image height 1000px."); }'),
        'buttons'                  => ['html', 'formatting', 'bold', 'italic', 'deleted', 'unorderedlist', 'orderedlist', 'link', 'image'],
        'plugins'                  => [
            'fullscreen',
            'imagemanager',
            'video'
        ],
    ]]) ?>
<div class="seo-form">
    <?= $form->field($model, 'title') ?>
    <?= $form->field($model, 'keywords') ?>
    <?= $form->field($model, 'description')->textarea() ?>
</div>
