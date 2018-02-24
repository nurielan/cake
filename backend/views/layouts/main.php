<?php

/* @var $this \yii\web\View */

/* @var $content string */

use backend\assets\AdminLteAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AdminLteAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-blue layout-boxed sidebar-mini">
<?php $this->beginBody() ?>

<!-- Site wrapper -->
<div class="wrapper">
    <?= $this->render('header')?>

    <!-- =============================================== -->

    <?= $this->render('aside') ?>

    <!-- =============================================== -->
</div>

<div class="wrap">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'homeLink' => [
                'label' => Yii::t('common', 'Home'),
                'url' => Yii::$app->homeUrl
            ]
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
