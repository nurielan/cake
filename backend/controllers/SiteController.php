<?php
namespace backend\controllers;

use backend\models\ProfilePasswordForm;
use backend\models\ProfileSettingsForm;
use common\models\User;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'profile'],
                        'allow' => true,
                        'roles' => ['superadmin', 'admin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->renderPartial('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionProfile()
    {
        $modelPSF = new ProfileSettingsForm;
        $modelPSF->username = Yii::$app->user->identity->username;
        $modelPSF->email = Yii::$app->user->identity->email;
        $modelPSF->fullname = Yii::$app->user->identity->userDetail->fullname;
        $modelPSF->gender = Yii::$app->user->identity->userDetail->gender;
        $modelPSF->description = Yii::$app->user->identity->userDetail->description;

        $modelPPF = new ProfilePasswordForm;

        //Yii::$app->session->setFlash('tab', 'settings');

        if ($modelPSF->load(Yii::$app->request->post()) && $modelPSF->validate()) {
            Yii::$app->session->setFlash('alert-settings', [
                'status' => 'success',
                'message' => Yii::t('common', 'You have successfully changed the settings')
            ]);
            Yii::$app->session->setFlash('tab', 'settings');
        } else {
            //Yii::$app->session->setFlash('tab', 'settings');
        }

        if ($modelPPF->load(Yii::$app->request->post()) && $modelPPF->validate()) {
            $user = User::find(['no' => Yii::$app->user->identity->no])->one();
            $user->password_hash = Yii::$app->security->generatePasswordHash($modelPPF->password_hash3);
            //$user->update();

            Yii::$app->session->setFlash('alert-password', [
                'status' => 'success',
                'message' => Yii::t('common', 'You have successfully changed the password')
            ]);
            Yii::$app->session->setFlash('tab', 'password');
        } else {
            //Yii::$app->session->setFlash('tab', 'password');
        }

        return $this->render('profile', [
            'modelPSF' => $modelPSF,
            'modelPPF' => $modelPPF
        ]);
    }
}
