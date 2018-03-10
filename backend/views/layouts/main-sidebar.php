<?php

use yii\helpers\Url;
use common\models\ProductBrand;
use common\models\ProductCategory;
use common\models\ProductItem;

$nAProductBrand = ProductBrand::find()->where(['status' => 0])->count('status');
$aProductBrand = ProductBrand::find()->where(['status' => 1])->count('status');
$nAProductCategory = ProductCategory::find()->where(['status' => 0])->count('status');
$aProductCategory = ProductCategory::find()->where(['status' => 1])->count('status');
$nAProductItem = ProductItem::find()->where(['status' => 0])->count('status');
$aProductItem = ProductItem::find()->where(['status' => 1])->count('status');

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
            <li class="treeview <?= Yii::$app->controller->id == 'product-brand' || Yii::$app->controller->id == 'product-category' || Yii::$app->controller->id == 'product-item' ? 'active' : '' ?>">
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
                </ul>
            </li>
            <li>
                <a href="../widgets.html">
                    <i class="fa fa-th"></i> <span>Widgets</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Charts</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                    <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
                    <li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
                    <li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>UI Elements</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
                    <li><a href="../UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
                    <li><a href="../UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
                    <li><a href="../UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
                    <li><a href="../UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
                    <li><a href="../UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Forms</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
                    <li><a href="../forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
                    <li><a href="../forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Tables</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                    <li><a href="../tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
                </ul>
            </li>
            <li>
                <a href="../calendar.html">
                    <i class="fa fa-calendar"></i> <span>Calendar</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
                </a>
            </li>
            <li>
                <a href="../mailbox/mailbox.html">
                    <i class="fa fa-envelope"></i> <span>Mailbox</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Examples</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                    <li><a href="../examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
                    <li><a href="../examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                    <li><a href="../examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                    <li><a href="../examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                    <li><a href="../examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                    <li><a href="../examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                    <li><a href="../examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
                    <li><a href="../examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Multilevel</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-circle-o"></i> Level One
                            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-circle-o"></i> Level Two
                                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                </ul>
            </li>
            <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
