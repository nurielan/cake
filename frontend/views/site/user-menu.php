<?php
use yii\helpers\Url;
?>

<div class="row" style="margin-top: 25px;">
    <div class="col-md-12">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><?= Yii::$app->user->identity->username  ?></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="<?= Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'order-list' ? 'active' : '' ?>"><a href="<?= Url::toRoute(['site/order-list']) ?>"><?= Yii::t('common', 'Order List') ?></a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="<?= Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'profile' ? 'active' : '' ?>"><a href="<?= Url::toRoute(['site/profile']) ?>"><?= Yii::t('common', 'Profile') ?></a></li>
                        <li><a href="<?= Url::toRoute(['site/logout']) ?>" data-method="post"><?= Yii::t('common', 'Logout') ?></a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>
</div>