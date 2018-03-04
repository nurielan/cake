<?php

namespace common\libraries;

use common\models\ProductBrand;
use common\models\ProductItem;
use common\models\ProductPackage;
use common\models\UserAddress;
use Yii;
use yii\helpers\Url;

class MyLibrary {

    public function getUserImage($user) {
        if (!$user->image && $user->userDetail->gender == 1) {
            $path = Url::to('@web/adminlte/dist/img/avatar5.png');
        } elseif ((!$user->image && $user->userDetail->gender == 2)) {
            $path = Url::to('@web/adminlte/dist/img/avatar2.png');
        } else {
            $path = Url::to('@web/img/user/thumb/' . $user->image);
        }

        return $path;
    }

    public function getUserGender($user) {
        if ($user->userDetail->gender == 1) {
            $gender = Yii::t('common', 'Male');
        } elseif ($user->userDetail->gender == 2) {
            $gender = Yii::t('common', 'Female');
        }

        return $gender;
    }

    public function getAutoNoUserAddress() {
        $no = UserAddress::find()->max('no');

        if (!$no) {
            $newNo = 'ADDRS0000000000001';
        } else {
            $oldNo = (int) substr($no, 6, strlen($no));
            $addNo = $oldNo + 1;

            if ($addNo < 10) {
                $newNo = 'ADDRS000000000000' . $addNo;
            } elseif ($addNo < 100) {
                $newNo = 'ADDRS00000000000' . $addNo;
            } elseif ($addNo < 1000) {
                $newNo = 'ADDRS0000000000' . $addNo;
            } elseif ($addNo < 10000) {
                $newNo = 'ADDRS000000000' . $addNo;
            } elseif ($addNo < 100000) {
                $newNo = 'ADDRS00000000' . $addNo;
            } elseif ($addNo < 1000000) {
                $newNo = 'ADDRS0000000' . $addNo;
            } elseif ($addNo < 10000000) {
                $newNo = 'ADDRS000000' . $addNo;
            } elseif ($addNo < 100000000) {
                $newNo = 'ADDRS00000' . $addNo;
            } elseif ($addNo < 1000000000) {
                $newNo = 'ADDRS0000' . $addNo;
            } elseif ($addNo < 10000000000) {
                $newNo = 'ADDRS000' . $addNo;
            } elseif ($addNo < 100000000000) {
                $newNo = 'ADDRS00' . $addNo;
            } elseif ($addNo < 1000000000000) {
                $newNo = 'ADDRS0' . $addNo;
            } elseif ($addNo < 10000000000000) {
                $newNo = 'ADDRS' . $addNo;
            }
        }

        return $newNo;
    }

    public static function getAutoNoProductBrand() {
        $no = ProductBrand::find()->max('no');

        if (!$no) {
            $newNo = 'PRDCTBRND0000000000001';
        } else {
            $oldNo = (int) substr($no, 6, strlen($no));
            $addNo = $oldNo + 1;

            if ($addNo < 10) {
                $newNo = 'PRDCTBRND000000000000' . $addNo;
            } elseif ($addNo < 100) {
                $newNo = 'PRDCTBRND00000000000' . $addNo;
            } elseif ($addNo < 1000) {
                $newNo = 'PRDCTBRND0000000000' . $addNo;
            } elseif ($addNo < 10000) {
                $newNo = 'PRDCTBRND000000000' . $addNo;
            } elseif ($addNo < 100000) {
                $newNo = 'PRDCTBRND00000000' . $addNo;
            } elseif ($addNo < 1000000) {
                $newNo = 'PRDCTBRND0000000' . $addNo;
            } elseif ($addNo < 10000000) {
                $newNo = 'PRDCTBRND000000' . $addNo;
            } elseif ($addNo < 100000000) {
                $newNo = 'PRDCTBRND00000' . $addNo;
            } elseif ($addNo < 1000000000) {
                $newNo = 'PRDCTBRND0000' . $addNo;
            } elseif ($addNo < 10000000000) {
                $newNo = 'PRDCTBRND000' . $addNo;
            } elseif ($addNo < 100000000000) {
                $newNo = 'PRDCTBRND00' . $addNo;
            } elseif ($addNo < 1000000000000) {
                $newNo = 'PRDCTBRND0' . $addNo;
            } elseif ($addNo < 10000000000000) {
                $newNo = 'PRDCTBRND' . $addNo;
            }
        }

        return $newNo;
    }

