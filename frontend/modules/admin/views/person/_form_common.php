<?php
/**
 * Created by PhpStorm.
 * User: borod
 * Date: 03.08.2018
 * Time: 16:18
 */

use yii\helpers\Html;

/* @var $model \common\models\Person*/
?>
<div class="preview-image-block" data-id="<?= $model->id ?>">
    <?
    if ($model->image && file_exists(Yii::getAlias('@webroot', $model->image))) :?>
        <?=Html::img($model->image, ['class' => 'img-responsive preview-image']);?>
    <?endif;?>
    <?= $form->field($model, 'image')->fileInput(['accept' => 'image/*', 'id' => 'preview_image']) ?>
</div>
