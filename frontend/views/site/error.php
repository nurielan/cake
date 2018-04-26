<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $name;
?>

<!-- Start 404 Page -->
<section class="404">
    <div class="container">
        <div class="content-404" style="margin-bottom: 100px;">
            <ul>
                <li>
                    4
                </li>
                <li>
                    <?= Html::img('@web/cake/images/404.png', ['alt' => '404']) ?>
                </li>
                <li>
                    4
                </li>
            </ul>
            <div class="page-header text-center">
                <h3 class="text-center">
                    <?= Html::encode($this->title) ?>
                </h3>
                <p>
                    <?= nl2br(Html::encode($message)) ?>
                </p>
                <form action="<?= Url::toRoute(['site/index']) ?>">
                    <button class="btn btn-orange-cake mar-right-10" type="submit"><?= Yii::t('common', 'Back to Home') ?></button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- End 404 Page -->