    public static function getAutoNoProductCategory() {
        $no = ProductPackage::find()->max('no');

        if (!$no) {
            $newNo = 'PRDCTCTGRY0000000000001';
        } else {
            $oldNo = (int) substr($no, 6, strlen($no));
            $addNo = $oldNo + 1;

            if ($addNo < 10) {
                $newNo = 'PRDCTCTGRY000000000000' . $addNo;
            } elseif ($addNo < 100) {
                $newNo = 'PRDCTCTGRY00000000000' . $addNo;
            } elseif ($addNo < 1000) {
                $newNo = 'PRDCTCTGRY0000000000' . $addNo;
            } elseif ($addNo < 10000) {
                $newNo = 'PRDCTCTGRY000000000' . $addNo;
            } elseif ($addNo < 100000) {
                $newNo = 'PRDCTCTGRY00000000' . $addNo;
            } elseif ($addNo < 1000000) {
                $newNo = 'PRDCTCTGRY0000000' . $addNo;
            } elseif ($addNo < 10000000) {
                $newNo = 'PRDCTCTGRY000000' . $addNo;
            } elseif ($addNo < 100000000) {
                $newNo = 'PRDCTCTGRY00000' . $addNo;
            } elseif ($addNo < 1000000000) {
                $newNo = 'PRDCTCTGRY0000' . $addNo;
            } elseif ($addNo < 10000000000) {
                $newNo = 'PRDCTCTGRY000' . $addNo;
            } elseif ($addNo < 100000000000) {
                $newNo = 'PRDCTCTGRY00' . $addNo;
            } elseif ($addNo < 1000000000000) {
                $newNo = 'PRDCTCTGRY0' . $addNo;
            } elseif ($addNo < 10000000000000) {
                $newNo = 'PRDCTCTGRY' . $addNo;
            }
        }

        return $newNo;
    }

    public function getAutoNoProductItem() {
        $no = ProductItem::find()->max('no');

        if (!$no) {
            $newNo = 'PRDCTITM0000000000001';
        } else {
            $oldNo = (int) substr($no, 6, strlen($no));
            $addNo = $oldNo + 1;

            if ($addNo < 10) {
                $newNo = 'PRDCTITM000000000000' . $addNo;
            } elseif ($addNo < 100) {
                $newNo = 'PRDCTITM00000000000' . $addNo;
            } elseif ($addNo < 1000) {
                $newNo = 'PRDCTITM0000000000' . $addNo;
            } elseif ($addNo < 10000) {
                $newNo = 'PRDCTITM000000000' . $addNo;
            } elseif ($addNo < 100000) {
                $newNo = 'PRDCTITM00000000' . $addNo;
            } elseif ($addNo < 1000000) {
                $newNo = 'PRDCTITM0000000' . $addNo;
            } elseif ($addNo < 10000000) {
                $newNo = 'PRDCTITM000000' . $addNo;
            } elseif ($addNo < 100000000) {
                $newNo = 'PRDCTITM00000' . $addNo;
            } elseif ($addNo < 1000000000) {
                $newNo = 'PRDCTITM0000' . $addNo;
            } elseif ($addNo < 10000000000) {
                $newNo = 'PRDCTITM000' . $addNo;
            } elseif ($addNo < 100000000000) {
                $newNo = 'PRDCTITM00' . $addNo;
            } elseif ($addNo < 1000000000000) {
                $newNo = 'PRDCTITM0' . $addNo;
            } elseif ($addNo < 10000000000000) {
                $newNo = 'PRDCTITM' . $addNo;
            }
        }

        return $newNo;
    }

    public function getAutoNoProductPackage() {
        $no = UserAddress::find()->max('no');

        if (!$no) {
            $newNo = 'PRDCTPKG0000000000001';
        } else {
            $oldNo = (int) substr($no, 6, strlen($no));
            $addNo = $oldNo + 1;

            if ($addNo < 10) {
                $newNo = 'PRDCTPKG000000000000' . $addNo;
            } elseif ($addNo < 100) {
                $newNo = 'PRDCTPKG00000000000' . $addNo;
            } elseif ($addNo < 1000) {
                $newNo = 'PRDCTPKG0000000000' . $addNo;
            } elseif ($addNo < 10000) {
                $newNo = 'PRDCTPKG000000000' . $addNo;
            } elseif ($addNo < 100000) {
                $newNo = 'PRDCTPKG00000000' . $addNo;
            } elseif ($addNo < 1000000) {
                $newNo = 'PRDCTPKG0000000' . $addNo;
            } elseif ($addNo < 10000000) {
                $newNo = 'PRDCTPKG000000' . $addNo;
            } elseif ($addNo < 100000000) {
                $newNo = 'PRDCTPKG00000' . $addNo;
            } elseif ($addNo < 1000000000) {
                $newNo = 'PRDCTPKG0000' . $addNo;
            } elseif ($addNo < 10000000000) {
                $newNo = 'PRDCTPKG000' . $addNo;
            } elseif ($addNo < 100000000000) {
                $newNo = 'PRDCTPKG00' . $addNo;
            } elseif ($addNo < 1000000000000) {
                $newNo = 'PRDCTPKG0' . $addNo;
            } elseif ($addNo < 10000000000000) {
                $newNo = 'PRDCTPKG' . $addNo;
            }
        }

        return $newNo;
    }

