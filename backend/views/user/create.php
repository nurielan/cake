<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\User2 */

$this->title = Yii::t('common', 'Create User2');
$this->params['breadcrumbs'][] = Yii::t('common', 'User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'User2s'), 'url' => ['index']];
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


            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>

</div>
</section>
<!-- /.content -->
</div>
