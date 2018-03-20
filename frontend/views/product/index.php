<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = Yii::t('common', 'Product');

?>

<!-- Start Product Cake -->
<section class="product-cake">
    <div class="container">
        <div class="row">
            <!-- Product Tittle -->
            <div class="product-tittle">
                <img alt="Cake-Purple" src="<?= Url::to('@web/cake/images/cake-purple.png') ?>">
                <h2>
                    <?= Yii::t('common', 'Product') ?>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                qweqweqwe
            </div>
            <!-- Product Content -->
            <div class="product-content col-md-9">
                <div class="row">
                    <?php foreach ($productItem as $productItemItem): ?>
                        <div class="col-md-4">
                            <div class="wrap-product" align="center">
                                <a href="<?= Url::toRoute(['product/detail', 'alias' => $productItemItem->alias]) ?>">
                                    <img src="<?= Yii::$app->myLibrary->getProductItemImage($productItemItem->image1) ?>" width="100%">
                                </a>
                                <p style="font-size: 30px; font-weight: bold;">
                                    Rp <?= number_format($productItemItem->price, 0, '.', ',') ?>
                                </p>
                                <p style="font-size: 15px; font-weight: bold;"><?= $productItemItem->name ?></p>
                                <div class="bottom-product bottom-red">
                                    <div class="bottom-product-abs pink-dot">
                                        <div class="button-cake">
                                            <div class="blue-button-cake">
                                                <button class="button-d-cake pink-button-cake"><?= Yii::t('common', 'Buy') ?></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrap-bottom-cake">
                                        <?= Yii::$app->myLibrary->getFirstParagraph($productItemItem->description, true) ?>
                                        <div class="red-line"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="row">
                    <div class="pagination-wrap pull-left">
                        <?php
                        echo LinkPager::widget([
                            'pagination' => $pagination
                        ]);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Product Cake -->