    public function getAutoNoBlogCategory() {
        $no = UserAddress::find()->max('no');

        if (!$no) {
            $newNo = 'BLGCTGRY0000000000001';
        } else {
            $oldNo = (int) substr($no, 6, strlen($no));
            $addNo = $oldNo + 1;

            if ($addNo < 10) {
                $newNo = 'BLGCTGRY000000000000' . $addNo;
            } elseif ($addNo < 100) {
                $newNo = 'BLGCTGRY00000000000' . $addNo;
            } elseif ($addNo < 1000) {
                $newNo = 'BLGCTGRY0000000000' . $addNo;
            } elseif ($addNo < 10000) {
                $newNo = 'BLGCTGRY000000000' . $addNo;
            } elseif ($addNo < 100000) {
                $newNo = 'BLGCTGRY00000000' . $addNo;
            } elseif ($addNo < 1000000) {
                $newNo = 'BLGCTGRY0000000' . $addNo;
            } elseif ($addNo < 10000000) {
                $newNo = 'BLGCTGRY000000' . $addNo;
            } elseif ($addNo < 100000000) {
                $newNo = 'BLGCTGRY00000' . $addNo;
            } elseif ($addNo < 1000000000) {
                $newNo = 'BLGCTGRY0000' . $addNo;
            } elseif ($addNo < 10000000000) {
                $newNo = 'BLGCTGRY000' . $addNo;
            } elseif ($addNo < 100000000000) {
                $newNo = 'BLGCTGRY00' . $addNo;
            } elseif ($addNo < 1000000000000) {
                $newNo = 'BLGCTGRY0' . $addNo;
            } elseif ($addNo < 10000000000000) {
                $newNo = 'BLGCTGRY' . $addNo;
            }
        }

        return $newNo;
    }

    public function getAutoNoBlogTag() {
        $no = UserAddress::find()->max('no');

        if (!$no) {
            $newNo = 'BLGTAG0000000000001';
        } else {
            $oldNo = (int) substr($no, 6, strlen($no));
            $addNo = $oldNo + 1;

            if ($addNo < 10) {
                $newNo = 'BLGTAG000000000000' . $addNo;
            } elseif ($addNo < 100) {
                $newNo = 'BLGTAG00000000000' . $addNo;
            } elseif ($addNo < 1000) {
                $newNo = 'BLGTAG0000000000' . $addNo;
            } elseif ($addNo < 10000) {
                $newNo = 'BLGTAG000000000' . $addNo;
            } elseif ($addNo < 100000) {
                $newNo = 'BLGTAG00000000' . $addNo;
            } elseif ($addNo < 1000000) {
                $newNo = 'BLGTAG0000000' . $addNo;
            } elseif ($addNo < 10000000) {
                $newNo = 'BLGTAG000000' . $addNo;
            } elseif ($addNo < 100000000) {
                $newNo = 'BLGTAG00000' . $addNo;
            } elseif ($addNo < 1000000000) {
                $newNo = 'BLGTAG0000' . $addNo;
            } elseif ($addNo < 10000000000) {
                $newNo = 'BLGTAG000' . $addNo;
            } elseif ($addNo < 100000000000) {
                $newNo = 'BLGTAG00' . $addNo;
            } elseif ($addNo < 1000000000000) {
                $newNo = 'BLGTAG0' . $addNo;
            } elseif ($addNo < 10000000000000) {
                $newNo = 'BLGTAG' . $addNo;
            }
        }

        return $newNo;
    }

    public function getAutoNoBlogItem() {
        $no = UserAddress::find()->max('no');

        if (!$no) {
            $newNo = 'BLGITM0000000000001';
        } else {
            $oldNo = (int) substr($no, 6, strlen($no));
            $addNo = $oldNo + 1;

            if ($addNo < 10) {
                $newNo = 'BLGITM000000000000' . $addNo;
            } elseif ($addNo < 100) {
                $newNo = 'BLGITM00000000000' . $addNo;
            } elseif ($addNo < 1000) {
                $newNo = 'BLGITM0000000000' . $addNo;
            } elseif ($addNo < 10000) {
                $newNo = 'BLGITM000000000' . $addNo;
            } elseif ($addNo < 100000) {
                $newNo = 'BLGITM00000000' . $addNo;
            } elseif ($addNo < 1000000) {
                $newNo = 'BLGITM0000000' . $addNo;
            } elseif ($addNo < 10000000) {
                $newNo = 'BLGITM000000' . $addNo;
            } elseif ($addNo < 100000000) {
                $newNo = 'BLGITM00000' . $addNo;
            } elseif ($addNo < 1000000000) {
                $newNo = 'BLGITM0000' . $addNo;
            } elseif ($addNo < 10000000000) {
                $newNo = 'BLGITM000' . $addNo;
            } elseif ($addNo < 100000000000) {
                $newNo = 'BLGITM00' . $addNo;
            } elseif ($addNo < 1000000000000) {
                $newNo = 'BLGITM0' . $addNo;
            } elseif ($addNo < 10000000000000) {
                $newNo = 'BLGITM' . $addNo;
            }
        }

        return $newNo;
    }

    public function getProductBrandImage($product_brand) {
        if ($product_brand->image)

        return $path;
    }
}