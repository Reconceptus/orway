<?php

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */

/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= \frontend\widgets\layout\Layout::widget(['viewName' => 'header-dark']) ?>
    <div id="main" class="main">
        <div class="section section--login">
            <div class="content content--xs">
                <div class="login-form">
                    <h1 class="login-form--title"><?= Html::encode($this->title) ?></h1>
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                    <div class="login-form--fieldset">
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
                            <div class="txt">
                                If you forgot your password you
                                can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                            </div>
                        </div>
                        <div class="submit">
                            <button type="submit" class="btn btn--square-light">Send</button>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
<?= \frontend\widgets\layout\Layout::widget(['viewName' => 'footer']) ?>