<?php

namespace backend\controllers\main;

use Yii;

class BackendController extends \yii\web\Controller {

    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => false,
                        'actions' => ['home'],
                        'roles' => ['@']
                    ]
                ]
            ]
        ];
    }

    public function actionIndex() {
        echo 'Hello world';
    }
}