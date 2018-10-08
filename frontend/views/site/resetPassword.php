<?php

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>

<?= \frontend\widgets\layout\Layout::widget(['viewName' => 'header-dark']) ?>
<div id="main" class="main">
    <?= \common\widgets\Alert::widget() ?>
    <div class="section section--login">
        <div class="content content--xs">
            <div class="login-form" style="color: #FFF">
                <h1><?= Html::encode($this->title) ?></h1>

                <p>Please choose your new password:</p>
                <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>
                <div class="login-form--fieldset">
                    <div class="form--field">
                        <div class="input">
                            <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>
                        </div>
                    </div>
                    <div class="submit">
                        <?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
