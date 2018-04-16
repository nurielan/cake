<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

$this->title = Yii::t('common', 'Payment');
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="checkout-cake">
    <div class="container">
        <h2 align="center"><?= $this->title ?></h2>
        <?= Html::beginForm(['cart/payment-method']) ?>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-condensed table-striped table-hover">
                    <tr>
                        <th><?= Yii::t('common', 'Bank') ?></th>
                        <th><?= Yii::t('common', 'Description') ?></th>
                        <th></th>
                    </tr>

                    <?php foreach ($bank as $key => $item): ?>
                        <tr>
                            <td style="vertical-align: middle;">
                                <img src="<?= Yii::$app->myLibrary->getBankImage($item->image) ?>" width="128">
                            </td>
                            <td style="vertical-align: middle;">
                                <p>
                                    No. Rek: <?= $item->account_number ?><br>
                                    A/N: <?= $item->account_name ?><br>
                                    Cabang: <?= $item->branch ?><br>
                                </p>
                            </td>
                            <td style="vertical-align: middle;">
                                <input type="radio" name="bank_name"
                                       value="<?= $item->name ?>" <?= $key == 0 ? 'checked' : '' ?>>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
        <div class="row" style="margin-top: 15px;">
            <div class="col-xs-6">
                <a class="btn btn-pink-cake"
                   href="<?= Url::toRoute(['cart/checkout']) ?>"><?= Yii::t('common', 'Checkout') ?></a>
            </div>
            <div class="col-xs-6" align="right">
                <button class="btn btn-pink-cake"
                        type="submit"><?= Yii::t('common', 'Finish') ?></button>
            </div>
        </div>
        <?= Html::endForm() ?>
    </div>
</section>
