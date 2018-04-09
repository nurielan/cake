<?php

use yii\helpers\Url;
use common\models\ProductBrand;
use common\models\ProductCategory;
use common\models\ProductItem;
use common\models\OrderList;
use common\models\BlogCategory;
use common\models\BlogItem;
use common\models\User;
use common\models\UserAddress;
use common\models\ProductPackage;
use common\models\Gallery;

$nAProductBrand = ProductBrand::find()->where(['status' => 0])->count('status');
$aProductBrand = ProductBrand::find()->where(['status' => 1])->count('status');
$nAProductCategory = ProductCategory::find()->where(['status' => 0])->count('status');
$aProductCategory = ProductCategory::find()->where(['status' => 1])->count('status');
$nAProductItem = ProductItem::find()->where(['status' => 0])->count('status');
$aProductItem = ProductItem::find()->where(['status' => 1])->count('status');
$nAOrderList = OrderList::find()->where(['status' => 0])->count('status');
$aOrderList = OrderList::find()->where(['status' => 1])->count('status');
$bOrderList = OrderList::find()->where(['status' => 2])->count('status');
$nABlogCategory = BlogCategory::find()->where(['status' => 0])->count('status');
$aBlogCategory = BlogCategory::find()->where(['status' => 1])->count('status');
$nABlogItem = BlogItem::find()->where(['status' => 0])->count('status');
$aBlogItem = BlogItem::find()->where(['status' => 1])->count('status');
$nAUser = User::find()->where('role < 6')->count('role');
$aUser = User::find()->where('role > 5')->count('role');
$aUserAddress = UserAddress::find()->count('no');
$nAProductPackage = ProductPackage::find()->where(['status' => 0])->count('status');
$aProductPackage = ProductPackage::find()->where(['status' => 1])->count('status');
$nAGallery = Gallery::find()->where(['status' => 0])->count('status');
$aGallery = Gallery::find()->where(['status' => 1])->count('status');

