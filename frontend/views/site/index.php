<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use common\models\CakeIntroText;
use common\models\ProductItem;
use common\models\BlogItem;
use common\models\CakeWhatWeCan;
use common\models\ProductPackage;
use common\models\CakeOurTeam;

$this->title = Yii::t('common', 'Home');

$cakeIntroText = CakeIntroText::find()->all();
$indexProductItem = ProductItem::find()->orderBy('created_at DESC')->limit(6)->all();
$indexBlogItem = BlogItem::find()->orderBy('created_at DESC')->limit(6)->all();
$cakeWhatWeCan = CakeWhatWeCan::find()->all();
$indexProductPackage = ProductPackage::find()->orderBy('created_at DESC')->limit(3)->all();
$cakeOurTeam = CakeOurTeam::find()->all();
?>

<!-- Start About Cake -->
<section class="about-cake">
    <div class="container">
        <!-- About Content -->
        <h2 class="hide">
            &nbsp;
        </h2>
        <div class="about-content">
            <img alt="Cake-White" src="<?= Url::to('@web/cake/images/cake-white.png') ?>">
            <?= $cakeIntroText[0]->description ?>
        </div>
    </div>
</section>
<!-- End About Cake --><!-- Start Product Cake -->
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
                <?php foreach ($indexProductItem as $key => $iPI): ?>
                    <?php if ($key % 2 == 0): ?>
                        <!-- Column -->
                        <div class="col-sm-4">
                            <div class="wrap-product">
                                <div class="top-product red-cake">
                                    <!--h1 class="normal-heading">
                                        Rp <?= number_format($iPI->price, 0, '.', ',') ?>
                                    </h1-->
                                    <p class="mar-top-10 mar-btm-0">
                                        Rp <?= number_format($iPI->price, 0, '.', ',') ?>
                                    </p>
                                    <span><?= $iPI->name ?></span>
                                </div>
                                <div class="bottom-product bottom-red">
                                    <div class="bottom-product-abs pink-dot">
                                        <div class="button-cake">
                                            <div class="blue-button-cake">
                                                <button class="button-d-cake pink-button-cake"><?= Yii::t('common', 'Buy') ?></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrap-bottom-cake">
                                        <?= Yii::$app->myLibrary->getFirstParagraph($iPI->description, true) ?>
                                        <div class="red-line"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php elseif ($key % 2 == 1): ?>
                        <!-- Column -->
                        <div class="col-sm-4">
                            <div class="wrap-product">
                                <div class="top-product blue-cake">
                                    <!--h1 class="normal-heading">
                                        Rp <?= number_format($iPI->price, 0, '.', ',') ?>
                                    </h1-->
                                    <p class="mar-top-10 mar-btm-0">
                                        Rp <?= number_format($iPI->price, 0, '.', ',') ?>
                                    </p>
                                    <span><?= $iPI->name ?></span>
                                </div>
                                <div class="bottom-product bottom-blue">
                                    <div class="bottom-product-abs blue-dot">
                                        <div class="button-cake">
                                            <div class="blue-button-cake">
                                                <button class="button-d-cake blue-button-cake"><?= Yii::t('common', 'Buy') ?></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrap-bottom-cake">
                                        <?= Yii::$app->myLibrary->getFirstParagraph($iPI->description, true) ?>
                                        <div class="blue-line"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <!-- Column -->
                        <div class="col-sm-4">
                            <div class="wrap-product">
                                <div class="top-product orange-cake">
                                    <!--h1 class="normal-heading">
                                        Rp <?= number_format($iPI->price, 0, '.', ',') ?>
                                    </h1-->
                                    <p class="mar-top-10 mar-btm-0">
                                        Rp <?= number_format($iPI->price, 0, '.', ',') ?>
                                    </p>
                                    <span><?= $iPI->name ?></span>
                                </div>
                                <div class="bottom-product bottom-orange">
                                    <div class="bottom-product-abs orange-dot">
                                        <div class="button-cake">
                                            <div class="orange-button-cake">
                                                <button class="button-d-cake orange-button-cake"><?= Yii::t('common', 'Buy') ?></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrap-bottom-cake">
                                        <?= Yii::$app->myLibrary->getFirstParagraph($iPI->description, true) ?>
                                        <div class="orange-line"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
                <!-- Column Tittle -->
                <div class="col-sm-12 text-content text-center">
                    <!--p class="text-content text-center">
                        Toffee sugar plum halvah liquorice <b class="purple-color">brownie gummies</b>&nbsp;chocolate
                        bar muffin candy canes.Dessert jelly-o tootsie roll jelly sesame snaps icing.
                    </p-->
                    <?= $cakeIntroText[1]->description ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Product Cake --><!-- Start Option Cake -->
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
            <!-- Column -->
            <div class="col-sm-4">
                <div class="messes">
                    <div class="messes-show"></div>
                    <div class="round-wrap green-option"></div>
                </div>
                <h4 class="green-color">
                    Make Cake
                </h4>
                <div class="line-temp line-green-sm">
                    &nbsp;
                </div>
                <p class="text-center mar-top-10">
                    Cookie apple pie donut gingerbread sweet roll pudding topping marshmallow.
                </p>
            </div>
            <!-- Column -->
            <div class="col-sm-4">
                <div class="messes">
                    <div class="messes-show"></div>
                    <div class="round-wrap orange-option"></div>
                </div>
                <h4 class="orange-color">
                    Make Cake
                </h4>
                <div class="line-temp line-orange-sm">
                    &nbsp;
                </div>
                <p class="text-center mar-top-10">
                    Cookie apple pie donut gingerbread sweet roll pudding topping marshmallow.
                </p>
            </div>
            <!-- Column -->
            <div class="col-sm-4">
                <div class="messes">
                    <div class="messes-show"></div>
                    <div class="round-wrap blue-option"></div>
                </div>
                <h4 class="blue-color">
                    Make Cake
                </h4>
                <div class="line-temp line-blue-sm">
                    &nbsp;
                </div>
                <p class="text-center mar-top-10">
                    Cookie apple pie donut gingerbread sweet roll pudding topping marshmallow.
                </p>
            </div>
            <!-- Column -->
            <div class="col-sm-4">
                <div class="messes">
                    <div class="messes-show"></div>
                    <div class="round-wrap pink-option"></div>
                </div>
                <h4 class="pink-color">
                    Make Cake
                </h4>
                <div class="line-temp line-pink-sm">
                    &nbsp;
                </div>
                <p class="text-center mar-top-10">
                    Cookie apple pie donut gingerbread sweet roll pudding topping marshmallow.
                </p>
            </div>
            <!-- Column -->
            <div class="col-sm-4">
                <div class="messes">
                    <div class="messes-show"></div>
                    <div class="round-wrap purple-option"></div>
                </div>
                <h4 class="purple-color">
                    Make Cake
                </h4>
                <div class="line-temp line-purple-sm">
                    &nbsp;
                </div>
                <p class="text-center mar-top-10">
                    Cookie apple pie donut gingerbread sweet roll pudding topping marshmallow.
                </p>
            </div>
            <!-- Column -->
            <div class="col-sm-4">
                <div class="messes">
                    <div class="messes-show"></div>
                    <div class="round-wrap dpurple-option"></div>
                </div>
                <h4 class="dpurple-color">
                    Make Cake
                </h4>
                <div class="line-temp line-dpurple-sm">
                    &nbsp;
                </div>
                <p class="text-center mar-top-10">
                    Cookie apple pie donut gingerbread sweet roll pudding topping marshmallow.
                </p>
            </div>
        </div>
    </div>
