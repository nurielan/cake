<?php

/* @var $this \yii\web\View */

/* @var $content string */

use backend\assets\AdminLteAsset;
use yii\helpers\Html;
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
    <?= $this->render('main-header')?>

    <!-- =============================================== -->

    <?= $this->render('main-sidebar') ?>

    <!-- =============================================== -->

    <?= Alert::widget() ?>

    <?= $content ?>

    <!-- =============================================== -->

    <?= $this->render('main-footer') ?>

    <!-- =============================================== -->

    <?= $this->render('control-sidebar') ?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