?>

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= Yii::$app->myLibrary->getUserImage(Yii::$app->user->identity) ?>" class="img-circle"
                     alt="<?= Yii::$app->user->identity->userDetail->fullname . ' (' . Yii::$app->user->identity->username . ')' ?>">
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->userDetail->fullname ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header"><?= Yii::t('common', 'MAIN NAVIGATION') ?></li>
            <li class="<?= Yii::$app->controller->id != 'site' ?: 'active' ?>"><a href="<?= Url::toRoute(['site/index']) ?>"><i class="fa fa-dashboard"></i> <span><?= Yii::t('common', 'Dashboard') ?></span></a></li>
            <li class="treeview <?= Yii::$app->controller->id == 'product-brand' || Yii::$app->controller->id == 'product-category' || Yii::$app->controller->id == 'product-item' || Yii::$app->controller->id == 'product-package' ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-cubes"></i>
                    <span><?= Yii::t('common', 'Product') ?></span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= Yii::$app->controller->id != 'product-brand' ?: 'active' ?>">
                        <a href="<?= Url::toRoute(['product-brand/index']) ?>"><i class="fa fa-th"></i>
                            <span><?= Yii::t('common', 'Brand') ?></span>
                            <span class="pull-right-container">
                              <span class="label label-success pull-right"><?= $aProductBrand ?></span><span class="label label-danger pull-right"><?= $nAProductBrand ?></span>
                            </span>
                        </a>
                    </li>
                    <li class="<?= Yii::$app->controller->id != 'product-category' ?: 'active' ?>">
                        <a href="<?= Url::toRoute(['product-category/index']) ?>"><i class="fa fa-th-large"></i>
                            <span><?= Yii::t('common', 'Category') ?></span>
                            <span class="pull-right-container">
                              <span class="label label-success pull-right"><?= $aProductCategory ?></span><span class="label label-danger pull-right"><?= $nAProductCategory ?></span>
                            </span>
                        </a>
                    </li>
                    <li class="<?= Yii::$app->controller->id != 'product-item' ?: 'active' ?>">
                        <a href="<?= Url::toRoute(['product-item/index']) ?>"><i class="fa fa-square"></i>
                            <span><?= Yii::t('common', 'Item') ?></span>
                            <span class="pull-right-container">
                              <span class="label label-success pull-right"><?= $aProductItem ?></span><span class="label label-danger pull-right"><?= $nAProductItem ?></span>
                            </span>
                        </a>
                    </li>
                    <li class="<?= Yii::$app->controller->id != 'product-package' ?: 'active' ?>">
                        <a href="<?= Url::toRoute(['product-package/index']) ?>"><i class="fa fa-square"></i>
                            <span><?= Yii::t('common', 'Package') ?></span>
                            <span class="pull-right-container">
                              <span class="label label-success pull-right"><?= $aProductPackage ?></span><span class="label label-danger pull-right"><?= $nAProductPackage ?></span>
                            </span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="<?= Yii::$app->controller->id == 'order-list' || Yii::$app->controller->id == 'order-item' ? 'active' : '' ?>">
                <a href="<?= Url::toRoute(['order-list/index']) ?>">
                    <i class="fa fa-shopping-cart"></i> <span><?= Yii::t('common', 'Order List') ?></span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-red"><?= $nAOrderList ?></small>
                      <small class="label pull-right bg-yellow"><?= $aOrderList ?></small>
                        <small class="label pull-right bg-green"><?= $bOrderList ?></small>
                    </span>
                </a>
            </li>
            <li class="treeview <?= Yii::$app->controller->id == 'blog-category' || Yii::$app->controller->id == 'blog-item' ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-cubes"></i>
                    <span><?= Yii::t('common', 'Blog') ?></span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= Yii::$app->controller->id != 'blog-category' ?: 'active' ?>">
                        <a href="<?= Url::toRoute(['blog-category/index']) ?>"><i class="fa fa-th"></i>
                            <span><?= Yii::t('common', 'Category') ?></span>
                            <span class="pull-right-container">
                              <span class="label label-success pull-right"><?= $aBlogCategory ?></span><span class="label label-danger pull-right"><?= $nABlogCategory ?></span>
                            </span>
                        </a>
                    </li>
                    <li class="<?= Yii::$app->controller->id != 'blog-item' ?: 'active' ?>">
                        <a href="<?= Url::toRoute(['blog-item/index']) ?>"><i class="fa fa-th-large"></i>
                            <span><?= Yii::t('common', 'Item') ?></span>
                            <span class="pull-right-container">
                              <span class="label label-success pull-right"><?= $aBlogItem ?></span><span class="label label-danger pull-right"><?= $nABlogItem ?></span>
                            </span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview <?= Yii::$app->controller->id == 'user' || Yii::$app->controller->id == 'user-address' ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-cubes"></i>
                    <span><?= Yii::t('common', 'User') ?></span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= Yii::$app->controller->id != 'user' ?: 'active' ?>">
                        <a href="<?= Url::toRoute(['user/index']) ?>"><i class="fa fa-th"></i>
                            <span><?= Yii::t('common', 'User') ?></span>
                            <span class="pull-right-container">
                              <span class="label label-success pull-right"><?= $aUser ?></span><span class="label label-danger pull-right"><?= $nAUser ?></span>
                            </span>
                        </a>
                    </li>
                    <li class="<?= Yii::$app->controller->id != 'user-address' ?: 'active' ?>">
                        <a href="<?= Url::toRoute(['user-address/index']) ?>"><i class="fa fa-th-large"></i>
                            <span><?= Yii::t('common', 'Address') ?></span>
                            <span class="pull-right-container">
                              <span class="label label-info pull-right"><?= $aUserAddress ?>
                            </span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview <?= Yii::$app->controller->id == 'cake-product-item-highlight' || Yii::$app->controller->id == 'cake-intro-text' || Yii::$app->controller->id == 'cake-what-we-can' || Yii::$app->controller->id == 'cake-our-team' ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-cubes"></i>
                    <span><?= Yii::t('common', 'Cake') ?></span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= Yii::$app->controller->id != 'cake-product-item-highlight' ?: 'active' ?>">
                        <a href="<?= Url::toRoute(['cake-product-item-highlight/index']) ?>"><i class="fa fa-th"></i>
                            <span><?= Yii::t('common', 'PI Hightlight') ?></span>
                        </a>
                    </li>
                    <li class="<?= Yii::$app->controller->id != 'cake-intro-text' ?: 'active' ?>">
                        <a href="<?= Url::toRoute(['cake-intro-text/index']) ?>"><i class="fa fa-th-large"></i>
                            <span><?= Yii::t('common', 'Intro Text') ?></span>
                        </a>
                    </li>
                    <li class="<?= Yii::$app->controller->id != 'cake-what-we-can' ?: 'active' ?>">
                        <a href="<?= Url::toRoute(['cake-what-we-can/index']) ?>"><i class="fa fa-th-large"></i>
                            <span><?= Yii::t('common', 'What We Can') ?></span>
                        </a>
                    </li>
                    <li class="<?= Yii::$app->controller->id != 'cake-our-team' ?: 'active' ?>">
                        <a href="<?= Url::toRoute(['cake-our-team/index']) ?>"><i class="fa fa-th-large"></i>
                            <span><?= Yii::t('common', 'Our Team') ?></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="<?= Yii::$app->controller->id == 'gallery' ? 'active' : '' ?>">
                <a href="<?= Url::toRoute(['gallery/index']) ?>">
                    <i class="fa fa-shopping-cart"></i> <span><?= Yii::t('common', 'Gallery') ?></span>
                    <span class="pull-right-container">
                        <span class="label label-success pull-right"><?= $aGallery ?></span><span class="label label-danger pull-right"><?= $nAGallery ?></span>
                    </span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
