<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\OrderItem */

$this->title = Yii::t('common', 'Update Order Item: {nameAttribute}', [
    'nameAttribute' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Order Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('common', 'Update');
?>
<div class="order-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
