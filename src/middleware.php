<?php

// Application middleware
// e.g: $app->add(new \Slim\Csrf\Guard);
use Slim\Middleware\TokenAuthentication;
use CryoConnectDB\ExpertsQuery;

//token authentication
$authenticator = function(Slim\Http\Request $request, TokenAuthentication $tokenAuth) {

    # Search for token on header, parameter, cookie or attribute
    $token = $tokenAuth->findToken($request);
    $expertId = $request->getParam('id');
    $expert = ExpertsQuery::create()->findPk($expertId);
    $expertToken = md5($expert->getEmail() . $expert->getBirthYear());

    if ($expertToken != $token) {
        throw new Exception("not authorized");
    }
};


$app->add(new TokenAuthentication([
    'path' => '/experts/approval/',
    'authenticator' => $authenticator,
    'parameter' => 't',
    'header' => 'Token-Authorization-X'
]));

$app->add(new TokenAuthentication([
    'path' => '/api/',
    'authenticator' => $authenticator,
    'header' => 'Token-Authorization-X'
]));
