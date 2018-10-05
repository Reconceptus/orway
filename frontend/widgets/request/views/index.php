<?php
/**
 * Created by PhpStorm.
 * User: borod
 * Date: 09.08.2018
 * Time: 11:53
 */

/* @var $model \common\models\Request */

use yii\helpers\Html;

?>
<div class="modal" data-modal="request">
    <div class="bg close"></div>
    <div class="modal-wrap">
        <span class="close">&times;</span>
        <div class="content content--xs">
            <div class="request-form">
                <h3 class="request-form--title">Request</h3>
                <? $form = \yii\widgets\ActiveForm::begin([
                    'action'                 => \yii\helpers\Url::to('/site/request'),
                    'method'                 => 'post',
                    'enableClientValidation' => true,
                    'id'                   => 'request-form'
                ]) ?>
                <div class="request-form--fieldset">
                    <div class="form--field">
                        <label>
                            <div class="label">Message</div>
                            <div class="input">
                                <?= Html::activeTextarea($model, 'message', ['placeholder' => 'Type your message', 'rows' => 3]) ?>
                            </div>
                        </label>
                    </div>
                    <div class="form--field">
                        <label>
                            <div class="label">Contact info (email or phone number)</div>
                            <div class="input">
                                <?= Html::activeTextInput($model, 'contact_info') ?>
                            </div>
                        </label>
                    </div>
                    <div class="form--field">
                        <label>
                            <div class="label">Name</div>
                            <div class="input">
                                <?= Html::activeTextInput($model, 'name') ?>
                            </div>
                        </label>
                    </div>
                    <div class="form--field">
                        <div class="check">
                            <label>
                                <?= Html::activeCheckbox($model, 'accept', ['label' => false]) ?>
                                <span class="check-text">I have read and agree to the Terms&Conditions and Privacy Policy.</span>
                            </label>
                        </div>
                    </div>
                    <div class="submit">
                        <div class="captcha">
                            <?= $form->field($model, 'reCaptcha')->widget(\himiklab\yii2\recaptcha\ReCaptcha::className()) ?>
                        </div>
                        <div class="btn btn--square-light js-request">Send</div>
                    </div>
                    <input type="hidden" name="back" value="<?= Yii::$app->request->absoluteUrl ?>">
                    <div class="thanks-box">
                        <div class="txt">Thank You!</div>
                    </div>
                </div>
                <? $form::end() ?>
            </div>
        </div>
    </div>
</div>
