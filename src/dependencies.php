<?php

// DIC configuration

$container = $app->getContainer();

// view renderer
$container['view'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    $view = new \Slim\Views\Twig($settings['template_path'], $settings['config']);

    // Instantiate and add Slim specific extension
    $router = $c->get('router');
    $view->addExtension(new \Slim\Views\TwigExtension($router, $settings['uri']));

    return $view;
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

//swift mailer
$container['mailer'] = function ($c) {
    $settings = $c->get('settings')['mailer'];

    // Create the Transport
    $transport = (new Swift_SmtpTransport($settings['smtp'], $settings['port']))
            ->setUsername($settings['username'])
            ->setPassword($settings['password']);

    // Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

    return $mailer;
};
