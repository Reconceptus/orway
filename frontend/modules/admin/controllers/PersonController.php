<?php
/**
 * Created by PhpStorm.
 * User: suhov.a.s
 * Date: 24.07.2018
 * Time: 12:12
 */

namespace frontend\modules\admin\controllers;

use common\models\Person;
use Imagine\Image\Box;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use yii\filters\AccessControl;
use yii\helpers\FileHelper;
use yii\helpers\Url;
use yii\imagine\Image;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;

class PersonController extends AdminController
{
    /**
     * @return array
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['access'] = [
            'class'        => AccessControl::className(),
            'denyCallback' => function ($rule, $action) {
                return $this->redirect('/');
            },
            'rules'        => [
                [
                    'actions' => [],
                    'allow'   => true,
                    'roles'   => [
                        'users',
                    ],
                ],
            ],
        ];
        return $behaviors;
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $query = Person::find()->localized('en');
        $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]
        );
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    /**
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Person();
        return $this->modify($model);
    }

    /**
     * @param $id
     * @return string|Response
     * @throws NotFoundHttpException
     * @throws \yii\base\Exception
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        return $this->modify($model);
    }

    /**
     * @param $model Person
     * @return string|Response
     * @throws \yii\base\Exception
     */
    public function modify($model)
    {
        $post = Yii::$app->request->post();

        if ($model->load($post)) {
            // Загружаем картинки
            $image = UploadedFile::getInstance($model, 'image');
            if ($image && $image->tempName) {
                $model->image = $image;
                if ($model->validate(['image'])) {
                    if ($model->isNewRecord) {
                        $model->save();
                    }
                    $dir = Yii::getAlias('@webroot/uploads/images/person/');
                    $path = $model->id . '/';
                    FileHelper::createDirectory($dir . $path);
                    $fileName = $model->image->baseName . '.' . $model->image->extension;
                    $model->image->saveAs($dir . $path . $fileName);
                    $model->image = '/uploads/images/person/' . $path . $fileName;
                    $photo = Image::getImagine()->open($dir . $path . $fileName);
                    $photo->thumbnail(new Box(800, 800))->save($dir . $path . $fileName, ['quality' => 90]);
                }
            } elseif (!$model->image && isset($model->oldAttributes['image'])) {
                $model->image = $model->oldAttributes['image'];
            }
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Person added successfully');
            } else {
                Yii::$app->session->setFlash('danger', 'Error creating person');
            }
            return $this->redirect(Url::to(['person/update', 'id' => $model->id]));
        }

        return $this->render('_form', [
            'model' => $model,
        ]);
    }

    /**
     * @param $id
     * @return Person|null|ActiveRecord
     * @throws NotFoundHttpException
     */
    public function findModel($id)
    {
        if (($model = Person::find()->where(['id' => $id])->multilingual()->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}