<?php
/**
 * Created by PhpStorm.
 * User: borod
 * Date: 03.08.2018
 * Time: 16:18
 */

use common\models\Post;
use yii\helpers\Html;

?>
<?= Html::hiddenInput('old-image', $model->image) ?>
<?= $form->field($model, 'slug') ?>
<?= $form->field($model, 'status')->dropDownList([Post::STATUS_PUBLISHED => 'published', Post::STATUS_NOT_PUBLISHED => 'hidden']) ?>
<div class="preview-image-block" data-id="<?= $model->id ?>">
    <?
    if ($model->image && file_exists(Yii::getAlias('@webroot', $model->image))) :?>
        <?=Html::img($model->image, ['class' => 'img-responsive preview-image']);?>
        <div class="btn btn-admin js-delete-preview">delete image</div>
    <?endif;?>
    <?= $form->field($model, 'image')->fileInput(['accept' => 'image/*', 'id' => 'preview_image']) ?>
</div>
