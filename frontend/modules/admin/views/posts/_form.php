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

/* @var $model \common\models\Post */
/* @var $tags array */

$this->title = $model->isNewRecord ? 'Create post' : 'Edit post';
$viewPostClass = $model->isNewRecord || !$model->status ? 'btn btn-admin disabled' : 'btn btn-admin';
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
                <?= $this->render('_form_en', ['model' => $model, 'form' => $form, 'tags' => $tags['en']]) ?>
            </div>
            <div class="tab-cont">
                <?= $this->render('_form_es', ['model' => $model, 'form' => $form, 'tags' => $tags['es']]) ?>
            </div>
            <div class="tab-cont">
                <?= $this->render('_form_de', ['model' => $model, 'form' => $form, 'tags' => $tags['de']]) ?>
            </div>
        </div>
    </div>
</div>

<?= Html::submitButton('Save', ['class' => 'btn btn-admin save-post']) ?>
<? ActiveForm::end() ?>
<div class="buttons-panel" title="<?= $model->isNewRecord || !$model->status ? 'The post was not published' : '' ?>">
    <?= Html::button('cancel', ['class' => 'btn btn-admin']) ?>
    <?= Html::a('Go to post', Url::to('/blog/' . $model->slug), ['target' => '_blank', 'class' => $viewPostClass]) ?>
</div>