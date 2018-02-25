<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */

/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= Html::encode($this->title) ?>
        </h1>
        <?= $this->render('@backend/views/layouts/breadcrumb.php') ?>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-yellow"> <?= nl2br(Html::encode($status)) ?></h2>

            <div class="error-content">
                <h3><i class="fa fa-warning text-yellow"></i> Oops! <?= nl2br(Html::encode($message)) ?>.</h3>

                <p>
                    <?= Yii::t('common', 'We could not find the page you were looking for.') ?>
                    <?php $homeLink = Yii::$app->homeUrl ?>
                    <?= Yii::t('common', 'Meanwhile, you may <a href="{link}">return to dashboard</a> or try using the search form.', [
                            'link' => $homeLink
                    ]) ?>
                </p>

                <form class="search-form">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">

                        <div class="input-group-btn">
                            <button type="submit" name="submit" class="btn btn-warning btn-flat"><i
                                        class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.input-group -->
                </form>
            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
