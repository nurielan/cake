<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use common\models\CakeIntroText;
use common\models\ProductItem;
use common\models\BlogItem;
use common\models\CakeWhatWeCan;
use common\models\ProductPackage;
use common\models\CakeOurTeam;

$this->title = Yii::t('common', 'Home');

$productItem = ProductItem::find()->orderBy('created_at DESC')->limit(6)->all();
$blogItem = BlogItem::find()->orderBy('created_at DESC')->limit(6)->all();
$cakeWhatWeCan = CakeWhatWeCan::find()->all();
$productPackage = ProductPackage::find()->orderBy('created_at DESC')->limit(4)->all();
$cakeOurTeam = CakeOurTeam::find()->all();
?>

<!-- Start About Cake -->
<section class="about-cake">
    <div class="container">
        <!-- About Content -->
        <h2 class="hide">
            &nbsp;
        </h2>
    </div>
</section>
<!-- End About Cake --><!-- Start Product Cake -->
<?php if ($productItem): ?>
<section class="product-cake">
    <div class="container">
        <!-- Product Tittle -->
        <div class="product-tittle">
            <img alt="Cake-Purple" src="<?= Url::to('@web/cake/images/cake-purple.png') ?>">
            <h2>
                <?= Yii::t('common', 'Product') ?>
            </h2>
        </div>
        <!-- Product Content -->
        <div class="product-content">
            <div class="row">
                <?php foreach ($productItem as $pIItem): ?>
                <!-- Column -->
                <div class="col-md-4">
                    <?= Html::beginForm(['cart/put']) ?>
                    <div class="wrap-product">
                        <div>
                            <a href="<?= Url::to(['product/detail', 'alias' => $pIItem->alias]) ?>">
                                <img class="img-rounded" src="<?= Yii::$app->myLibrary->getProductItemImage($pIItem->image1) ?>" width="100%">
                            </a>
                        </div>
                        <div align="center">
                            <p style="font-size: 30px; font-weight: bold;">
                                Rp <?= number_format($pIItem->price, 0, '.', ',') ?>
                            </p>
                            <p style="font-size: 15px; font-weight: bold;"><?= $pIItem->name ?></p>
                        </div>
                        <div class="bottom-product bottom-red">
                            <div class="bottom-product-abs pink-dot">
                                <div class="button-cake">
                                    <div class="blue-button-cake">
                                        <?= Html::hiddenInput('product_item_no', $pIItem->no) ?>
                                        <button class="button-d-cake pink-button-cake" type="submit"><?= Yii::t('common', 'Buy') ?></button>
                                    </div>
                                </div>
                            </div>
                            <div class="wrap-bottom-cake">
                                <p>
                                    <?= Yii::$app->myLibrary->getFirstParagraph($pIItem->description, true) ?>
                                </p>
                                <div class="red-line"></div>
                            </div>
                        </div>
                    </div>
                    <?= Html::endForm() ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- End Product Cake --><!-- Start Option Cake -->
<?php if ($cakeWhatWeCan): ?>
<section class="option">
    <!-- Tittle Option -->
    <div class="green-table pad-top-10 pad-btm-10">
        <div class="container">
            <div class="tittle-cake text-center">
                <img alt="Cake-White" src="<?= Url::to('@web/cake/images/cake-white.png') ?>">
                <h2>
                    <?= Yii::t('common', 'What We Can') ?>
                </h2>
            </div>
        </div>
    </div>
    <div class="green-arrow"></div>
    <!-- Option Content -->
    <div class="option-content">
        <div class="container">
            <?php foreach ($cakeWhatWeCan as $cWWCItem): ?>
            <!-- Column -->
            <div class="col-sm-4">
                <div class="messes">
                    <div class="messes-show"></div>
                    <div class="round-wrap dpurple-option"></div>
                </div>
                <h4 class="dpurple-color">
                    <?= $cWWCItem->name ?>
                </h4>
                <div class="line-temp line-dpurple-sm">
                    &nbsp;
                </div>
                <p class="text-center mar-top-10">
                    <?= Yii::$app->myLibrary->getFirstParagraph($cWWCItem->description, true) ?>
                </p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- End Option Cake --><!-- Start Pricing Cake -->
