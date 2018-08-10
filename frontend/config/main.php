<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id'                  => 'app-frontend',
    'name'                => 'Orway',
    'basePath'            => dirname(__DIR__),
    'bootstrap'           => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'sourceLanguage'      => 'en',
    'language'            => 'en',
    'components'          => [
        'mailer'       => [
            'class' => 'yii\swiftmailer\Mailer',
        ],
        'request'      => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user'         => [
            'identityClass'   => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie'  => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session'      => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log'          => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager'   => [
            'class'                        => 'codemix\localeurls\UrlManager',
            'languages'                    => ['en', 'es', 'de'],
            'showScriptName'               => false,
            'enableDefaultLanguageUrlCode' => true,
            'enableLanguagePersistence'    => true,
            'rules'                        => [
                'blog/add-comment'             => 'blog/add-comment',
                'blog/search'                  => 'blog/search',
                'blog/index'                   => 'blog/index',
                'blog/test'                    => 'blog/test',
                'blog/<slug:[a-zA-Z0-9\_\-]+>' => 'blog/view',
                'blog'                         => 'blog/index',
                'admin'                        => 'admin',
                'site'                         => 'site',
                '<slug:[a-zA-Z0-9\_\-]+>'      => 'page/view',
            ],
            'ignoreLanguageUrlPatterns'    => [
                '#^site/(request)#' => '#^site/(request)#',
            ],
        ],
//        'urlManager' => [
//            'enablePrettyUrl' => true,
//            'showScriptName'  => false,
//            'rules'           => [
//                'blog/post/<slug:[a-zA-Z0-9\_\-]+>' => 'blog/view',
//            ],
//        ],

        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],

        'i18n' => [
            //			'translations' => [
            //				'*' => [
            //					'class' => 'yii\i18n\DbMessageSource',
            //					'forceTranslation'=>true
            //				],
            //			],
            'translations' => [
                'app' => [
                    'class'              => 'yii\i18n\DbMessageSource',
                    'sourceMessageTable' => '{{%translate_source_message}}',
                    'messageTable'       => '{{%translate_message}}',
                    'enableCaching'      => true,
                    'cachingDuration'    => 10,
                    'forceTranslation'   => true,
                ],
            ],
        ],
    ],
    'modules'             => [
        'admin' => [
            'class' => 'frontend\modules\admin\Admin',
        ],
    ],
    'params'              => $params,
];
