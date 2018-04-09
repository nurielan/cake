<?php

namespace backend\controllers;

use common\models\UserAddress;
use Yii;

class RestDataController extends \yii\web\Controller
{
    public function actionUserAddress($noid = null)
    {
        if ($noid) {
            $userAddress = UserAddress::find()->where(['or', ['id' => $noid], ['no' => $noid]])->andWhere(['user_no' => Yii::$app->user->identity->no])->asArray()->one();
        } else {
            $userAddress = UserAddress::find()->asArray()->all();
        }

        return Yii::createObject([
            'class' => \yii\web\Response::className(),
            'format' => \yii\web\Response::FORMAT_JSON,
            'data' => $userAddress
        ]);
    }
}