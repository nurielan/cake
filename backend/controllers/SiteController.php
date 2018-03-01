<?php
namespace backend\controllers;

use backend\models\ProfileAddressForm;
use backend\models\ProfileConfigAddressForm;
use backend\models\ProfilePasswordForm;
use backend\models\ProfileSettingsForm;
use common\models\User;
use common\models\UserAddress;
use common\models\UserConfig;
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

        $modelPAF = new ProfileAddressForm;

        $modelPCAF = new ProfileConfigAddressForm;
        $modelPCAF->primary_address = Yii::$app->user->identity->userConfig->userAddress->no;

        if ($modelPSF->load(Yii::$app->request->post()) && $modelPSF->validate()) {
            $user = Yii::$app->user->identity;
            $user->username = $modelPSF->username;
            $user->email = $modelPSF->username;
            $user->update(false);

            $userDetail = Yii::$app->user->identity->userDetail;
            $userDetail->fullname = $modelPSF->fullname;
            $userDetail->gender = $modelPSF->gender;
            $userDetail->description = $modelPSF->description;
            $userDetail->update(false);

            Yii::$app->session->setFlash('alert-settings', [
                'status' => 'success',
                'message' => Yii::t('common', 'You have successfully changed the settings')
            ]);
        }

        if ($modelPPF->load(Yii::$app->request->post()) && $modelPPF->validate()) {
            $user = Yii::$app->user->identity;
            $user->password_hash = Yii::$app->security->generatePasswordHash($modelPPF->password_hash3);
            $user->update(false);

            $modelPPF->password_hash = '';
            $modelPPF->password_hash2 = '';
            $modelPPF->password_hash3 = '';

            Yii::$app->session->setFlash('alert-password', [
                'status' => 'success',
                'message' => Yii::t('common', 'You have successfully changed the password')
            ]);
        }

        if ($modelPAF->load(Yii::$app->request->post()) && $modelPAF->validate()) {
            $address = new UserAddress;
            $address->user_no = Yii::$app->user->identity->no;
            $address->title = $modelPAF->title;
            $address->name = $modelPAF->title;
            $address->address = $modelPAF->title;
            $address->subdistrict = $modelPAF->title;
            $address->district = $modelPAF->title;
            $address->province = $modelPAF->title;
            $address->postal_code = $modelPAF->title;
            $address->phone_number = $modelPAF->title;
            //$address->save();

            Yii::$app->session->setFlash('alert-address', [
                'status' => 'success',
                'message' => Yii::t('common', 'You have successfully changed the password')
            ]);
        }

        if ($modelPCAF->load(Yii::$app->request->post()) && $modelPCAF->validate()) {
            $config = Yii::$app->user->identity->userConfig;
            $config->primary_address = $modelPCAF->primary_address;
            $config->update(false);

            Yii::$app->session->setFlash('alert-config-address', [
                'status' => 'success',
                'message' => Yii::t('common', 'You have successfully changed the primary address')
            ]);
        }

        return $this->render('profile', [
            'modelPSF' => $modelPSF,
            'modelPPF' => $modelPPF,
            'modelPAF' => $modelPAF,
            'modelPCAF' => $modelPCAF
        ]);
    }
}
