<?php

use yii\helpers\Url;
use yii\helpers\Html;
use kartik\typeahead\TypeaheadBasic;
use kartik\typeahead\Typeahead;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = Yii::t('common', 'Product');

?>

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
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <?php $formSearch = ActiveForm::begin() ?>
                    <div class="form-group">
                        <?= $formSearch->field($search, 'product_name', [
                            'inputTemplate' => '<div class="input-group">{input}<span class="input-group-btn"><button class="btn btn-pink-cake" type="submit"><i class="glyphicon glyphicon-search"></i></button></span></div>'
                        ])->widget(Typeahead::className(), [
                            'dataset' => [
                                [
                                    'prefetch' => Url::toRoute(['rest-data/search-product']),
                                    'display' => 'value'
                                ]
                            ],
                            'scrollable' => true,
                            'pluginOptions' => [
                                'highlight' => true,
                            ],
                            'options' => [
                                'placeholder' => Yii::t('common', 'Search Product')
                            ],
                            'pluginEvents' => [
                                'typeahead:select' => 'function (suggest) { swal(suggest.link) }'
                            ]
                        ])->label(false) ?>
                    </div>
                    <?php ActiveForm::end() ?>
                    <!--div class="form-list-box">
                        <h3>
                            <?= Yii::t('common', 'Product Brands') ?>
                        </h3>
                        <ul>
                            <?php foreach ($productBrand as $pBItem): ?>
                            <li>
                                <div class="icon-check pink-color pull-left">
                                    <a class="mar-left-10 grey-color" href="<?= Url::toRoute(['product/index', 'brand' => $pBItem->alias]) ?>"><?= $pBItem->name ?></a>
                                </div>
                                <div class="number-list pull-right">
                                    <?= count($pBItem->productCategory) ?>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div-->
                </div>
            </div>
            <div class="row" style="margin-bottom: 15px;">
                <div class="col-md-8 col-md-offset-2">
                    <?= Html::beginForm(['product/index'], 'get', ['class' => 'form-inline']) ?>
                    <div class="form-group">
                        <?= Html::label(Yii::t('common', 'Product Brands'), 'brand') ?>
                        <?= Html::dropDownList('brand', null, ArrayHelper::map($productBrand, 'no', 'name'),
                            [
                                'prompt' => Yii::t('common', 'Select one'),
                                'class' => 'form-control'
                            ]) ?>
                    </div>
                    <div class="form-group">
                        <?= Html::label(Yii::t('common', 'Product Categories'), 'category') ?>
                        <?= Html::dropDownList('category', null, ArrayHelper::map($productCategory, 'no', 'name'),
                            [
                                'prompt' => Yii::t('common', 'Select one'),
                                'class' => 'form-control'
                            ]) ?>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-pink-cake" type="submit"><i
                                    class="glyphicon glyphicon-search"></i> <?= Yii::t('common', 'Search') ?></button>
                    </div>
                    <?= Html::endForm() ?>
                </div>
            </div>
            <div class="row">
                <!-- Product Content -->
                <div class="product-content col-md-12" style="margin-bottom: 100px;">
                    <div class="row">
                        <?php foreach ($productItem as $pIItem): ?>
                            <!-- Column -->
                            <div class="col-md-4">
                                <?= Html::beginForm(['cart/put']) ?>
                                <div class="wrap-product">
                                    <div>
                                        <a href="<?= Url::to(['product/detail', 'alias' => $pIItem->alias]) ?>">
                                            <img class="img-rounded"
                                                 src="<?= Yii::$app->myLibrary->getProductItemImage($pIItem->image1) ?>"
                                                 width="100%">
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
                                                    <button class="button-d-cake pink-button-cake"
                                                            type="submit"><?= Yii::t('common', 'Buy') ?></button>
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pagination-wrap pull-right">
                                <?= Yii::$app->myLibrary->linkPager($pagination) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
