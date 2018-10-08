<?php

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */

/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
?>

<?= \frontend\widgets\layout\Layout::widget(['viewName' => 'header-dark']) ?>
<div id="main" class="main">
    <?= \common\widgets\Alert::widget() ?>
    <div class="section section--login">
        <div class="content content--xs">
            <div class="login-form" style="color: #FFF">
                <h1><?= Html::encode($this->title) ?></h1>

                <p>Please fill out your email. A link to reset password will be sent there.</p>
                <?php $form = ActiveForm::begin(['id' => 'request-form']); ?>
                <div class="login-form--fieldset">
                    <div class="form--field">
                        <div class="input">
                            <?= Html::activeTextInput($model, 'email', ['autofocus' => true]) ?>
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