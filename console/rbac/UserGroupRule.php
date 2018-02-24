<?php

namespace console\rbac;

class UserGroupRule extends \yii\rbac\Rule {

    public $name = 'userGroup';

    public function execute($user, $item, $params)
    {
        // TODO: Implement execute() method.
        if (!\Yii::$app->user->isGuest) {
            $group = \Yii::$app->user->identity->role;

            if ($item->name === 'superadmin') {
                return $group === 1 || $group === 2 || $group === 3;
            } elseif ($item->name === 'admin') {
                return $group === 2 || $group === 3;
            } elseif ($item->name === 'customer') {
                return $group === 3;
            }
        }

        return false;
    }
}