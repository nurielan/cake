<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

$this->title = Yii::t('common', 'Payment Method');
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="checkout-cake">
    <div class="container">
        <div class="row" style="margin-bottom: 100px;">
            <div class="col-md-6 col-md-offset-3">
                <h2 align="center"><?= $this->title ?></h2>
                <?= Html::beginForm(['cart/payment-method']) ?>
                <div class="row">
                    <?php foreach ($bank as $key => $item): ?>
                    <div class="col-md-4">
                        <div class="radio">
                            <input type="radio" name="bank_name" value="<?= $item->name ?>" <?= $key == 0 ? 'checked' : '' ?>> <img src="<?= Yii::$app->myLibrary->getBankImage($item->image) ?>" width="128">
                        </div>

                        <h3><?= $item->name ?></h3>
                        <p>
                            No. Rek: <?= $item->account_number ?><br>
                            A/N: <?= $item->account_name ?><br>
                            Cabang: <?= $item->branch ?><br>
                        </p>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-6">
                        <a class="btn btn-pink-cake" href="<?= Url::toRoute(['cart/checkout']) ?>"><?= Yii::t('common', 'Checkout') ?></a>
                    </div>
                    <div class="col-md-6" align="right">
                        <button class="btn btn-pink-cake" type="submit"><?= Yii::t('common', 'Finish and Save Order') ?></button>
                    </div>
                </div>
                <?= Html::endForm() ?>
            </div>
        </div>
    </div>
</section>
