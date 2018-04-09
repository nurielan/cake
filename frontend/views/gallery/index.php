<?php

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = Yii::t('common', 'Gallery');
$this->params['breadcrumbs'][] = $this->title;

?>

<!-- Start Gallery -->
<section class="gallery">
    <h2 class="hide">
        &nbsp;
    </h2>
    <div class="gallery-cake">
        <div class="container">
            <div class="product-tittle">
                <img alt="Cake-Purple" src="<?= Url::to('@web/cake/images/cake-purple.png') ?>">
                <h2>
                    <?= Yii::t('common', 'Gallery') ?>
                </h2>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <?php if ($gallery): ?>
                        <div class="row gallery-cake">
                            <?php foreach ($gallery as $galleryItem): ?>
                                <div class="col-sm-3 mar-btm-20 cupcakes">
                                    <a class="fancybox" data-fancybox-group="contentgallerygel"
                                       href="<?= Yii::$app->myLibrary->getGalleryImage($galleryItem->image1) ?>">
                                        <div class="gal-relative">
                                            <div class="gal-absolute"></div>
                                            <img alt="<?= $galleryItem->name ?>" class="img-100"
                                                 src="<?= Yii::$app->myLibrary->getGalleryImage($galleryItem->image1) ?>">
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <h3 align="center"><?= Yii::t('common', 'No Gallery') ?></h3>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="pagination-wrap pull-right">
                        <?= Yii::$app->myLibrary->linkPager($pagination) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Gallery -->