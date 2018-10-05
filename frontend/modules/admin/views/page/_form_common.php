<?php
/**
 * Created by PhpStorm.
 * User: borod
 * Date: 03.08.2018
 * Time: 16:18
 */

use yii\helpers\Html;

?>
<?= Html::hiddenInput('old-image', $model->image) ?>
<?= $form->field($model, 'slug') ?>
<?= $form->field($model, 'to_footer')->checkbox() ?>

