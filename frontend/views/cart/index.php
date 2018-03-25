<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

$this->title = Yii::t('common', 'Cart');

?>

<div class="purple-arrow">
    &nbsp;
</div>
<div class="chart-cake">
    <div class="container">
        <?= Html::beginForm(['cart/update']) ?>
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
                            <div class="form-group">
                                <?= Html::label(Yii::t('common', 'Send to'), 'user_address') ?>
                                <?= Html::dropDownList('user_address[]', $value->getUserAddress()->no, ArrayHelper::map($userAddress, 'no', 'title'), ['class' => 'form-control', 'disabled' => true]) ?>
                            </div>
                        </td>
                        <td align="center">
                            <?= Html::input('number', 'qty[]', $value->getQuantity(), ['min' => 0, 'class' => 'form-control']) ?>
                        </td>
                        <td align="right">
                            Rp. <?= number_format($value->getProduct()->price, 0, '.', ',') ?>
                        </td>
                        <td align="right">
                            Rp. <?= number_format($value->getCost(), 0, '.', ',') ?>
                        </td>
                        <td class="chart-center">
                            <?= Html::beginForm(['cart/remove']) ?>
                            <?= Html::hiddenInput('cart_position', $key) ?>
                            <button class="btn btn-pink-cake mar-right-10" type="submit">&times;</button>
                            <?= Html::endForm() ?>
                        </td>
                    </tr>
                    <?= Html::hiddenInput('product_item_no[]', $value->getProduct()->no) ?>
                <?php endforeach; ?>
                <tr>
                    <td colspan="7">
                        <div class="row">
                            <div class="col-md-3">
                                <a href="<?= Url::toRoute(['product/index']) ?>" class="btn btn-pink-cake btn-block"><i class="fa fa-cubes"></i> <?= Yii::t('common', 'Back to Product') ?></a>
                            </div>
                            <div class="col-md-3">
                                <a href="<?= Url::toRoute(['cart/remove-all']) ?>" class="btn btn-pink-cake btn-block" data-method="post"><i class="fa fa-trash"></i> <?= Yii::t('common', 'Remove all items') ?></a>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-pink-cake btn-block" type="submit"><i class="fa fa-cart-arrow-down"></i> <?= Yii::t('common', 'Update Cart') ?></button>
                            </div>
                            <div class="col-md-3">
                                <a href="<?= Url::toRoute(['cart/checkout']) ?>" class="btn btn-pink-cake btn-block"><i class="fa fa-check"></i> <?= Yii::t('common', 'Checkout') ?></a>
                            </div>
                        </div>
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
        <?= Html::endForm() ?>
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