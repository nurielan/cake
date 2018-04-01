<?php
namespace frontend\models;

use common\models\UserAddress;
use common\models\UserConfig;
use common\models\UserDetail;
use yii\base\Model;
use common\models\User;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password, $password2;

    public $uDFullname;
    public $uDGender;

    public $uAAddress;
    public $uASubdistrict;
    public $uADistrict;
    public $uAProvince;
    public $uAPostalCode;
    public $uAPhoneNumber;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['password2', 'required'],
            ['password2', 'string', 'min' => 6],
            ['password2', 'compare', 'compareAttribute' => 'password'],

            [['uDFullname', 'uDGender'], 'required'],

            [['uAAddress', 'uASubdistrict', 'uADistrict', 'uAProvince', 'uAPostalCode', 'uAPhoneNumber'], 'required'],
            [['uAPostalCode'], 'integer'],
            ['uAPhoneNumber', 'unique', 'targetClass' => '\common\models\UserDetail', 'targetAttribute' => 'phone_number']
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => Yii::t('common', 'Username'),
            'email' => Yii::t('common', 'E-Mail'),
            'password' => Yii::t('common', 'Password'),
            'password2' => Yii::t('common', 'Password Repeat'),

            'uDFullname' => Yii::t('common', 'Fullname'),
            'uDGender' => Yii::t('common', 'Gender'),

            'uAAddress' => Yii::t('common', 'Address'),
            'uASubdistrict' => Yii::t('common', 'Subdistrict'),
            'uADistrict' => Yii::t('common', 'District'),
            'uAProvince' => Yii::t('common', 'Province'),
            'uAPostalCode' => Yii::t('common', 'Postal Code'),
            'uAPhoneNumber' => Yii::t('common', 'Phone Number'),
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->no = Yii::$app->myLibrary->getAutoNoUser();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->role = 3;
        $user->status = 11;
        $user->generateAuthKey();
        $user->created_at = date('Y-m-d h:i:s');
        $user->updated_at = date('Y-m-d h:i:s');
        $user->save();

        $userDetail = new UserDetail();
        $userDetail->user_no = $user->no;
        $userDetail->fullname = $this->uDFullname;
        $userDetail->gender = $this->uDGender;
        $userDetail->created_at = date('Y-m-d h:i:s');
        $userDetail->updated_at = date('Y-m-d h:i:s');
        $userDetail->save(false);

        $userAddress = new UserAddress();
        $userAddress->no = Yii::$app->myLibrary->getAutoNoUserAddress();
        $userAddress->user_no = $user->no;
        $userAddress->title = 'Alamat 1';
        $userAddress->address = $this->uAAddress;
        $userAddress->subdistrict = $this->uASubdistrict;
        $userAddress->district = $this->uADistrict;
        $userAddress->province = $this->uAProvince;
        $userAddress->postal_code = $this->uAPostalCode;
        $userAddress->phone_number = $this->uAPhoneNumber;
        $userAddress->created_at = date('Y-m-d h:i:s');
        $userAddress->updated_at = date('Y-m-d h:i:s');
        $userAddress->save(false);

        $userConfig = new UserConfig();
        $userConfig->user_no = $user->no;
        $userConfig->primary_address = $userAddress->no;
        $userConfig->created_at = date('Y-m-d h:i:s');
        $userConfig->updated_at = date('Y-m-d h:i:s');
        $userConfig->save(false);
        
        //return $user->save() ? $user : null;
        return true;
    }
}
