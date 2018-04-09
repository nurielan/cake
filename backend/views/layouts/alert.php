<?php
use yii\bootstrap\Alert;

echo Alert::widget([
    'options' => [
        'class' => 'alert-' . $data['status']
    ],
    'body' => $data['message']
]);
?>