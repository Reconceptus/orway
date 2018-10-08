<?
/**
 * Created by PhpStorm.
 * User: borod
 * Date: 08.08.2018
 * Time: 15:54
 */

/* @var $role */
/* @var $isNewModel bool */
/* @var $errors array */

/* @var $models array */

use yii\helpers\Html;
use yii\widgets\ActiveForm;


$this->title = 'Edit role ' . $role->description
?>
<h1><?= $this->title ?></h1>
<? ActiveForm::begin() ?>
<div class="roles-form">
    <div class="form-group">
        <label class="control-label">Role name</label>
        <?= Html::textInput('role[description]', $role->description ?: Yii::$app->request->post('role')['description'], ["class" => "form-control"]) ?>
    </div>
    <? if (array_key_exists('description', $errors) && is_array($errors['description'])): ?>
        <? foreach ($errors['description'] as $error): ?>
            <br><?= $error ?>
        <? endforeach ?>
    <? endif ?>

    <? if ($isNewModel): ?>
        <div class="form-group" style="margin-left:30px">
            <label class="control-label">Code</label>
            <?= Html::textInput('role[code]', Yii::$app->request->post('role')['code'], ["class" => "form-control"]) ?>
        </div>
        <? if (isset($errors['code']) && is_array($errors['code'])): ?>
            <? foreach ($errors['code'] as $error): ?>
                <br><?= $error ?>
            <? endforeach ?>
        <? endif ?>

    <? endif ?>
    <span class="clear"></span>
    <div class="permissions-list">
        <? foreach ($models as $model): ?>
            <div class="fll w25">
                <?= Html::checkbox('permissions[' . $model['name'] . ']', $model['assigned'], ['id' => 'permissions_' . $model['name'], 'class' => 'checkbox role-checkbox']) ?>
                <?= Html::label($model['description'], 'permissions_' . $model['name'], ['class' => 'checkbox-label']) ?>
            </div>
        <? endforeach ?>
    </div>
    <div class="clearfix"></div>
    <?= Html::submitButton('Save', ['class' => 'btn btn-admin']) ?>
</div>
<? ActiveForm::end() ?>
