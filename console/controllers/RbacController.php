<?php

namespace console\controllers;

class RbacController extends \yii\console\Controller
{

    public function init()
    {
        $auth = \Yii::$app->authManager;

        // Permission

        $createPost = $auth->createPermission('createPost');
        $createPost->description = Yii::t('common', 'Create a post');
        $auth->add($createPost);

        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = Yii::t('common', 'Update a post');
        $auth->add($updatePost);

        $deletePost = $auth->createPermission('deletePost');
        $deletePost->description = Yii::t('common', 'Delete a post');
        $auth->add($deletePost);

        // Role

        $customer = $auth->createRole('customer');
        $auth->add($customer);

        $admin = $auth->createRole('admin');
        $auth->add($admin);

        $superadmin = $auth->createRole('superadmin');
        $auth->add($superadmin);
        $auth->addChild($superadmin, $admin);

        // Assign role

        /*$auth->assign($superadmin, 'USR0000000000001');
        $auth->assign($admin, 'USR0000000000002');*/
    }
}