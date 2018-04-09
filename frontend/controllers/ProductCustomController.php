<?php

namespace frontend\controllers;

use common\models\ProductCustom;
use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

class ProductCustomController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $model = new ProductCustom;
        $model->no = Yii::$app->myLibrary->getAutoNoProductCustom();
        $model->user_no = Yii::$app->user->identity->no;
        $model->created_at = date('Y-m-d h:i:s');
        $model->updated_at = date('Y-m-d h:i:s');

        $productCustom = ProductCustom::find()->where(['user_no' => Yii::$app->user->identity->no])->all();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->imageTemp1 = UploadedFile::getInstance($model, 'image1');

            if ($model->imageTemp1) {
                $model->uploadImages(1);
                $model->image1 = $model->imageName1;
            }

            $model->save();

            return $this->redirect(['product-custom/index'], 301);
        }

        return $this->render('index', ['model' => $model, 'productCustom' => $productCustom]);
    }

    public function actionRemove($no)
    {
        $model = ProductCustom::findOne(['no' => $no]);
        $image1 = $model->image1;

        if ($model->image1) {
            $model->removeImage($image1);
        }

        $model->delete();

        return $this->redirect(['product-custom/index'], 301);
    }

    public function actionOrder()
    {
        if (Yii::$app->request->isPost) {
            $pc = Yii::$app->request->post('product_custom_no');

            if (empty($pc)) {
                Yii::$app->session->setFlash('product_custom', Yii::t('common', 'You should select at least one Product'));

                return $this->redirect(['product-custom/index']);
            }

            return print_r($pc);
        }

        return $this->redirect(['product-custom/index']);
    }
}