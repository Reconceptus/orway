<?php

/* @var $this \yii\web\View */

/* @var $content string */

use frontend\modules\admin\assets\AdminAsset;
use yii\helpers\Html;

AdminAsset::register($this);

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

<div class="wrap">
    <div class="row">
        <div class="container-fluid">
            <div class="col-sm-3 col-md-2 sidebar">
                <div class="sidebar-header">
                    <?=Html::a('<div class="logo"><img src="/svg/icons/logo-light.svg" alt="ORWAY" width="154" height="35"></div>',\yii\helpers\Url::to('/'))?>
                </div>
                <?= \frontend\modules\admin\widgets\menu\Menu::widget() ?>
            </div>
            <div class="admin-content">
                <?= $this->render('/service/_flashes') ?>
                <?= $content ?>
            </div>
        </div>
    </div>
</div>


<footer class="footer">
    <div class="admin-content">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
    </div>
    <div class="clearfix"></div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
