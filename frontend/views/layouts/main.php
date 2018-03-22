<?php

/* @var $this \yii\web\View */

/* @var $content string */

use frontend\assets\CakeAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\CakeProductItemHighlight;

CakeAsset::register($this);

$cakeProductItemHighlight = CakeProductItemHighlight::find()->all();
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
                                    <li>
                                        <a href="<?= Url::toRoute(['site/index']) ?>"><?= Yii::t('common', 'Home') ?></a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::toRoute(['product/index']) ?>"><?= Yii::t('common', 'Product') ?></a>
                                    </li>
                                    <li class="pad-top-0i">
                                        <img alt="Logo-Cupcakes" src="<?= Url::to('@web/cake/images/logo-100.png') ?>">
                                    </li>
                                    <li>
                                        <a href="<?= Url::toRoute(['gallery/index']) ?>"><?= Yii::t('common', 'Gallery') ?></a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::toRoute(['blog/index']) ?>"><?= Yii::t('common', 'Blog') ?></a>
                                    </li>
                                </ul>
                            </nav>
                            <!-- Start Mega Menu Cake -->
                            <div class="mega-menu hide">
                                <div class="tittle-mega">
                                    <h4>
                                        - Mega Menu -
                                    </h4>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <ul class="list-mega">
                                                <li class="bottom-red-border">
                                                    Blog
                                                </li>
                                                <li>
                                                    <a href="blog.html">Blog Left Content</a>
                                                </li>
                                                <li>
                                                    <a href="blog-right-content.html">Blog Right Content</a>
                                                </li>
                                                <li>
                                                    <a href="blog-center.html">Blog Center</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-4">
                                            <ul class="list-mega">
                                                <li class="bottom-red-border">
                                                    Gallery
                                                </li>
                                                <li>
                                                    <a href="gallery.html">Gallery 3 Column</a>
                                                </li>
                                                <li>
                                                    <a href="gallery-4-column.html">Gallery 4 Column</a>
                                                </li>
                                                <li>
                                                    <a href="gallery-dot.html">Gallery With Text</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-4">
                                            <ul class="list-mega">
                                                <li class="bottom-red-border">
                                                    OTHER PAGEs
                                                </li>
                                                <li>
                                                    <a href="chart-page.html">Chart Page</a>
                                                </li>
                                                <li>
                                                    <a href="product-details-page.html">Product Details</a>
                                                </li>
                                                <li>
                                                    <a href="privacy-policy.html">Privacy Policy</a>
                                                </li>
                                                <li>
                                                    <a href="terms-of-use.html">Terms Of Use</a>
                                                </li>
                                                <li>
                                                    <a href="404.html">404</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="div text-center">
                                        <button class="btn btn-pink-cake mar-top-20 close-menu">Close Themes</button>
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
                <?php //if (Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index' && $cakeProductItemHighlight): ?>
                <div class="tittle-cake text-center pad-top-150">
                    <div class="container">
                        <h2>
                            Beautiful
                        </h2>
                        <h1>
                            CUPCAKES
                        </h1>
                    </div>
                </div>
                <div class="slider-cake">
                    <div class="container pad-md-100">
                        <div class="center">
                            <?php foreach ($cakeProductItemHighlight as $cPIHItem): ?>
                            <div>
                                <img alt="<?= $cPIHItem->productItem->name ?>" src="<?= Yii::$app->myLibrary->getProductItemImage($cPIHItem->productItem->image1) ?>" width="324" height="324">
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php //endif; ?>
                <div class="green-table mar-to-top">
                    &nbsp;
                </div>
                <div class="green-arrow">
                    &nbsp;
                </div>
            </header>
            <?php
            if (Yii::$app->controller->id == 'product' && Yii::$app->controller->action->id == 'detail') {
                echo $content;
            }
            ?>
        </section>
        <!-- End Header Cake -->

        <?php
        if (Yii::$app->controller->id == 'product' && Yii::$app->controller->action->id != 'detail') {
            echo $content;
        }
        ?>

        <!-- Start Footer Cake -->
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
                            Cake's Dream
                        </h4>
                        <p class="mar-btm-20">
                            Cookie apple pie donut gingerbread <br>sweet roll pudding topping <br>marshmallow.<br>
                        </p>
                    </div>
                    <!-- Column -->
                    <div class="col-sm-4 hidden-xs">
                        <ul class="list-picture-footer">
                            <?php for ($i = 1; $i <= 8; $i++): ?>
                            <li>
                                <a class="fancybox" data-fancybox-group="contentgallery" href="<?= Url::to('@web/cake/images/tag-' . $i . '.jpg') ?>"><img
                                            alt="Img-sm-picture" class="img-100" src="<?= Url::to('@web/cake/images/tag-' . $i . '.jpg') ?>"></a>
                            </li>
                            <?php endfor; ?>
                        </ul>
                        <div class="clear"></div>
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
                                <a href="<?= Url::toRoute(['gallery/index']) ?>"><?= Yii::t('common', 'Gallery') ?></a>
                            </li>
                            <li>
                                <a href="<?= Url::toRoute(['site/privacy-policy']) ?>"><?= Yii::t('common', 'Privacy Policy') ?></a>
                            </li>
                            <li>
                                <a href="<?= Url::toRoute(['site/terms-of-use']) ?>"><?= Yii::t('common', 'Terms of Use') ?></a>
                            </li>
                            <li>
                                <a href="<?= Url::toRoute(['blog/index']) ?>"><?= Yii::t('common', 'Blog') ?></a>
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
