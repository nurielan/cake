<?php

namespace common\libraries;

use common\models\UserAddress;
use Yii;
use yii\helpers\Url;

class MyLibrary {

    public function getUserImage($user) {
        if (!$user->image && $user->userDetail->gender == 1) {
            $path = Url::to('@web/adminlte/dist/img/avatar5.png');
        } elseif ((!$user->image && $user->userDetail->gender == 2)) {
            $path = Url::to('@web/adminlte/dist/img/avatar2.png');
        } else {
            $path = Url::to('@web/img/user/thumb/' . $user->image);
        }

        return $path;
    }

    public function getUserGender($user) {
        if ($user->userDetail->gender == 1) {
            $gender = Yii::t('common', 'Male');
        } elseif ($user->userDetail->gender == 2) {
            $gender = Yii::t('common', 'Female');
        }

        return $gender;
    }

    public function getAutoNoUserAddress() {
        $no = UserAddress::find()->max('no');

        if (!$no) {
            $newNo = 'ADDRS0000000000001';
        } else {
            $oldNo = (int) substr($no, 6, strlen($no));
            $addNo = $oldNo + 1;

            if ($addNo < 10) {
                $newNo = 'ADDRS000000000000' . $addNo;
            } elseif ($addNo < 100) {
                $newNo = 'ADDRS00000000000' . $addNo;
            } elseif ($addNo < 1000) {
                $newNo = 'ADDRS0000000000' . $addNo;
            } elseif ($addNo < 10000) {
                $newNo = 'ADDRS000000000' . $addNo;
            } elseif ($addNo < 100000) {
                $newNo = 'ADDRS00000000' . $addNo;
            } elseif ($addNo < 1000000) {
                $newNo = 'ADDRS0000000' . $addNo;
            } elseif ($addNo < 10000000) {
                $newNo = 'ADDRS000000' . $addNo;
            } elseif ($addNo < 100000000) {
                $newNo = 'ADDRS00000' . $addNo;
            } elseif ($addNo < 1000000000) {
                $newNo = 'ADDRS0000' . $addNo;
            } elseif ($addNo < 10000000000) {
                $newNo = 'ADDRS000' . $addNo;
            } elseif ($addNo < 100000000000) {
                $newNo = 'ADDRS00' . $addNo;
            } elseif ($addNo < 1000000000000) {
                $newNo = 'ADDRS0' . $addNo;
            } elseif ($addNo < 10000000000000) {
                $newNo = 'ADDRS' . $addNo;
            }
        }

        return $newNo;
    }
}