</section>
<!-- End Option Cake --><!-- Start Pricing Cake -->
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
                    Our Price
                </h2>
            </div>
        </div>
        <div class="container mar-top-20">
            <!-- Column -->
            <div class="col-sm-3 mar-btm-20">
                <div class="img-wrap-price">
                    <img alt="Price-Purple" class="img-full-sm"
                         src="<?= Url::to('@web/cake/images/price-purple.png') ?>">
                </div>
                <div class="content-price content-price-tag text-center">
                    <h4 class="dpurple-color">
                        $ 100/<span>Package</span>
                    </h4>
                    <div class="price-purple">
                        <div class="triangle-no-animate">
                            &nbsp;
                        </div>
                        <div class="text-price">
                            Just Cupcakes + Free Order
                        </div>
                        <ul class="text-left list-price pad-top-0i">
                            <li class="purple-line">
                                - 10 Cupcakes
                            </li>
                            <li class="purple-line">
                                - Free 1 Cupcakes
                            </li>
                            <li class="purple-line">
                                - Free Order
                            </li>
                        </ul>
                        <div class="price-btn price-purple-btn">
                            Order
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-sm-3 mar-btm-20">
                <div class="img-wrap-price">
                    <img alt="Price-Pink" class="img-full-sm" src="<?= Url::to('@web/cake/images/price-pink.png') ?>">
                </div>
                <div class="content-price content-price-tag text-center">
                    <h4 class="pink-color">
                        $ 200/<span>Package</span>
                    </h4>
                    <div class="price-pink">
                        <div class="triangle-no-animate">
                            &nbsp;
                        </div>
                        <div class="text-price">
                            Cupcakes + Ice Cream + Free Order
                        </div>
                        <ul class="text-left list-price pad-top-0i">
                            <li class="pink-line">
                                - 20 Cupcakes + 5 Ice Cream
                            </li>
                            <li class="pink-line">
                                - Free 5 Cupcakes
                            </li>
                            <li class="pink-line">
                                - Free Order
                            </li>
                        </ul>
                        <div class="price-btn price-pink-btn">
                            Order
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-sm-3 mar-btm-20">
                <div class="img-wrap-price">
                    <img alt="Price-Green" class="img-full-sm" src="<?= Url::to('@web/cake/images/price-green.png') ?>">
                </div>
                <div class="content-price content-price-tag text-center">
                    <h4 class="green-color">
                        $ 300/<span>Package</span>
                    </h4>
                    <div class="price-green">
                        <div class="triangle-no-animate">
                            &nbsp;
                        </div>
                        <div class="text-price">
                            Cupcakes + Ice Cream + Cookies
                        </div>
                        <ul class="text-left list-price pad-top-0i">
                            <li class="green-line">
                                - 25 Cupcakes + 5 Ice Cream
                            </li>
                            <li class="green-line">
                                - Free 5 Cupcakes
                            </li>
                            <li class="green-line">
                                - 2 Cookies Free Order
                            </li>
                        </ul>
                        <div class="price-btn price-green-btn">
                            Order
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-sm-3 mar-btm-20">
                <div class="img-wrap-price">
                    <img alt="Price-Blue" class="img-full-sm" src="<?= Url::to('@web/cake/images/price-blue.png') ?>">
                </div>
                <div class="content-price content-price-tag text-center">
                    <h4 class="blue-color">
                        $ 400/<span>Package</span>
                    </h4>
                    <div class="price-blue">
                        <div class="triangle-no-animate">
                            &nbsp;
                        </div>
                        <div class="text-price">
                            Special Cupcakes + Ice Cream + Cookies
                        </div>
                        <ul class="text-left list-price pad-top-0i">
                            <li class="blue-line">
                                - 30 Special Cupcakes
                            </li>
                            <li class="blue-line">
                                - Free 10 Cupcakes
                            </li>
                            <li class="blue-line">
                                - 10 Ice Cream
                            </li>
                        </ul>
                        <div class="price-btn price-blue-btn">
                            Order
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="triangle-top-no-animate">
        &nbsp;
    </div>
