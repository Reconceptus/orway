<?php
/**
 * Created by PhpStorm.
 * User: borod
 * Date: 2018-10-04
 * Time: 15:53
 */

use yii\helpers\Html;

?>
<div class="container">
    <header id="header" class="header no-bg">
        <div class="content">
            <div class="header--main">
                <input type="checkbox" class="hide burger--check" id="burgerMenu">
                <?= Html::a('<img src="/svg/icons/logo-light.svg" alt="ORWAY" width="154" height="35">', \yii\helpers\Url::to('/'), ['class' => 'logo']) ?>
                <label for="burgerMenu" class="burger">
                    <span></span>
                </label>
                <nav class="nav" id="nav">
                    <?= $this->render('_menu') ?>
                    <? if (\common\models\Config::getValue('show_lang_selector') === '1'): ?>
                        <?= \frontend\modules\translate\widgets\select\Select::widget() ?>
                    <? endif; ?>
                </nav>
            </div>
        </div>
    </header>
