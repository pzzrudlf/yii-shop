<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=yiishop',
            'username' => 'root',
            'password' => 'pzzrudlf',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => '', //空着，让其他人自己填写
                'username' => '',
                'password' => '',
                'port' => '',
                'encryption' => 'tls',
            ],

            'messageConfig'=>[
                'charset'=>'UTF-8',
                'from'=>[''=>'robot']
            ],
        ],
    ],
];
