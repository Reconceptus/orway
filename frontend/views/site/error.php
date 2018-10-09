<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */

/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<?= \frontend\widgets\layout\Layout::widget(['viewName' => 'header']) ?>
    <div id="main" class="main dark-theme">
        <? if ($exception->statusCode === 404): ?>
            <div class="section section--error">
                <div class="content content--xs">
                    <div class="error-logo">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 74.2 34.7"
                             enable-background="new 0 0 74.2 34.7">
                            <g fill="none" stroke="#fff" stroke-width=".25" stroke-miterlimit="23">
                                <path d="m33.3 26.5c-.6-1.8-.9-4.5-.9-8.1 0-1.8.1-3.4.2-4.7.1-1.4.4-2.5.7-3.4s.8-1.6 1.3-2c.5-.5 1.2-.7 1.9-.7 1.5 0 2.6.9 3.2 2.7.7 1.8 1 4.5 1 8.1 0 3.6-.3 6.3-1 8.1-.6 1.8-1.7 2.7-3.2 2.7-1.5 0-2.6-.9-3.2-2.7zm13.4-15c-.4-2-1.1-3.7-2-5.1-.9-1.4-2-2.5-3.4-3.2-1.4-.7-2.9-1.1-4.8-1.1-1.9 0-3.6.4-5 1.1-1.3.8-2.4 1.8-3.3 3.2-.9 1.4-1.5 3.1-1.9 5.1-.4 2-.6 4.3-.6 6.8 0 2.5.2 4.8.7 6.8.4 2 1.1 3.7 2 5.1.9 1.4 2 2.5 3.4 3.2 1.4.7 2.9 1.1 4.8 1.1 1.9 0 3.6-.4 5-1.1 1.4-.7 2.5-1.8 3.4-3.2.9-1.4 1.5-3.1 1.9-5.1.4-2 .6-4.3.6-6.8-.2-2.5-.4-4.8-.8-6.8z"/>
                                <path class="right-digit" d="m58.2 17c1.2-1.7 2.1-3.2 2.8-4.6.6-1.3.9-1.9.9-1.9.1 0 .2 0 .2 0-.2 3-.3 7.3-.3 11.9-4.8 0-7.2 0-7.2 0 1.3-1.6 1.7-3.1 1.2-4.5-1-2.4-1.1-4.3-.2-5.4 4.3-6.6 6.5-9.8 6.5-9.8 4.1 0 6.1 0 6.1 0 0 13.2 0 19.8 0 19.8 2.5 0 3.8 0 3.8 0 0 3.5 0 5.2 0 5.2-2.5 0-3.8 0-3.8 0 0 4.4 0 6.5 0 6.5-4.3 0-6.5 0-6.5 0 0-4.4 0-6.5 0-6.5-8.7 0-13 0-13 0 0-3.1 0-4.6 0-4.6 2.4-3.6 3.6-5.4 3.6-5.4"/>
                                <path class="left-digit" d="M19.6,5V2.6h-6.1L0.1,23v4.6h13v6.5h6.5v-6.5h3.8v-5.2h-3.8v-2.7"/>
                                <path class="left-digit-in" d="m13.1 17.1v5.3h-7.1l5.3-8c.4-.7.8-1.3 1.1-2 .3-.7.6-1.3.9-1.9h.2l-.1.7-.1 1.1-.1 1.4-.1 1.4v1.2.8z"/>
                            </g>
                            <g fill="none" stroke="#fff" stroke-width=".2" stroke-miterlimit="23">
                                <path class="ltr-string" d="M52.4,17.6C48.8,23,19.6,24.3,19.6,5"/>
                                <path class="rtl-string" d="M19.6,19.7C33,1.7,63.8,4.7,58.2,17"/>
                            </g>
                        </svg>
                    </div>
                    <div class="error-text"> <?= nl2br(Html::encode($message)) ?></div>
                    <div class="error-link">
                        <?=Html::a('Back to home', \yii\helpers\Url::to('/'),['class'=>'btn btn--light'])?>
                    </div>
                </div>
            </div>
        <? else: ?>
            <div class="site-error">
                <h1><?= Html::encode($this->title) ?></h1>

                <div class="alert alert-danger">
                    <?= nl2br(Html::encode($message)) ?>
                </div>

                <p>
                    The above error occurred while the Web server was processing your request.
                </p>
                <p>
                    Please contact us if you think this is a server error. Thank you.
                </p>

            </div>
        <? endif; ?>
    </div>
<?= \frontend\widgets\layout\Layout::widget(['viewName' => 'footer']) ?>