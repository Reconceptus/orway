<b>New comment</b><br/>
Name: <?=$model->name?> <br/>
Email: <?=$model->email?><br/>
Text: <?=$model->text?><br/>
<?= \yii\helpers\Html::a('Show', Yii::$app->request->getHostInfo() . '/' . Yii::$app->language . '/blog/' . $model->post->slug) ?>
