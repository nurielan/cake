<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\OrderList */

$this->title = $model->no;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Order Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= Html::encode($this->title) ?>
        </h1>
        <?= $this->render('@backend/views/layouts/breadcrumb.php') ?>
    </section>

    <div class="pad margin no-print">
        <div class="callout callout-info" style="margin-bottom: 0!important;">
            <h4><i class="fa fa-info"></i> <?= Yii::t('common', 'Note') ?>:</h4>
            <?= Yii::t('common', 'This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.') ?>
        </div>
    </div>

    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-globe"></i> <?= Yii::$app->name ?>, Inc.
                    <small class="pull-right"><?= Yii::t('common', 'Date') ?>: <?= date('d/m/Y', strtotime($model->created_at)) ?></small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                <?= Yii::t('common', 'From') ?>
                <address>
                    <strong><?= Yii::$app->name ?>, Inc.</strong><br>
                    <!--795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>-->
                    Email: no-reply@cakeaway.id
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <?= Yii::t('common', 'To') ?>
                <address>
                    <strong><?= $model->user_username ?></strong><br>
                    <!--795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (555) 539-1037<br>-->
                    Email: <?= $model->user_email ?>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <!--<b>Invoice #007612</b><br>
                <br>-->
                <b><?= Yii::t('common', 'Order') ?> No:</b> <?= $model->no ?><br>
                <!--<b>Payment Due:</b> 2/22/2014<br>-->
                <b><?= Yii::t('common', 'Account') ?>:</b> <?= $model->user_no ?>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped table-condensed">
                    <thead>
                    <tr>
                        <th><?= Yii::t('common', 'Quantity') ?></th>
                        <th><?= Yii::t('common', 'Product') ?></th>
                        <th><?= Yii::t('common', 'Serial') ?> #</th>
                        <th><?= Yii::t('common', 'Description') ?></th>
                        <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($model->orderItem as $key => $item): ?>
                    <tr>
                        <td valign="middle" align="center"><?= $item->quantity ?></td>
                        <td valign="middle"><?= $item->product_item_name ?></td>
                        <td valign="middle" align="center"><?= $item->product_item_no ?></td>
                        <td valign="middle"><?= Yii::$app->myLibrary->limitText($item->product_item_description, 20) ?></td>
                        <td valign="middle" align="right">Rp <?= $item->sub_price ?></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
                <p class="lead"><?= Yii::t('common', 'Payment') ?>:</p>
                <img src="<?= Yii::$app->myLibrary->getBankImage($bank->image) ?>" alt="<?= $bank->name ?>" width="64">

                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                </p>
            </div>
            <!-- /.col -->
            <div class="col-xs-6">
                <p class="lead"><?= Yii::t('common', 'Amount Due') . ' ' . date('d/m/Y', strtotime($model->created_at)) ?></p>

                <div class="table-responsive">
                    <table class="table">
                        <!--<tr>
                            <th style="width:50%">Subtotal:</th>
                            <td>$250.30</td>
                        </tr>-->
                        <tr>
                            <th><?= Yii::t('common', 'Tax') ?></th>
                            <td>Rp. <?= number_format($model->tax_price, 0, ',', '.') ?></td>
                        </tr>
                        <!--<tr>
                            <th>Shipping:</th>
                            <td>$5.80</td>
                        </tr>-->
                        <tr>
                            <th>Total:</th>
                            <td>Rp. <?= number_format($model->price, 0, ',', '.') ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">
                <a href="<?= Url::toRoute(['order-list/print', 'id' => str_replace('/', '-', $model->no)]) ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                <!--<button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
                </button>-->
                <!--<a class="btn btn-primary pull-right" style="margin-right: 5px;" href="<?/*= Url::toRoute(['order-list/generate-pdf', 'no' => str_replace('/', '-', $model->no)]) */?>">
                    <i class="fa fa-download"></i> Generate PDF
                </a>-->
            </div>
        </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
</div>
