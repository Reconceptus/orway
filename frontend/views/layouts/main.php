<?php

/* @var $this \yii\web\View */

/* @var $content string */

use frontend\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="hide">
    <svg xmlns="http://www.w3.org/2000/svg">
        <symbol id="icon-search" viewBox="0 0 32 32">
            <g fill-rule="evenodd">
                <path d="m19.427 20.427c-1.39.99-3.09 1.573-4.927 1.573-4.694 0-8.5-3.806-8.5-8.5 0-4.694 3.806-8.5 8.5-8.5 4.694 0 8.5 3.806 8.5 8.5 0 2.347-.951 4.472-2.49 6.01l5.997 5.997c.275.275.268.716-.008.992-.278.278-.72.28-.992.008l-6.081-6.081m-4.927.573c4.142 0 7.5-3.358 7.5-7.5 0-4.142-3.358-7.5-7.5-7.5-4.142 0-7.5 3.358-7.5 7.5 0 4.142 3.358 7.5 7.5 7.5"/>
            </g>
        </symbol>
        <symbol id="icon-share-facebook" viewBox="0 0 56.693 56.693">
            <path d="m40.43 21.739h-7.645v-5.01c0-1.883 1.248-2.322 2.127-2.322.877 0 5.395 0 5.395 0v-8.278l-7.43-.029c-8.248 0-10.125 6.174-10.125 10.125v5.518h-4.77v8.53h4.77c0 10.947 0 24.14 0 24.14h10.03c0 0 0-13.32 0-24.14h6.77l.875-8.53"/>
        </symbol>
        <symbol id="icon-share-linkedin" viewBox="0 0 24 24">
            <path d="m8 19h-3v-10h3v10m11 0h-3v-5.342c0-1.392-.496-2.085-1.479-2.085-.779 0-1.273.388-1.521 1.165 0 1.262 0 6.262 0 6.262h-3c0 0 .04-9 0-10h2.368l.183 2h.062c.615-1 1.598-1.678 2.946-1.678 1.025 0 1.854.285 2.487 1 .637.717.954 1.679.954 3.03v5.647"/>
            <ellipse cx="6.5" cy="6.5" rx="1.55" ry="1.5"/>
        </symbol>
        <symbol id="icon-share-twitter" viewBox="0 0 56.693 56.693">
            <path d="m52.837 15.06c-1.811.805-3.76 1.348-5.805 1.591 2.088-1.25 3.689-3.23 4.444-5.592-1.953 1.159-4.115 2-6.418 2.454-1.843-1.964-4.47-3.192-7.377-3.192-5.581 0-10.11 4.525-10.11 10.11 0 .791.089 1.562.262 2.303-8.4-.422-15.848-4.445-20.833-10.56-.87 1.492-1.368 3.228-1.368 5.082 0 3.506 1.784 6.6 4.496 8.412-1.656-.053-3.215-.508-4.578-1.265-.0001.042-.0001.085-.0001.128 0 4.896 3.484 8.98 8.108 9.91-.848.23-1.741.354-2.663.354-.652 0-1.285-.063-1.902-.182 1.287 4.02 5.02 6.938 9.441 7.02-3.459 2.711-7.816 4.327-12.552 4.327-.815 0-1.62-.048-2.411-.142 4.474 2.869 9.786 4.541 15.493 4.541 18.591 0 28.756-15.4 28.756-28.756 0-.438-.009-.875-.028-1.309 1.974-1.422 3.688-3.203 5.04-5.23"/>
        </symbol>
    </svg>
</div>
<div id="wrapper">
    <div class="container">
        <header id="header" class="header">
            <div class="content content--lg">
                <div class="header--main">
                    <input type="checkbox" class="hide burger--check" id="burgerMenu">
                    <?= Html::a('<img src="/svg/icons/logo-light.svg" alt="ORWAY" width="154" height="35">', \yii\helpers\Url::to('/'), ['class' => 'logo']) ?>
                    <label for="burgerMenu" class="burger">
                        <span></span>
                    </label>
                    <nav class="nav" id="nav">
                        <ul class="nav--menu">
                            <? if (Yii::$app->user->can('adminPanel')): ?>
                                <li><a href="/admin">admin</a></li>
                            <? endif; ?>
                            <? if (!Yii::$app->user->isGuest): ?>
                                <li><?= Html::a('logout', \yii\helpers\Url::to('/site/logout')) ?></li>
                            <? endif; ?>
                            <li><?= Html::a('technology', \yii\helpers\Url::to('/blog')) ?></li>
                            <li><a href="#">events</a></li>
                            <li><a href="#">products</a></li>
                            <li><a href="#">about</a></li>
                        </ul>
                        <?= \frontend\modules\translate\widgets\select\Select::widget() ?>
                        <div class="request">
                            <button class="btn btn--light show-modal" data-modal="request" type="button">request
                            </button>
                        </div>
                    </nav>
                </div>
            </div>
        </header>

<!--        --><?//= Alert::widget() ?>
        <?= $content ?>


        <footer class="footer">
            <div class="content content--lg">
                <div class="footer--main">
                    <?= \frontend\widgets\pages\Pages::widget() ?>
                    <nav class="nav">
                        <ul class="nav--menu">
                            <li><a href="#">technology</a></li>
                            <li><a href="#">events</a></li>
                            <li><a href="#">products</a></li>
                            <li><a href="#">about</a></li>
                        </ul>
                        <div class="request">
                            <button class="btn btn--dark show-modal" data-modal="request" type="button">request</button>
                        </div>
                    </nav>
                </div>
            </div>
        </footer>
    </div>
</div>
<?= \frontend\widgets\request\Request::widget() ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
