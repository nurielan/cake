<?php
$this->title = Yii::t('common', 'Gallery');
$this->params['breadcrumbs'][] = $this->title;
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
                    <?php if ($gallery): ?>
                        <div class="row gallery-cake">
                            <?php foreach ($gallery as $g): ?>
                                <div class="col-xs-12 col-sm-4 mar-btm-20">
                                    <a class="fancybox" data-fancybox-group="contentgallerygel"
                                       href="<?= Yii::$app->myLibrary->getGalleryImage($g->image1) ?>">
                                        <div class="gal-relative">
                                            <div class="gal-absolute">
                                                &nbsp;
                                            </div>
                                            <img alt="<?= $g->name ?>" class="img-100"
                                                 src="<?= Yii::$app->myLibrary->getGalleryImage($g->image1) ?>">
                                        </div>
                                        <h4>
                                            <?= $g->name ?>
                                        </h4>
                                    </a>
                                    <div style="height: 128px; overflow: scroll;">
                                        <?= $g->description ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="row gallery-cake">
                            <div class="pagination-wrap pull-right">
                                <?= Yii::$app->myLibrary->linkPager($pagination) ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Gallery -->
