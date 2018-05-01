<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = Yii::t('common', 'Dashboard');
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Boxed Layout
            <small>Blank example to the boxed layout</small>
        </h1>
        <?= $this->render('@backend/views/layouts/breadcrumb.php') ?>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="callout callout-info">
            <h4>Tip!</h4>

            <p>Add the layout-boxed class to the body tag to get this layout. The boxed layout is helpful when working
                on
                large screens because it prevents the site from stretching very wide.</p>
        </div>

        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">TOTAL Income</span>
                        <span class="info-box-number"><small>Rp.</small> <?= $oL1 ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-money"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><?= date('M', strtotime(date('Y-m-d'))) ?> Income</span>
                        <span class="info-box-number"><small>Rp.</small> <?= $oL2 ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><?= Yii::t('common', 'Today') ?> Income</span>
                        <span class="info-box-number"><small>Rp.</small> <?= $oL3 ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><?= Yii::t('common', 'Customer') ?></span>
                        <span class="info-box-number"><?= $u ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- TABLE: LATEST ORDERS -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= Yii::t('common', 'Latest Orders') ?></h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <!--<th>Item</th>-->
                                    <th>Status</th>
                                    <!--<th>Popularity</th>-->
                                </tr>
                                </thead>
                                <tbody>
                                <?php if ($orderList): ?>
                                    <?php foreach ($orderList as $key => $item): ?>
                                        <tr>
                                            <td>
                                                <a href="<?= Url::toRoute(['order-list/view', 'id' => $item->no]) ?>"><?= $item->no ?></a>
                                            </td>
                                            <!--<td>Call of Duty IV</td>-->
                                            <td>
                                                <?php
                                                if ($model->status == 0) {
                                                    $status = '<label class="label label-default">' . Yii::t('common', 'Ordered') . '</label>';
                                                } elseif ($model->status == 1) {
                                                    $status = '<label class="label label-warning">' . Yii::t('common', 'Checking Order') . '</label>';
                                                } elseif ($model->status == 2) {
                                                    $status = '<label class="label label-success">' . Yii::t('common', 'Processing Order') . '</label>';
                                                } elseif ($model->status == 3) {
                                                    $status = '<label class="label label-info">' . Yii::t('common', 'Sending Order') . '</label>';
                                                } elseif ($model->status == 4) {
                                                    $status = '<label class="label label-success">' . Yii::t('common', 'Order Sent') . '</label>';
                                                } elseif ($model->status == 10) {
                                                    $status = '<label class="label label-danger">' . Yii::t('common', 'Order Rejected') . '</label>';
                                                }

                                                echo $status;
                                                ?>
                                            </td>
                                            <!--<td>
                                                <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63
                                                </div>
                                            </td>-->
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <!--<a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>-->
                        <a href="<?= Url::toRoute(['order-list/index']) ?>"
                           class="btn btn-sm btn-default btn-flat pull-right"><?= Yii::t('common', 'View All
                            Orders') ?></a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <!-- USERS LIST -->
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= Yii::t('common', 'Latest Members') ?></h3>

                        <div class="box-tools pull-right">
                            <span class="label label-danger">8 <?= Yii::t('common', 'New Members') ?></span>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <?php if ($user): ?>
                            <ul class="users-list clearfix">
                                <?php foreach ($user as $item): ?>
                                    <li>
                                        <img src="<?= Yii::$app->myLibrary->getUserImage($item) ?>"
                                             alt="<?= $item->username ?>">
                                        <a class="users-list-name" href="#"><?= $item->userDetail->fullname ?></a>
                                        <span class="users-list-date"><?= date('d F', strtotime($item->created_at)) ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <!-- /.users-list -->
                        <?php endif; ?>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="<?= Url::toRoute(['user/index']) ?>"
                           class="uppercase"><?= Yii::t('common', 'View All Users') ?></a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!--/.box -->
            </div>
            <!-- /.col -->

            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= Yii::t('common', 'Recently Added Products') ?></h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php if ($productItem): ?>
                            <ul class="products-list product-list-in-box">
                                <?php foreach ($productItem as $item): ?>
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="<?= Yii::$app->myLibrary->getProductItemImage($item->image1) ?>"
                                                 alt="<?= $item->name ?>">
                                        </div>
                                        <div class="product-info">
                                            <a href="<?= Url::toRoute(['product-item/view', 'id' => $item->id]) ?>"
                                               class="product-title"><?= $item->name ?>
                                                <span class="label label-warning pull-right">Rp <?= number_format($item->price) ?></span></a>
                                            <span class="product-description"><?= Yii::$app->myLibrary->limitText($item->description, 20) ?></span>
                                        </div>
                                    </li>
                                    <!-- /.item -->
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="<?= Url::toRoute(['product-item/index']) ?>" class="uppercase"><?= Yii::t('common', 'View All Products') ?></a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
