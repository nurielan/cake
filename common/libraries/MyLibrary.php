<?php

namespace common\libraries;

use common\models\BlogCategory;
use common\models\BlogItem;
use common\models\BlogTag;
use common\models\OrderList;
use common\models\ProductBrand;
use common\models\ProductCategory;
use common\models\ProductCustom;
use common\models\ProductItem;
use common\models\ProductPackage;
use common\models\User;
use common\models\UserAddress;
use Yii;
use yii\data\Pagination;
use yii\helpers\Url;
use yii\widgets\LinkPager;

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

    public function getProductBrandImage($imagee = null) {
        if (!$imagee) {
            $path = Url::to('@web/adminlte/dist/img/no_image.png');
        } else {
            $path = Url::to('@web/img/product_brand/thumb/' . $imagee);
        }

        return $path;
    }

    public function getProductCategoryImage($imagee = null) {
        if (!$imagee) {
            $path = Url::to('@web/adminlte/dist/img/no_image.png');
        } else {
            $path = Url::to('@web/img/product_category/thumb/' . $imagee);
        }

        return $path;
    }

    public function getProductItemImage($imagee = null) {
        if (!$imagee) {
            $path = Url::to('@web/adminlte/dist/img/no_image.png');
        } else {
            $path = Url::to('@web/img/product_item/thumb/' . $imagee);
        }

        return $path;
    }

    public function getProductPackageImage($imagee = null) {
        if (!$imagee) {
            $path = Url::to('@web/adminlte/dist/img/no_image.png');
        } else {
            $path = Url::to('@web/img/product_package/thumb/' . $imagee);
        }

        return $path;
    }

    public function getBlogCategoryImage($imagee = null) {
        if (!$imagee) {
            $path = Url::to('@web/adminlte/dist/img/no_image.png');
        } else {
            $path = Url::to('@web/img/blog_category/thumb/' . $imagee);
        }

        return $path;
    }

    public function getBlogItemImage($imagee = null) {
        if (!$imagee) {
            $path = Url::to('@web/adminlte/dist/img/no_image.png');
        } else {
            $path = Url::to('@web/img/blog_item/thumb/' . $imagee);
        }

        return $path;
    }

    public function getCakeWhatWeCanImage($imagee = null) {
        if (!$imagee) {
            $path = Url::to('@web/adminlte/dist/img/no_image.png');
        } else {
            $path = Url::to('@web/img/cake_what_we_can/thumb/' . $imagee);
        }

        return $path;
    }

    public function getCakeOurTeamImage($imagee = null) {
        if (!$imagee) {
            $path = Url::to('@web/adminlte/dist/img/no_image.png');
        } else {
            $path = Url::to('@web/img/cake_our_team/thumb/' . $imagee);
        }

        return $path;
    }

    public function getGalleryImage($imagee = null) {
        if (!$imagee) {
            $path = Url::to('@web/adminlte/dist/img/no_image.png');
        } else {
            $path = Url::to('@web/img/gallery/thumb/' . $imagee);
        }

        return $path;
    }

    public function getBankImage($imagee = null) {
        if (!$imagee) {
            $path = Url::to('@web/adminlte/dist/img/no_image.png');
        } else {
            $path = Url::to('@web/img/bank/thumb/' . $imagee);
        }

        return $path;
    }

    public function getProductCustomImage($imagee = null) {
        if (!$imagee) {
            $path = Url::to('@web/adminlte/dist/img/no_image.png');
        } else {
            $path = Url::to('@web/img/product_custom/thumb/' . $imagee);
        }

        return $path;
    }


    public function getAutoNoUser() {
        $no = User::find()->max('no');

        if (!$no) {
            $newNo = 'USR0000000000001';
        } else {
            $oldNo = (int) substr($no, 4, strlen($no));
            $addNo = $oldNo + 1;

            if ($addNo < 10) {
                $newNo = 'USR000000000000' . $addNo;
            } elseif ($addNo < 100) {
                $newNo = 'USR00000000000' . $addNo;
            } elseif ($addNo < 1000) {
                $newNo = 'USR0000000000' . $addNo;
            } elseif ($addNo < 10000) {
                $newNo = 'USR000000000' . $addNo;
            } elseif ($addNo < 100000) {
                $newNo = 'USR00000000' . $addNo;
            } elseif ($addNo < 1000000) {
                $newNo = 'USR0000000' . $addNo;
            } elseif ($addNo < 10000000) {
                $newNo = 'USR000000' . $addNo;
            } elseif ($addNo < 100000000) {
                $newNo = 'USR00000' . $addNo;
            } elseif ($addNo < 1000000000) {
                $newNo = 'USR0000' . $addNo;
            } elseif ($addNo < 10000000000) {
                $newNo = 'USR000' . $addNo;
            } elseif ($addNo < 100000000000) {
                $newNo = 'USR00' . $addNo;
            } elseif ($addNo < 1000000000000) {
                $newNo = 'USR0' . $addNo;
            } elseif ($addNo < 10000000000000) {
                $newNo = 'USR' . $addNo;
            }
        }

        return $newNo;
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

    public function getAutoNoProductBrand() {
        $no = ProductBrand::find()->max('no');

        if (!$no) {
            $newNo = 'PRDCTBRND0000000000001';
        } else {
            $oldNo = (int) substr($no, 10, strlen($no));
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

    public function getAutoNoProductCategory() {
        $no = ProductCategory::find()->max('no');

        if (!$no) {
            $newNo = 'PRDCTCTGRY0000000000001';
        } else {
            $oldNo = (int) substr($no, 11, strlen($no));
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
            $oldNo = (int) substr($no, 9, strlen($no));
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
        $no = ProductPackage::find()->max('no');

        if (!$no) {
            $newNo = 'PRDCTPKG0000000000001';
        } else {
            $oldNo = (int) substr($no, 9, strlen($no));
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
        $no = BlogCategory::find()->max('no');

        if (!$no) {
            $newNo = 'BLGCTGRY0000000000001';
        } else {
            $oldNo = (int) substr($no, 9, strlen($no));
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
        $no = BlogTag::find()->max('no');

        if (!$no) {
            $newNo = 'BLGTAG0000000000001';
        } else {
            $oldNo = (int) substr($no, 7, strlen($no));
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
        $no = BlogItem::find()->max('no');

        if (!$no) {
            $newNo = 'BLGITM0000000000001';
        } else {
            $oldNo = (int) substr($no, 7, strlen($no));
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

    public function getAutoNoOrderList() {
        $no = OrderList::find()->max('no');
        $date = date('d/m/Y');

        if (!$no) {
            $newNo = 'ORDRCKE/'. $date .'/0000000000001';
        } else {
            $oldNo = (int) substr($no, 20, strlen($no));
            $addNo = $oldNo + 1;

            if ($addNo < 10) {
                $newNo = 'ORDRCKE/'. $date .'/000000000000' . $addNo;
            } elseif ($addNo < 100) {
                $newNo = 'ORDRCKE/'. $date .'/00000000000' . $addNo;
            } elseif ($addNo < 1000) {
                $newNo = 'ORDRCKE/'. $date .'/0000000000' . $addNo;
            } elseif ($addNo < 10000) {
                $newNo = 'ORDRCKE/'. $date .'/000000000' . $addNo;
            } elseif ($addNo < 100000) {
                $newNo = 'ORDRCKE/'. $date .'/00000000' . $addNo;
            } elseif ($addNo < 1000000) {
                $newNo = 'ORDRCKE/'. $date .'/0000000' . $addNo;
            } elseif ($addNo < 10000000) {
                $newNo = 'ORDRCKE/'. $date .'/000000' . $addNo;
            } elseif ($addNo < 100000000) {
                $newNo = 'ORDRCKE/'. $date .'/00000' . $addNo;
            } elseif ($addNo < 1000000000) {
                $newNo = 'ORDRCKE/'. $date .'/0000' . $addNo;
            } elseif ($addNo < 10000000000) {
                $newNo = 'ORDRCKE/'. $date .'/000' . $addNo;
            } elseif ($addNo < 100000000000) {
                $newNo = 'ORDRCKE/'. $date .'/00' . $addNo;
            } elseif ($addNo < 1000000000000) {
                $newNo = 'ORDRCKE/'. $date .'/0' . $addNo;
            } elseif ($addNo < 10000000000000) {
                $newNo = 'ORDRCKE/'. $date .'/' . $addNo;
            }
        }

        return $newNo;
    }

    public function getAutoNoProductCustom() {
        $no = ProductCustom::find()->max('no');

        if (!$no) {
            $newNo = 'PROCUS0000000000001';
        } else {
            $oldNo = (int) substr($no, 7, strlen($no));
            $addNo = $oldNo + 1;

            if ($addNo < 10) {
                $newNo = 'PROCUS000000000000' . $addNo;
            } elseif ($addNo < 100) {
                $newNo = 'PROCUS00000000000' . $addNo;
            } elseif ($addNo < 1000) {
                $newNo = 'PROCUS0000000000' . $addNo;
            } elseif ($addNo < 10000) {
                $newNo = 'PROCUS000000000' . $addNo;
            } elseif ($addNo < 100000) {
                $newNo = 'PROCUS00000000' . $addNo;
            } elseif ($addNo < 1000000) {
                $newNo = 'PROCUS0000000' . $addNo;
            } elseif ($addNo < 10000000) {
                $newNo = 'PROCUS000000' . $addNo;
            } elseif ($addNo < 100000000) {
                $newNo = 'PROCUS00000' . $addNo;
            } elseif ($addNo < 1000000000) {
                $newNo = 'PROCUS0000' . $addNo;
            } elseif ($addNo < 10000000000) {
                $newNo = 'PROCUS000' . $addNo;
            } elseif ($addNo < 100000000000) {
                $newNo = 'PROCUS00' . $addNo;
            } elseif ($addNo < 1000000000000) {
                $newNo = 'PROCUS0' . $addNo;
            } elseif ($addNo < 10000000000000) {
                $newNo = 'PROCUS' . $addNo;
            }
        }

        return $newNo;
    }

    function getFirstParagraph($string, $removeTags = false) {
        if ($removeTags) {
            $string = substr($string,0, strpos($string, "</p>")+4);
            $string = str_replace("<p>", "", str_replace("<p/>", "", $string));
        } else {
            $string = substr($string,0, strpos($string, "</p>")+4);
        }

        return $string;
    }

    function limitText($text, $limit) {
        if (str_word_count($text, 0) > $limit) {
            $text = str_replace(['<p>', '</p>'], '', $text);
            $words = str_word_count($text, 2);
            $pos = array_keys($words);
            $text = substr($text, 0, $pos[$limit]) . '...';
        }
        return $text;
    }

    function pagiNation($query, $pageSize, $orderBy) {
        $count = $query->count();
        $pagination = new Pagination([
            'totalCount' => $count,
            'pageSize' => $pageSize
        ]);
        $data = $query->offset($pagination->offset)->limit($pagination->limit)->orderBy('created_at ' . $orderBy)->all();

        return [
            'pagination' => $pagination,
            'data' => $data
        ];
    }

    function linkPager($pagination) {
        return LinkPager::widget([
            'pagination' => $pagination
        ]);
    }
}