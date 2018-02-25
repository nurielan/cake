<?php

namespace common\libraries;

use Yii;
use yii\helpers\Url;

class MyLibrary {

    public function getUserImage($user) {
        if (!$user->image && $user->userDetail->gender == 1) {
            $path = Url::to('@web/assets/adminlte/dist/img/avatar5.png');
        } elseif ((!$user->image && $user->userDetail->gender == 2)) {
            $path = Url::to('@web/assets/adminlte/dist/img/avatar2.png');
        } else {
            $path = Url::to('@web/assets/common/img/thumb/' . $user->image);
        }

        return $path;
    }
}