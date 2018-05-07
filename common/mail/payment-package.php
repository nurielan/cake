<?php
use yii\helpers\Url;
?>

<!-- START CENTERED WHITE CONTAINER -->
<span class="preheader"
      style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">This is preheader text. Some clients will show this text as a preview.</span>
<table class="main"
       style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;">

    <!-- START MAIN CONTENT AREA -->
    <tr>
        <td class="wrapper"
            style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
            <table border="0" cellpadding="0" cellspacing="0"
                   style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                <tr>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                            Hi <?= Yii::$app->user->identity->username ?>,</p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                            Sometimes you just want to send a simple HTML email with a simple design and clear call to
                            action. This is it.</p>

                        <table border="1" cellpadding="5" cellspacing="0"
                               style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                            <thead style="background: #3498db; color: #fff;">
                            <tr>
                                <th><?= Yii::t('common', 'Quantity') ?></th>
                                <th><?= Yii::t('common', 'Product') ?></th>
                                <th><?= Yii::t('common', 'Serial') ?> #</th>
                                <th><?= Yii::t('common', 'Description') ?></th>
                                <th>Subtotal</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($orderList->orderItem as $key => $item): ?>
                                <tr>
                                    <td valign="middle" align="center"><?= $item->quantity ?></td>
                                    <td valign="middle"><?= $item->product_package_name ?></td>
                                    <td valign="middle" align="center"><?= $item->product_package_no ?></td>
                                    <td valign="middle"><?= Yii::$app->myLibrary->limitText($item->product_package_description, 20) ?></td>
                                    <td valign="middle" align="right">Rp <?= number_format($item->sub_price, 0, ',', '.') ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>

                        <br>

                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                            <?= Yii::t('common', 'Please make payment by transfer to account below') ?>:</p>

                        <h1 align="center">Rp. <?= number_format($orderList->price, 0, ',', '.') ?>,-</h1>

                        <table>
                            <tr>
                                <td colspan="3">
                                    <strong><?= $bank->name ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <td><?= Yii::t('common', 'Branch') ?></td>
                                <td>:</td>
                                <td><?= $bank->branch ?></td>
                            </tr>
                            <tr>
                                <td><?= Yii::t('common', 'Account Name') ?></td>
                                <td>:</td>
                                <td><?= $bank->account_name ?></td>
                            </tr>
                            <tr>
                                <td><?= Yii::t('common', 'Account Number') ?></td>
                                <td>:</td>
                                <td><?= $bank->account_number ?></td>
                            </tr>
                        </table>

                        <br>

                        <div align="center">
                            <a href="<?= Url::toRoute(['site/order-confirm', 'order_list_no' => str_replace('/', '-', $orderList->no)]) ?>" target="_blank"
                               style="display: inline-block; color: #ffffff; background-color: #3498db; border: solid 1px #3498db; border-radius: 5px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize; border-color: #3498db;"><?= Yii::t('common', 'Payment Confirm') ?></a>
                        </div>

                        <br>

                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                            This is a really simple email template. Its sole purpose is to get the recipient to click
                            the button with no distractions.</p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                            Good luck! Hope it works.</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <!-- END MAIN CONTENT AREA -->
</table>