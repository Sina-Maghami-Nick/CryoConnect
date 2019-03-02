<?php

// Application middleware
// e.g: $app->add(new \Slim\Csrf\Guard);
use Slim\Middleware\TokenAuthentication;
use CryoConnectDB\FieldworkQuery;
use CryoConnectDB\ExpertsQuery;

//expert token authentication
$expertAuthenticator = function(Slim\Http\Request $request, TokenAuthentication $tokenAuth) {

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
    'authenticator' => $expertAuthenticator,
    'parameter' => 't',
    'header' => 'Token-Authorization-X'
]));

//fieldwork token authentication
$fieldworkAuthenticator = function(Slim\Http\Request $request, TokenAuthentication $tokenAuth) {

    # Search for token on header, parameter, cookie or attribute
    $token = $tokenAuth->findToken($request);
    $fieldworkId = $request->getParam('id');
    $fieldwork = FieldworkQuery::create()->findOneById($fieldworkId);
    $fieldworkToken = md5($fieldwork->getFieldworkLeaderEmail() . $fieldwork->getId());

    if ($fieldworkToken != $token) {
        throw new Exception("not authorized");
    }
};


$app->add(new TokenAuthentication([
    'path' => '/fieldwork/approval/',
    'authenticator' => $fieldworkAuthenticator,
    'parameter' => 't',
    'header' => 'Token-Authorization-X'
]));
