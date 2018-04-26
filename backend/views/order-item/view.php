<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\OrderItem */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Order Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-item-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('common', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('common', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('common', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'order_list_no',
            'product_item_no',
            'product_item_name',
            'product_item_alias',
            'product_item_image1',
            'product_item_image2',
            'product_item_image3',
            'product_item_discount',
            'product_item_discount_price',
            'product_item_tax',
            'product_item_tax_price',
            'product_item_type',
            'product_item_description:ntext',
            'product_item_price',
            'product_item_weight',
            'quantity',
            'sub_discount',
            'sub_discount_price',
            'sub_tax',
            'sub_tax_price',
            'sub_weight',
            'sub_price',
            'user_address_title',
            'user_address_name',
            'user_address_address:ntext',
            'user_address_subdistrict',
            'user_address_subdistrict_no',
            'user_address_district',
            'user_address_district_no',
            'user_address_province',
            'user_address_province_no',
            'user_address_postal_code',
            'user_address_phone_number',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
