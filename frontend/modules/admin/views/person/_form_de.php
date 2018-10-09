<?php
/**
 * Created by PhpStorm.
 * User: borod
 * Date: 03.08.2018
 * Time: 16:19
 */

/* @var $tags string */
?>
<?= $form->field($model, 'name_de') ?>
<?= $form->field($model, 'position_de') ?>
<?= $form->field($model, 'description_de')->textarea(['maxlength' => 600, 'rows' => 3]) ?>
