<?php

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = Yii::t('common', 'Cart');

?>

<div class="purple-arrow">
    &nbsp;
</div>
<div class="chart-cake">
    <div class="container">
        <table class="table table-bordered table-hover hidden-xs" style="margin-bottom: 100px;">
            <thead>
            <tr>
                <th>
                    No.
                </th>
                <th>
                    <?= Yii::t('common', 'Product') ?>
                </th>
                <th>
                    <?= Yii::t('common', 'Description') ?>
                </th>
                <th>
                    <?= Yii::t('common', 'Quantity') ?>
                </th>
                <th>
                    <?= Yii::t('common', 'Price') ?>
                </th>
                <th>
                    <?= Yii::t('common', 'Subtotal') ?>
                </th>
                <th>

                </th>
            </tr>
            </thead>
            <tbody>
            <?php if ($productItem): ?>
                <?php $i = 1; ?>
                <?php foreach ($productItem as $key => $value): ?>
                    <tr>
                        <td align="center">
                            <?= $i++ ?>
                        </td>
                        <td>
                            <img alt="<?= $value->getProduct()->name ?>" class="img-100px"
                                 src="<?= Yii::$app->myLibrary->getProductItemImage($value->getProduct()->image1) ?>">
                        </td>
                        <td class="chart-description">
                            <h4 class="mar-btm-0">
                                <?= $value->getProduct()->name ?>
                            </h4>
                            <!--ul class="star normal-heading">
                                <li>
                                    <div class="icon-star-active">
                                        &nbsp;
                                    </div>
                                </li>
                                <li>
                                    <div class="icon-star-active">
                                        &nbsp;
                                    </div>
                                </li>
                                <li>
                                    <div class="icon-star-active">
                                        &nbsp;
                                    </div>
                                </li>
                                <li>
                                    <div class="icon-star-disable">
                                        &nbsp;
                                    </div>
                                </li>
                                <li>
                                    <div class="icon-star-disable">
                                        &nbsp;
                                    </div>
                                </li>
                                <li>
                                    <span class="grey-color"><i>Required</i></span>
                                </li>
                            </ul-->
                            <p class="mar-top-10 pad-top-10 top-dashed">
                                <?= Yii::$app->myLibrary->getFirstParagraph($value->getProduct()->description, true) ?>
                            </p>
                        </td>
                        <td align="center">
                            <?= $value->getQuantity() ?>
                        </td>
                        <td align="right">
                            Rp. <?= number_format($value->getProduct()->price, 0, '.', ',') ?>
                        </td>
                        <td align="right">
                            Rp. <?= number_format($value->getCost(), 0, '.', ',') ?>
                        </td>
                        <td class="chart-center">
                            <?= Html::beginForm(['cart/remove']) ?>
                            <?= Html::hiddenInput('product_item_no', $value->getProduct()->no) ?>
                            <button class="btn btn-pink-cake mar-right-10" type="submit">&times;</button>
                            <?= Html::endForm() ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td class="chart-center" colspan="7">
                        <a class="btn btn-pink-cake mar-right-10" href="<?= Url::toRoute(['cart/remove']) ?>" data-method="post"><?= Yii::t('common', 'Remove all items') ?></a>
                    </td>
                </tr>
                <tr>
                    <td class="chart-center" colspan="7">
                        <button class="btn btn-pink-cake mar-right-10">Checkout</button>
                    </td>
                </tr>
            <?php else: ?>
                <tr>
                    <td class="chart-center" colspan="7">
                        <h1><?= Yii::t('common', 'Cart empty') ?></h1>
                    </td>
                </tr>
                <tr>
                    <td class="chart-center" colspan="7">
                        <a class="btn btn-pink-cake mar-right-10"
                           href="<?= Url::toRoute(['product/index']) ?>"><?= Yii::t('common', 'Back to Product') ?></a>
                    </td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
        <div class="visible-xs">
            <div class="top-cake-table">
                <div class="top-cake-no">
                    No : 1
                </div>
                <div class="top-cake-product">
                    Product : Purple Cake
                    <ul class="star normal-heading">
                        <li>
                            <div class="icon-star-active">
                                &nbsp;
                            </div>
                        </li>
                        <li>
                            <div class="icon-star-active">
                                &nbsp;
                            </div>
                        </li>
                        <li>
                            <div class="icon-star-active">
                                &nbsp;
                            </div>
                        </li>
                        <li>
                            <div class="icon-star-disable">
                                &nbsp;
                            </div>
                        </li>
                        <li>
                            <div class="icon-star-disable">
                                &nbsp;
                            </div>
                        </li>
                        <li>
                            <span class="grey-color"><i>Required</i></span>
                        </li>
                    </ul>
                </div>
                <div class="top-cake-desription">
                    Description :
                    <p>
                        Toffee sugar plum halvah liquorice brownie gummies chocolate bar muffin candy canes. Dessert
                        jelly-o tootsie roll jelly sesame snaps icing.
                    </p>
                </div>
                <div class="top-cake-img">
                    <img alt="Cake-one" class="img-150px" src="assets/images/cake-one-buy.png">
                </div>
                <div class="top-cake-button text-center">
                    <button class="btn btn-pink-cake mar-right-10">Checkout</button>
                </div>
            </div>
            <div class="top-cake-table">
                <div class="top-cake-no">
                    No : 2
                </div>
                <div class="top-cake-product">
                    Product : Pink Cake
                    <ul class="star normal-heading">
                        <li>
                            <div class="icon-star-active">
                                &nbsp;
                            </div>
                        </li>
                        <li>
                            <div class="icon-star-active">
                                &nbsp;
                            </div>
                        </li>
                        <li>
                            <div class="icon-star-active">
                                &nbsp;
                            </div>
                        </li>
                        <li>
                            <div class="icon-star-disable">
                                &nbsp;
                            </div>
                        </li>
                        <li>
                            <div class="icon-star-disable">
                                &nbsp;
                            </div>
                        </li>
                        <li>
                            <span class="grey-color"><i>Required</i></span>
                        </li>
                    </ul>
                </div>
                <div class="top-cake-desription">
                    Description :
                    <p>
                        Toffee sugar plum halvah liquorice brownie gummies chocolate bar muffin candy canes. Dessert
                        jelly-o tootsie roll jelly sesame snaps icing.
                    </p>
                </div>
                <div class="top-cake-img">
                    <img alt="Cake-one" class="img-150px" src="assets/images/cake-two-buy.png">
                </div>
                <div class="top-cake-button text-center">
                    <button class="btn btn-pink-cake mar-right-10">Checkout</button>
                </div>
            </div>
            <div class="top-cake-table">
                <div class="top-cake-no">
                    No : 3
                </div>
                <div class="top-cake-product">
                    Product : Pink Cake
                    <ul class="star normal-heading">
                        <li>
                            <div class="icon-star-active">
                                &nbsp;
                            </div>
                        </li>
                        <li>
                            <div class="icon-star-active">
                                &nbsp;
                            </div>
                        </li>
                        <li>
                            <div class="icon-star-active">
                                &nbsp;
                            </div>
                        </li>
                        <li>
                            <div class="icon-star-disable">
                                &nbsp;
                            </div>
                        </li>
                        <li>
                            <div class="icon-star-disable">
                                &nbsp;
                            </div>
                        </li>
                        <li>
                            <span class="grey-color"><i>Required</i></span>
                        </li>
                    </ul>
                </div>
                <div class="top-cake-desription">
                    Description :
                    <p>
                        Toffee sugar plum halvah liquorice brownie gummies chocolate bar muffin candy canes. Dessert
                        jelly-o tootsie roll jelly sesame snaps icing.
                    </p>
                </div>
                <div class="top-cake-img">
                    <img alt="Cake-one" class="img-150px" src="assets/images/cake-three-buy.png">
                </div>
                <div class="top-cake-button text-center">
                    <button class="btn btn-pink-cake mar-right-10">Checkout</button>
                </div>
            </div>
        </div>
    </div>
</div>