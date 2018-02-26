<?php

namespace common\libraries;

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
}