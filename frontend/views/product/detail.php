<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

$this->title = Yii::t('common', 'Product Detail');

?>

<div class="purple-arrow">
    &nbsp;
</div>
<div class="chart-cake">
    <div class="container">
        <?= Html::beginForm(['cart/put']) ?>
        <div class="row" style="margin-bottom: 100px;">
            <div class="col-sm-6">
                <img alt="<?= $productItem->name ?>"
                     src="<?= Yii::$app->myLibrary->getProductItemImage($productItem->image1) ?>" width="324"
                     height="324">
            </div>
            <div class="col-sm-6">
                <div class="shop-back">
                    <a href="<?= Url::toRoute(['product/index']) ?>">&lt;-- <?= Yii::t('common', 'Continue Shopping') ?></a>
                </div>
                <div class="tittle-chart-cake">
                    <h1 class="pink-color">
                        <?= $productItem->name ?>
                        <br>
                        <span class="orange-color"><i><?= $productItem->productCategory->name ?></i></span>
                        <span class="grey-color"><i><?= $productItem->productCategory->productBrand->name ?></i></span>
                    </h1>
                </div>
                <!--ul class="star">
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
                <div class="tittle-chart-cake mar-top-10 mar-btm-10">
                    <h1 class="pink-color">
                        Rp. <?= number_format($productItem->price, 0, '.', ',') ?>
                    </h1>
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group mar-btm-10">
                            <select class="form-control form-control-custom" name="qty">
                                <option value="0">Qty</option>
                                <?php for ($i = 1; $i <= 15; $i++): ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <p class="mar-top-0 mar-btm-20">
                    <?= $productItem->description ?>
                </p>
                <?php if (!Yii::$app->user->isGuest): ?>
                <div class="form-group">
                    <?= Html::label(Yii::t('common', 'Send to'), 'user_address') ?>
                    <?= Html::dropDownList('user_address', Yii::$app->user->identity->userConfig->primary_address, ArrayHelper::map($userAddress, 'no', 'title'), ['class' => 'form-control', 'required' => true]) ?>
                </div>
                <?php endif; ?>
                <?= Html::hiddenInput('product_item_no', $productItem->no) ?>
                <button class="btn btn-pink-cake mar-right-10"
                        type="submit"><?= Yii::t('common', 'Add to Cart') ?></button>
                <a class="btn btn-grey-cake"
                   href="<?= Url::toRoute(['product/index']) ?>"><?= Yii::t('common', 'Cancel') ?></a>

            </div>
        </div>
        <?= Html::endForm() ?>
    </div>
</div>