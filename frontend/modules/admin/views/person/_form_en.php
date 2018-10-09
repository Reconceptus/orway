<?php
/**
 * Created by PhpStorm.
 * User: borod
 * Date: 03.08.2018
 * Time: 16:18
 */

/* @var $tags string */
?>
<?= $form->field($model, 'name') ?>
<?= $form->field($model, 'position') ?>
<?= $form->field($model, 'description')->textarea(['maxlength' => 600, 'rows' => 3]) ?>