</section>
<!-- End Pricing Cake --><!-- Start Team Cake -->
<section class="abouts-cake">
    <div class="tittle-cake text-center">
        <div class="container">
            <img alt="Cake-Pink" src="<?= Url::to('@web/cake/images/cake-pink.png') ?>">
            <h2 class="pink-color">
                Our Team
            </h2>
        </div>
    </div>
    <div class="container mar-top-20">
        <!-- Column -->
        <div class="col-sm-4">
            <div class="img-round-about">
                <img alt="About Team" class="img-100" src="<?= Url::to('@web/cake/images/about-1.png') ?>">
            </div>
            <h4>
                Katy Candy
            </h4>
            <div class="line-pink-about">
                &nbsp;
            </div>
            <p class="text-center">
                Cookie apple pie donut gingerbread <br>sweet roll pudding topping <br>marshmallow.
            </p>
        </div>
        <!-- Column -->
        <div class="col-sm-4">
            <div class="img-round-about">
                <img alt="About Team" class="img-100" src="<?= Url::to('@web/cake/images/about-2.png') ?>">
            </div>
            <h4>
                Will Candy
            </h4>
            <div class="line-pink-about">
                &nbsp;
            </div>
            <p class="text-center">
                Cookie apple pie donut gingerbread <br>sweet roll pudding topping <br>marshmallow.
            </p>
        </div>
        <!-- Column -->
        <div class="col-sm-4">
            <div class="img-round-about">
                <img alt="About Team" class="img-100" src="<?= Url::to('@web/cake/images/about-3.png') ?>">
            </div>
            <h4>
                Pink Candy
            </h4>
            <div class="line-pink-about">
                &nbsp;
            </div>
            <p class="text-center">
                Cookie apple pie donut gingerbread <br>sweet roll pudding topping <br>marshmallow.
            </p>
        </div>
    </div>
</section>
<!-- End Option Cake -->
