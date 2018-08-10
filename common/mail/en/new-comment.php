<h1>Письмо на английском</h1>
<b>Был опубликован новый комментарий</b><br/>
Имя: <?=$model->name?> <br/>
Email: <?=$model->email?><br/>
Текст: <?=$model->text?><br/>
<?= \yii\helpers\Html::a('Посмотреть', Yii::$app->request->getHostInfo() . '/' . Yii::$app->language . '/blog/' . $model->post->slug) ?>
