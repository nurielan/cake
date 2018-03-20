<?php

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = Yii::t('common', 'Gallery');

?>

<!-- Start Gallery -->
<section class="gallery">
    <h2 class="hide">
        &nbsp;
    </h2>
    <div class="chart-cake">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row gallery-cake">
                        <?php foreach ($gallery as $galleryItem): ?>
                        <div class="col-sm-3 mar-btm-20 cupcakes">
                            <a class="fancybox" data-fancybox-group="contentgallerygel" href="<?= Yii::$app->myLibrary->getGalleryImage($galleryItem->image1) ?>">
                                <div class="gal-relative">
                                    <div class="gal-absolute"></div>
                                    <img alt="<?= $galleryItem->name ?>" class="img-100" src="<?= Yii::$app->myLibrary->getGalleryImage($galleryItem->image1) ?>">
                                </div>
                            </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Gallery -->