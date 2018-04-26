<?php

namespace backend\controllers;

use Barryvdh\DomPDF\ServiceProvider;
use common\models\Bank;
use common\models\User;
use Yii;
use common\models\OrderList;
use common\models\OrderListSearch;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * OrderListController implements the CRUD actions for OrderList model.
 */
class OrderListController extends Controller
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
     * Lists all OrderList models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrderListSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OrderList model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        return $this->render('view', [
            'model' => $model,
            'bank' => Bank::findOne($model->orderConfirm->bank_id)
        ]);
    }

    /**
     * Updates an existing OrderList model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'cashier' => User::find()->where('role < 11')->all(),
            'buyer' => User::find()->where('role > 10')->all()
        ]);
    }

    /**
     * Deletes an existing OrderList model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the OrderList model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return OrderList the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OrderList::find()->where(['or', ['id' => $id], ['no' => $id]])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('common', 'The requested page does not exist.'));
    }

    public function actionStatus($no, $action)
    {
        $noo = str_replace('-', '/', $no);
        $model = OrderList::findOne(['no' => $noo]);
        $orderConfirm = $model->orderConfirm;

        if ($model->status == -1) {
            $model->status == 0;
        } elseif ($model->status == 5) {
            $model->status == 4;
        }

        $status_old = $model->status;

        if ($model) {
            switch ($action) {
                case 'up' : $status_new = $model->status + 1; $orderConfirm->status = 2; $orderConfirm->update(false); break;
                case 'down' : $status_new = $model->status - 1; break;
                case 'ban' : $status_new = 10; break;
                case 'unban' : $status_new = 0; break;
                default : $status_new = $model->status; break;
            }

            $model->status = $status_new;
            $model->update(false);
        }

        return $this->redirect(['order-list/index']);
    }

    public function actionPrint($id)
    {
        $no = str_replace('-', '/', $id);
        $model = $this->findModel($no);
        $bank = Bank::findOne($model->orderConfirm->bank_id);

        return $this->renderPartial('invoice', ['model' => $model, 'bank' => $bank]);
        //print_r($model);
    }
}
