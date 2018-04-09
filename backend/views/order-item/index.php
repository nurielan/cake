<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\OrderItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('common', 'Order Items');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-item-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('common', 'Create Order Item'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'order_list_no',
            'product_item_no',
            'product_item_name',
            'product_item_alias',
            //'product_item_image1',
            //'product_item_image2',
            //'product_item_image3',
            //'product_item_discount',
            //'product_item_discount_price',
            //'product_item_tax',
            //'product_item_tax_price',
            //'product_item_type',
            //'product_item_description:ntext',
            //'product_item_price',
            //'product_item_weight',
            //'quantity',
            //'sub_discount',
            //'sub_discount_price',
            //'sub_tax',
            //'sub_tax_price',
            //'sub_weight',
            //'sub_price',
            //'user_address_title',
            //'user_address_name',
            //'user_address_address:ntext',
            //'user_address_subdistrict',
            //'user_address_subdistrict_no',
            //'user_address_district',
            //'user_address_district_no',
            //'user_address_province',
            //'user_address_province_no',
            //'user_address_postal_code',
            //'user_address_phone_number',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
