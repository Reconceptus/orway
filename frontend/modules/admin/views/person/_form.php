<?php
/**
 * Created by PhpStorm.
 * User: borod
 * Date: 26.07.2018
 * Time: 13:43
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $model \common\models\Person */

$this->title = $model->isNewRecord ? 'Add person' : 'Edit person';
$viewPostClass = $model->isNewRecord ? 'btn btn-admin disabled' : 'btn btn-admin';
?>
<h1><?= $this->title ?></h1>

<? $form = ActiveForm::begin(['method' => 'post', 'options' => ['enctype' => 'multipart/form-data']]); ?>
<div class="post-form">
    <?= $this->render('_form_common', ['model' => $model, 'form' => $form]) ?>
    <div id="wr-tabs">
        <div class="tabs">
            <div class="tab active btn btn-admin">English</div>
            <div class="tab btn btn-admin">Español</div>
            <div class="tab btn btn-admin">Deutsch</div>
        </div>
        <div class="content-tabs">
            <div class="tab-cont active">
                <?= $this->render('_form_en', ['model' => $model, 'form' => $form]) ?>
            </div>
            <div class="tab-cont">
                <?= $this->render('_form_es', ['model' => $model, 'form' => $form]) ?>
            </div>
            <div class="tab-cont">
                <?= $this->render('_form_de', ['model' => $model, 'form' => $form]) ?>
            </div>
        </div>
    </div>
</div>

<?= Html::submitButton('Save', ['class' => 'btn btn-admin save-post']) ?>
<? ActiveForm::end() ?>
<div class="buttons-panel" title="<?= $model->isNewRecord ? 'The post was not published' : '' ?>">
    <?= Html::a('cancel', Url::to('/admin/person'), ['class' => 'btn btn-admin']) ?>
    <?= Html::a('Go to page', Url::to('/site/about'), ['target' => '_blank', 'class' => $viewPostClass]) ?>
</div>