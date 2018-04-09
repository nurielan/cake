<?php
use yii\widgets\Breadcrumbs;
?>

<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'homeLink' => [
        'label' => '<i class="fa fa-dashboard"></i> ' . Yii::t('common', 'Home'),
        'url' => Yii::$app->homeUrl,
        'encode' => false
    ],
    'itemTemplate' => '<li>{link}</li>',
    'options' => [
        'class' => 'breadcrumb'
    ],
    'tag' => 'ol'
]) ?>