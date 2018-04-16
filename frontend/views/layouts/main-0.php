<?php

/* @var $this \yii\web\View */

/* @var $content string */

use frontend\assets\CakeAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

use common\models\Bank;

CakeAsset::register($this);

$cartCount = Yii::$app->cart->getCount();
$bank = Bank::find()->all();
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
                <header class="wrap-header green-top-dot">
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
                                            <img alt="Logo-Cupcakes" src="<?= Url::to('@web/cake/images/logo-100.png') ?>">
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
                                                <a href="<?= Url::toRoute(['site/order-list']) ?>"><?= Yii::$app->user->identity->username ?> <i class="glyphicon glyphicon-user"></i></a>
                                            </li>
                                        <?php endif; ?>
                                        <li>
                                            <a href="<?= Url::toRoute(['cart/index']) ?>"><?= $cartCount ?> <i class="glyphicon glyphicon-shopping-cart"></i></a>
                                        </li>
                                    </ul>
                                </nav>
                                <!-- Start Mega Menu Cake -->
                                <div class="mega-menu hide">
                                    <div class="tittle-mega">
                                        <h4>
                                            <?= Yii::t('common', 'Menu') ?>
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
                                                            <a href="<?= Url::toRoute(['site/order-list']) ?>"><?= Yii::$app->user->identity->username ?> <i class="glyphicon glyphicon-user"></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <li>
                                                        <a href="<?= Url::toRoute(['cart/index']) ?>"><?= $cartCount ?> <i class="glyphicon glyphicon-shopping-cart"></i></a>
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
                    <div class="tittle-sub-top pad-top-150">
                        <div class="container">
                            <?= Breadcrumbs::widget([
                                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                'homeLink' => [
                                    'label' => Yii::t('common', 'Home'),
                                    'url' => Yii::$app->homeUrl,
                                    'encode' => false,
                                    'style' => 'color: #fff;'
                                ],
                                'activeItemTemplate' => '&nbsp;/&nbsp;<h1>{link}</h1>',
                                'itemTemplate' => '<h2>{link}</h2>',
                                'options' => [
                                    'class' => '',
                                ],
                                'tag' => 'div'
                            ]) ?>
                        </div>
                    </div>
                </header>
                <div class="green-arrow">
                    &nbsp;
                </div>
            </section>
            <!-- End Header Cake -->

            <div class="purple-arrow" style="margin-bottom: 15px;">
                &nbsp;
            </div>
            <?= $content ?>

            <!-- Start Footer Cake -->
            <footer style="margin-top: 64px;">
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
                            <p class="mar-btm-20">
                                Cookie apple pie donut gingerbread <br>sweet roll pudding topping <br>marshmallow.<br>
                            </p>
                        </div>
                        <!-- Column -->
                        <div class="col-sm-4 hidden-xs">
                            <ul class="list-picture-footer">
                                <?php foreach ($bank as $b): ?>
                                    <li>
                                        <a class="fancybox" data-fancybox-group="contentgallery"
                                           href="<?= Yii::$app->myLibrary->getBankImage($b->image) ?>"><img
                                                    alt="<?= $b->name ?>" class="img-100"
                                                    src="<?= Yii::$app->myLibrary->getBankImage($b->image) ?>"></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <div class="clearfix"></div>
                            <p>
                                Cookie apple pie donut gingerbread <br>sweet roll pudding topping
                            </p>
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