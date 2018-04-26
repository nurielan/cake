<?php

/* @var $this \yii\web\View */

/* @var $content string */

use frontend\assets\CakeAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\CakeProductItemHighlight;

CakeAsset::register($this);

$this->title = $title;
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html class="no-js" lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="Cake & Bread" name="description">
        <meta content="Cake & Bread" name="author">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="demo-1">
    <?php $this->beginBody() ?>
    <div class="ip-container" id="ip-container">
        <!--initial header-->
        <header class="ip-header">
            <div class="ip-loader">
                <svg class="ip-inner" height="60px" viewbox="0 0 80 80" width="60px">
                    <path class="ip-loader-circlebg"
                          d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"></path>
                    <path class="ip-loader-circle"
                          d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"
                          id="ip-loader-circle"></path>
                </svg>
            </div>
        </header>
        <!--main content-->
        <div class="ip-main">
            <div class="top-highlight hide">
                &nbsp;
            </div>
            <!-- Start Header Cake -->
            <section class="header-wrapper">
                <header class="wrap-header">
                    <div class="top-absolute">
                        <div class="top-header">
                            <div class="container">
                                <div class="navbar-header visible-xs">
                                    <button class="navbar-toggle toggle-cake show-menu"><span class="sr-only">Toggle Navigation</span><span
                                                class="icon-bar"></span><span class="icon-bar"></span><span
                                                class="icon-bar"></span></button>
                                    <a class="navbar-brand navbar-cake" href="#"><img alt="Logo-Cupcakes"
                                                                                      src="<?= Url::to('@web/cake/images/logo-100.png') ?>"></a>
                                </div>
                                <nav>
                                    <ul class="header-nav hidden-xs">
                                        <li class="pad-top-0i">
                                            <img alt="Logo-Cupcakes"
                                                 src="<?= Url::to('@web/cake/images/logo-100.png') ?>">
                                        </li>
                                        <li>
                                            <a href="<?= Url::toRoute(['site/index']) ?>"><?= Yii::t('common', 'Home') ?></a>
                                        </li>
                                        <li>
                                            <a href="<?= Url::toRoute(['product/index']) ?>"><?= Yii::t('common', 'Product') ?></a>
                                        </li>
                                        <li>
                                            <a href="<?= Url::toRoute(['product-custom/index']) ?>"><?= Yii::t('common', 'Product Custom') ?></a>
                                        </li>
                                        <li>
                                            <a href="<?= Url::toRoute(['gallery/index']) ?>"><?= Yii::t('common', 'Gallery') ?></a>
                                        </li>
                                        <!--li>
                                        <a href="<?= Url::toRoute(['blog/index']) ?>"><?= Yii::t('common', 'Blog') ?></a>
                                    </li-->
                                        <?php if (Yii::$app->user->isGuest): ?>
                                            <li>
                                                <a href="<?= Url::toRoute(['site/login']) ?>"><?= Yii::t('common', 'Login') ?></a>
                                            </li>
                                        <?php else: ?>
                                            <li>
                                                <a href="<?= Url::toRoute(['site/order-list']) ?>"><?= Yii::$app->user->identity->username ?>
                                                    <i class="glyphicon glyphicon-user"></i></a>
                                            </li>
                                        <?php endif; ?>
                                        <li>
                                            <a href="<?= Url::toRoute(['cart/index']) ?>"><?= $cartCount ?> <i
                                                        class="glyphicon glyphicon-shopping-cart"></i></a>
                                        </li>
                                    </ul>
                                </nav>
                                <!-- Start Mega Menu Cake -->
                                <div class="mega-menu hide">
                                    <div class="tittle-mega">
                                        <h4>
                                            - <?= Yii::$app->name ?> -
                                        </h4>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <ul class="list-mega">
                                                    <li class="bottom-red-border">
                                                        <?= Yii::$app->name ?>
                                                    </li>
                                                    <li>
                                                        <a href="<?= Url::toRoute(['site/index']) ?>"><?= Yii::t('common', 'Home') ?></a>
                                                    </li>
                                                    <li>
                                                        <a href="<?= Url::toRoute(['product/index']) ?>"><?= Yii::t('common', 'Product') ?></a>
                                                    </li>
                                                    <li>
                                                        <a href="<?= Url::toRoute(['product-custom/index']) ?>"><?= Yii::t('common', 'Product Custom') ?></a>
                                                    </li>
                                                    <li>
                                                        <a href="<?= Url::toRoute(['gallery/index']) ?>"><?= Yii::t('common', 'Gallery') ?></a>
                                                    </li>
                                                    <!--li>
                                        <a href="<?= Url::toRoute(['blog/index']) ?>"><?= Yii::t('common', 'Blog') ?></a>
                                    </li-->
                                                    <?php if (Yii::$app->user->isGuest): ?>
                                                        <li>
                                                            <a href="<?= Url::toRoute(['site/login']) ?>"><?= Yii::t('common', 'Login') ?></a>
                                                        </li>
                                                    <?php else: ?>
                                                        <li>
                                                            <a href="<?= Url::toRoute(['site/order-list']) ?>"><?= Yii::$app->user->identity->username ?>
                                                                <i class="glyphicon glyphicon-user"></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <li>
                                                        <a href="<?= Url::toRoute(['cart/index']) ?>"><?= $cartCount ?>
                                                            <i class="glyphicon glyphicon-shopping-cart"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="div text-center">
                                            <button class="btn btn-pink-cake mar-top-20 close-menu"><?= Yii::t('common', 'Close') ?></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Mega Menu Cake -->
                            </div>
                        </div>
                        <div class="triangle">
                            &nbsp;
                        </div>
                    </div>
                    <div class="tittle-cake text-center pad-top-150">
                        <div class="container">
                            <h2>
                                Beautiful
                            </h2>
                            <h1>
                                <?= Yii::$app->name ?>
                            </h1>
                        </div>
                    </div>
                    <div class="slider-cake">
                        <div class="container pad-md-100">
                            <div class="center">
                                <?php foreach ($productItemHighlight as $pIH): ?>
                                    <div>
                                        <img alt="<?= $pIH->productItem->name ?>"
                                             src="<?= Yii::$app->myLibrary->getProductItemImage($pIH->productItem->image1) ?>"
                                             width="324" height="324">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="green-table mar-to-top">
                        &nbsp;
                    </div>
                    <div class="green-arrow">
                        &nbsp;
                    </div>
                </header>
            </section>
            <!-- End Header Cake --><!-- Start Product Cake -->
            <?php if ($productItemHighlight): ?>
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
                                <?php foreach ($productItem as $pI): ?>
                                    <!-- Column -->
                                    <div class="col-md-4">
                                        <?= Html::beginForm(['cart/put']) ?>
                                        <div class="wrap-product">
                                            <div>
                                                <a href="<?= Url::to(['product/detail', 'alias' => $pI->alias]) ?>">
                                                    <img class="img-rounded"
                                                         src="<?= Yii::$app->myLibrary->getProductItemImage($pI->image1) ?>"
                                                         width="100%">
                                                </a>
                                            </div>
                                            <div align="center">
                                                <p style="font-size: 30px; font-weight: bold;">
                                                    Rp <?= number_format($pI->price, 0, '.', ',') ?>
                                                </p>
                                                <p style="font-size: 15px; font-weight: bold;"><?= $pI->name ?></p>
                                            </div>
                                            <div class="bottom-product bottom-red">
                                                <div class="bottom-product-abs pink-dot">
                                                    <div class="button-cake">
                                                        <div class="blue-button-cake">
                                                            <?= Html::hiddenInput('product_item_no', $pI->no) ?>
                                                            <button class="button-d-cake pink-button-cake"
                                                                    type="submit"><?= Yii::t('common', 'Buy') ?></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wrap-bottom-cake" style="height: 128px; overflow: hidden;">
                                                    <p>
                                                        <?= Yii::$app->myLibrary->getFirstParagraph($pI->description, true) ?>
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
            <?php if ($whatWeCan): ?>
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
                            <?php foreach ($whatWeCan as $wWC): ?>
                                <!-- Column -->
                                <div class="col-sm-4">
                                    <div class="messes">
                                        <div class="messes-show"></div>
                                        <div class="round-wrap dpurple-option"></div>
                                    </div>
                                    <h4 class="dpurple-color">
                                        <?= $wWC->name ?>
                                    </h4>
                                    <div class="line-temp line-dpurple-sm">
                                        &nbsp;
                                    </div>
                                    <p class="text-center mar-top-10">
                                        <?= Yii::$app->myLibrary->getFirstParagraph($wWC->description, true) ?>
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
                                        <img alt="<?= $pPItem->name ?>" class="img-full-sm img-thumbnail"
                                             src="<?= Yii::$app->myLibrary->getProductPackageImage($pPItem->image1) ?>"
                                             width="215" height="215">
                                    </div>
                                    <div class="content-price content-price-tag text-center">
                                        <h4 class="dpurple-color">
                                            Rp. <?= number_format($pPItem->price, 0, '.', ',') ?>
                                            <hr>
                                            <span>Per-<?= Yii::t('common', 'Package') ?></span>
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
                                <a class="btn btn-pink-cake btn-lg"
                                   href="<?= Url::toRoute(['product-custom/index']) ?>"><?= Yii::t('common', 'Click here') ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="triangle-top-no-animate">
                        &nbsp;
                    </div>
                </section>
            <?php endif; ?>
            <!-- End Pricing Cake --><!-- Start Team Cake -->
            <?php if ($ourTeam): ?>
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
                        <?php foreach ($ourTeam as $oT): ?>
                            <!-- Column -->
                            <div class="col-sm-4">
                                <div class="img-round-about">
                                    <img alt="<?= $oT->fullname ?>" class="img-100 img-circle"
                                         src="<?= Yii::$app->myLibrary->getCakeOurTeamImage($oT->image1) ?>">
                                </div>
                                <h4>
                                    <?= $oT->fullname ?>
                                </h4>
                                <div class="line-pink-about">
                                    &nbsp;
                                </div>
                                <p class="text-center">
                                    <?= Yii::$app->myLibrary->getFirstParagraph($oT->description, true) ?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endif; ?>
            <!-- End Option Cake --><!-- Start Footer Cake -->
            <footer>
                <div class="triangle-no-animate">
                    &nbsp;
                </div>
                <div class="container">
                    <div class="abs-logo-footer">
                        <img alt="Logo-Cake" src="<?= Url::to('@web/cake/images/logo.png') ?>">
                    </div>
                    <div class="top-footer">
                        <div class="row">
                            <div class="col-sm-6">
                                <img alt="Logo-White" class="img-cake-center-res mar-btm-20"
                                     src="<?= Url::to('@web/cake/images/logo-white.png') ?>">
                            </div>
                            <div class="col-sm-6 text-right">
                                <ul class="sosmed-cake">
                                    <li>
                                        <div class="center-sosmed">
                                            <p class="icon icon-facebook">
                                                &nbsp;
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="center-sosmed">
                                            <p class="icon icon-twitter">
                                                &nbsp;
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="center-sosmed">
                                            <p class="icon icon-behance">
                                                &nbsp;
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="center-sosmed">
                                            <p class="icon icon-dribbble">
                                                &nbsp;
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="center-sosmed">
                                            <p class="icon icon-pinterest">
                                                &nbsp;
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="line-top-white mar-btm-20 mar-top-20">
                        &nbsp;
                    </div>
                    <div class="content-about-footer">
                        <!-- Column -->
                        <div class="col-sm-4">
                            <h4>
                                <?= Yii::$app->name ?>
                            </h4>
                            <!--p class="mar-btm-20">
                                Cookie apple pie donut gingerbread <br>sweet roll pudding topping <br>marshmallow.<br>
                            </p-->
                        </div>
                        <!-- Column -->
                        <div class="col-sm-4 hidden-xs">
                            <ul class="list-picture-footer">
                                <?php for ($i = 1; $i <= 8; $i++): ?>
                                    <li>
                                        <a class="fancybox" data-fancybox-group="contentgallery"
                                           href="<?= Url::to('@web/cake/images/tag-' . $i . '.jpg') ?>"><img
                                                    alt="Img-sm-picture" class="img-100"
                                                    src="<?= Url::to('@web/cake/images/tag-' . $i . '.jpg') ?>"></a>
                                    </li>
                                <?php endfor; ?>
                            </ul>
                            <div class="clear"></div>
                            <!--p>
                                Cookie apple pie donut gingerbread <br>sweet roll pudding topping
                            </p-->
                        </div>
                        <!-- Column -->
                        <div class="col-sm-4">
                            <ul class="list-link-home">
                                <li>
                                    <a href="<?= Url::toRoute(['site/index']) ?>"><?= Yii::t('common', 'Home') ?></a>
                                </li>
                                <li>
                                    <a href="<?= Url::toRoute(['product/index']) ?>"><?= Yii::t('common', 'Product') ?></a>
                                </li>
                                <li>
                                    <a href="<?= Url::toRoute(['gallery/index']) ?>"><?= Yii::t('common', 'Gallery') ?></a>
                                </li>
                                <?php if (Yii::$app->user->isGuest): ?>
                                    <li>
                                        <a href="<?= Url::toRoute(['site/login']) ?>"><?= Yii::t('common', 'Login') ?></a>
                                    </li>
                                <?php else: ?>
                                    <li>
                                        <a href="<?= Url::toRoute(['site/order-list']) ?>"><?= Yii::$app->user->identity->username ?>
                                            <i class="glyphicon glyphicon-user"></i></a>
                                    </li>
                                <?php endif; ?>
                                <li>
                                    <a href="<?= Url::toRoute(['cart/index']) ?>"><?= $cartCount ?> <i
                                                class="glyphicon glyphicon-shopping-cart"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End Option Cake -->
        </div>
    </div>
    <script type="text/javascript">
        baseUrl = '<?= Yii::$app->request->baseUrl ?>';
    </script>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>