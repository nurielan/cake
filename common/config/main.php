<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\DbCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
            'defaultRoles' => ['superadmin', 'admin', 'customer']
        ],
        'i18n' => [
            'translations' => [
                'yii*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    //'sourceLanguage' => 'en-US',
                    'basePath' => '@common/config/i18n',
                ],
                'common*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    //'sourceLanguage' => 'en-US',
                    'basePath' => '@common/config/i18n',
                ],
                'on missingTranslation' => ['common\components\TranslationEventHandler', 'handleMissingTranslation']
            ]
        ],
    ],
];
