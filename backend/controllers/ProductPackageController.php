<?php

namespace backend\controllers;

use Yii;
use common\models\ProductPackage;
use common\models\ProductPackageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use common\models\ProductItem;

/**
 * ProductPackageController implements the CRUD actions for ProductPackage model.
 */
class ProductPackageController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['superadmin', 'admin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ProductPackage models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductPackageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductPackage model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ProductPackage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductPackage();
        $model->no = Yii::$app->myLibrary->getAutoNoProductPackage();
        $model->created_at = date('Y-m-d h:i:s');
        $model->updated_at = date('Y-m-d h:i:s');

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->imageTemp1 = UploadedFile::getInstance($model, 'image1');
            $model->imageTemp2 = UploadedFile::getInstance($model, 'image2');
            $model->imageTemp3 = UploadedFile::getInstance($model, 'image3');

            if ($model->imageTemp1) {
                $model->uploadImages(1);
                $model->image1 = $model->imageName1;
            }

            if ($model->imageTemp2) {
                $model->uploadImages(2);
                $model->image2 = $model->imageName2;
            }

            if ($model->imageTemp3) {
                $model->uploadImages(3);
                $model->image3 = $model->imageName3;
            }

            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'productItem' => ProductItem::find()->all()
        ]);
    }

    /**
     * Updates an existing ProductPackage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $image1 = $model->image1;
        $image2 = $model->image2;
        $image3 = $model->image3;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->imageTemp1 = UploadedFile::getInstance($model, 'image1');
            $model->imageTemp2 = UploadedFile::getInstance($model, 'image2');
            $model->imageTemp3 = UploadedFile::getInstance($model, 'image3');

            if ($model->imageTemp1) {
                $model->removeImage($image1);
                $model->uploadImages(1);
            } elseif ($model->removeImage1) {
                $model->removeImage($image1);
                $model->image1 = null;
            } else {
                $model->image1 = $image1;
            }

            if ($model->imageTemp2) {
                $model->removeImage($image2);
                $model->uploadImages(2);
            } elseif ($model->removeImage2) {
                $model->removeImage($image2);
                $model->image2 = null;
            } else {
                $model->image2 = $image2;
            }

            if ($model->imageTemp3) {
                $model->removeImage($image3);
                $model->uploadImages(3);
            } elseif ($model->removeImage3) {
                $model->removeImage($image3);
                $model->image3 = null;
            } else {
                $model->image3 = $image3;
            }

            $model->update();

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'productItem' => ProductItem::find()->all()
        ]);
    }

    /**
     * Deletes an existing ProductPackage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $image1 = $model->image1;
        $image2 = $model->image2;
        $image3 = $model->image3;

        if ($model->image1) {
            $model->removeImage($image1);
        }

        if ($model->image2) {
            $model->removeImage($image2);
        }

        if ($model->image3) {
            $model->removeImage($image3);
        }

        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductPackage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return ProductPackage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductPackage::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('common', 'The requested page does not exist.'));
    }
}
