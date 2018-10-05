<?php
/**
 * Created by PhpStorm.
 * User: borod
 * Date: 2018-10-04
 * Time: 15:39
 */

use yii\helpers\Html;

?>
<div class="container dark-theme">
    <header id="header" class="header">
        <div class="content content--lg">
            <div class="header--main">
                <input type="checkbox" class="hide burger--check" id="burgerMenu">
                <?= Html::a('<img src="/svg/icons/logo-light.svg" alt="ORWAY" width="154" height="35">', \yii\helpers\Url::to('/'), ['class' => 'logo']) ?>
                <label for="burgerMenu" class="burger">
                    <span></span>
                </label>
                <nav class="nav" id="nav">
                    <?= $this->render('_menu') ?>
                    <?= \frontend\modules\translate\widgets\select\Select::widget() ?>
                    <div class="request">
                        <button class="btn btn--light show-modal" data-modal="request" type="button">request
                        </button>
                    </div>
                </nav>
            </div>
        </div>
    </header>
