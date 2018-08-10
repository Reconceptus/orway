<?php
/**
 * Created by PhpStorm.
 * User: suhov.a.s
 * Date: 24.07.2018
 * Time: 12:13
 */

namespace frontend\modules\admin\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;

class AdminController extends Controller
{
    public $layout = 'admin';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'denyCallback' => function ($rule, $action) {
                    return $this->redirect('/');
                },
                'rules' => [
                    [
                        'actions' => [],
                        'allow'   => true,
                        'roles'   => [
                            'adminPanel',
                        ],
                    ],
                ],
            ],
        ];
    }
}