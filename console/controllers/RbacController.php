<?php

namespace console\controllers;

class RbacController extends \yii\console\Controller
{

    public function actionInit()
    {
        $auth = \Yii::$app->authManager;
        $auth->removeAll();

        // Rule

        $rule = new \console\rbac\UserGroupRule;
        $auth->add($rule);

        // Permission

        $createPost = $auth->createPermission('createPost');
        //$createPost->description = \Yii::t('common', 'Create a post');
        $auth->add($createPost);

        $updatePost = $auth->createPermission('updatePost');
        //$updatePost->description = \Yii::t('common', 'Update a post');
        $auth->add($updatePost);

        $deletePost = $auth->createPermission('deletePost');
        //$deletePost->description = \Yii::t('common', 'Delete a post');
        $auth->add($deletePost);

        // Role

        $customer = $auth->createRole('customer');
        $customer->ruleName = $rule->name;
        $auth->add($customer);

        $admin = $auth->createRole('admin');
        $admin->ruleName = $rule->name;
        $auth->add($admin);
        $auth->addChild($admin, $customer);

        $superadmin = $auth->createRole('superadmin');
        $superadmin->ruleName = $rule->name;
        $auth->add($superadmin);
        $auth->addChild($superadmin, $admin);
        $auth->addChild($superadmin, $customer);

        // Assign role

        /*$auth->assign($superadmin, 'USR0000000000001');
        $auth->assign($admin, 'USR0000000000002');*/
    }
}