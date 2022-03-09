<?php

return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header
        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
            'uri' => \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER)),
            'config' => [
                'cache' => __DIR__ . '/../cache/'
            ],
        ],
        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
        // Mailer settings
        'mailer' => [
            'smtp' => 'mail.webruimtemail.nl',
            'port' => 587,
            'username' => 'testing-dev-noreply@cryoconnect.net',
            'password' => '-----',
        ],
        //Admin emails
        'contacts' => [
            'technical_admin' => 'sina.nick@gmail.com',
            'approval_admin' => 'sina.nick@gmail.com',
                ],
        'tokens' => [
            'api-auth' => '----',
        ]
    ],
];