<?php if ($productPackage): ?>
<section class="pricing-cake">
    <div class="triangle-no-animate">
        &nbsp;
    </div>
    <!-- Content Pricing Cake -->
    <div class="content-pricing-cake">
        <div class="tittle-cake text-center">
            <div class="container">
                <img alt="Cake-White" src="<?= Url::to('@web/cake/images/cake-white.png') ?>">
                <h2>
                    <?= Yii::t('common', 'Product Packages') ?>
                </h2>
            </div>
        </div>
        <div class="container mar-top-20">
            <?php foreach ($productPackage as $pPItem): ?>
            <!-- Column -->
            <div class="col-sm-3 mar-btm-20">
                <div class="img-wrap-price">
                    <img alt="<?= $pPItem->name ?>" class="img-full-sm img-thumbnail" src="<?= Yii::$app->myLibrary->getProductPackageImage($pPItem->image1) ?>" width="215" height="215">
                </div>
                <div class="content-price content-price-tag text-center">
                    <h4 class="dpurple-color">
                        Rp. <?= number_format($pPItem->price, 0, '.', ',') ?><hr><span>Per-<?= Yii::t('common', 'Package') ?></span>
                    </h4>
                    <div class="price-purple">
                        <div class="triangle-no-animate">
                            &nbsp;
                        </div>
                        <div class="text-price">
                            <?= Yii::$app->myLibrary->getFirstParagraph($pPItem->description) ?>
                        </div>
                        <ul class="text-left list-price pad-top-0i">
                            <?php if ($pPItem->product_item_1): ?>
                            <li class="purple-line">
                                - <?= $pPItem->productItem1->name ?>
                            </li>
                            <?php endif; ?>

                            <?php if ($pPItem->product_item_2): ?>
                                <li class="purple-line">
                                    - <?= $pPItem->productItem2->name ?>
                                </li>
                            <?php endif; ?>

                            <?php if ($pPItem->product_item_3): ?>
                                <li class="purple-line">
                                    - <?= $pPItem->productItem3->name ?>
                                </li>
                            <?php endif; ?>

                            <?php if ($pPItem->product_item_4): ?>
                                <li class="purple-line">
                                    - <?= $pPItem->productItem4->name ?>
                                </li>
                            <?php endif; ?>

                            <?php if ($pPItem->product_item_5): ?>
                                <li class="purple-line">
                                    - <?= $pPItem->productItem5->name ?>
                                </li>
                            <?php endif; ?>

                            <?php if ($pPItem->product_item_6): ?>
                                <li class="purple-line">
                                    - <?= $pPItem->productItem6->name ?>
                                </li>
                            <?php endif; ?>

                            <?php if ($pPItem->product_item_7): ?>
                                <li class="purple-line">
                                    - <?= $pPItem->productItem7->name ?>
                                </li>
                            <?php endif; ?>

                            <?php if ($pPItem->product_item_8): ?>
                                <li class="purple-line">
                                    - <?= $pPItem->productItem8->name ?>
                                </li>
                            <?php endif; ?>

                            <?php if ($pPItem->product_item_9): ?>
                                <li class="purple-line">
                                    - <?= $pPItem->productItem9->name ?>
                                </li>
                            <?php endif; ?>

                            <?php if ($pPItem->product_item_10): ?>
                                <li class="purple-line">
                                    - <?= $pPItem->productItem10->name ?>
                                </li>
                            <?php endif; ?>
                        </ul>
                        <div class="price-btn price-purple-btn">
                            <a href="<?= Url::toRoute(['cart/add']) ?>"><?= Yii::t('common', 'Order') ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="container mar-top-20">
            <div class="col-md-12" style="text-align: center;">
                <h2 style="color: #fff;"><?= Yii::t('common', 'Do you want to request custom cake?') ?></h2>
                <a class="btn btn-pink-cake btn-lg" href="<?= Url::toRoute(['product-custom/index']) ?>"><?= Yii::t('common', 'Click here') ?></a>
            </div>
        </div>
    </div>
    <div class="triangle-top-no-animate">
        &nbsp;
    </div>
</section>
<?php endif; ?>
<!-- End Pricing Cake --><!-- Start Team Cake -->
<?php if ($cakeOurTeam): ?>
<section class="abouts-cake">
    <div class="tittle-cake text-center">
        <div class="container">
            <img alt="Cake-Pink" src="<?= Url::to('@web/cake/images/cake-pink.png') ?>">
            <h2 class="pink-color">
                <?= Yii::t('common', 'Our Team') ?>
            </h2>
        </div>
    </div>
    <div class="container mar-top-20">
        <?php foreach ($cakeOurTeam as $cOTItem): ?>
        <!-- Column -->
        <div class="col-sm-4">
            <div class="img-round-about">
                <img alt="<?= $cOTItem->fullname ?>" class="img-100 img-circle" src="<?= Yii::$app->myLibrary->getCakeOurTeamImage($cOTItem->image1) ?>">
            </div>
            <h4>
                <?= $cOTItem->fullname ?>
            </h4>
            <div class="line-pink-about">
                &nbsp;
            </div>
            <p class="text-center">
                <?= Yii::$app->myLibrary->getFirstParagraph($cOTItem->description, true) ?>
            </p>
        </div>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>
<!-- End Option Cake -->
