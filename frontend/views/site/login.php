<?php

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */

/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="main" class="main">
    <div class="content content--xs">
        <h1><?= Html::encode($this->title) ?></h1>


        <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <div class="form--field">
                        <?= Html::activeLabel($model, 'username', ['class' => 'label']) ?>
                        <div class="input">
                            <?= Html::activeTextInput($model, 'username', ['autofocus' => true]) ?>
                        </div>
                </div>
                <div class="form--field">
                        <?= Html::activeLabel($model, 'password', ['class' => 'label']) ?>
                        <div class="input">
                            <?= Html::activePasswordInput($model, 'password') ?>
                        </div>
                </div>
                <div class="form--field">
                    <div class="check">
                        <label>
                            <?= Html::activeCheckbox($model, 'rememberMe') ?>
                            <span class="check-text">Remember Me.</span>
                        </label>
                    </div>
                </div>
                <div style="color:#999;margin:1em 0">
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn--square-dark', 'name' => 'login-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>