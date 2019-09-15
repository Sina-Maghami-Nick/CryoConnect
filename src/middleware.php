<?php

// Application middleware
// e.g: $app->add(new \Slim\Csrf\Guard);
use Slim\Middleware\TokenAuthentication;
use CryoConnectDB\FieldworkQuery;
use CryoConnectDB\ExpertsQuery;
use CryoConnectDB\FieldworkInformationSeekerQuery;

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

//fieldwork connect request token authentication
$fieldworkConnectAuthenticator = function(Slim\Http\Request $request, TokenAuthentication $tokenAuth) {

    # Search for token on header, parameter, cookie or attribute
    $token = $tokenAuth->findToken($request);
    $fieldworkInformationSeekerId = $request->getParam('id');
    $fieldworkInformationSeeker = FieldworkInformationSeekerQuery::create()->findOneById($fieldworkInformationSeekerId);
    $fieldworkToken = md5($fieldworkInformationSeeker->getInformationSeekerEmail() . $fieldworkInformationSeekerId);

    if ($fieldworkToken != $token) {
        throw new Exception("not authorized");
    }
};


$app->add(new TokenAuthentication([
    'path' => '/fieldwork/connect/approval/',
    'authenticator' => $fieldworkConnectAuthenticator,
    'parameter' => 't',
    'header' => 'Token-Authorization-X'
]));



//fieldwork connect show detail to information seeker page token authentication
$informationSeekerFieldworkDetailsAuthenticator = function(Slim\Http\Request $request, TokenAuthentication $tokenAuth) {

    # Search for token on header, parameter, cookie or attribute
    $token = $tokenAuth->findToken($request);
    $fieldworkInformationSeekerEmail = str_replace(' ', '+', $request->getParam('e'));
    $fieldworkInformationSeekers = FieldworkInformationSeekerQuery::create()->filterByApproved(true)->findByInformationSeekerEmail($fieldworkInformationSeekerEmail);

    $authenticated = false;
    foreach ($fieldworkInformationSeekers as $fieldworkInformationSeeker) {
        if (md5($fieldworkInformationSeeker->getInformationSeekerEmail() . $fieldworkInformationSeeker->hashCode()) == $token) {
            $authenticated = true;
            break;
        }
    }

    if (!$authenticated) {
        throw new Exception("not authorized" . $fieldworkInformationSeekers->toJSON());
    }
};


$app->add(new TokenAuthentication([
    'path' => '/fieldwork/connect/request',
    'authenticator' => $informationSeekerFieldworkDetailsAuthenticator,
    'parameter' => 't',
    'header' => 'Token-Authorization-X'
]));


//fieldwork connect applicant lust page token authentication
$fieldworkDashboardAuthenticator = function(Slim\Http\Request $request, TokenAuthentication $tokenAuth) {
    # Search for token on header, parameter, cookie or attribute
    $token = $tokenAuth->findToken($request);
    $fieldworkLeaderEmail = str_replace(' ', '+', $request->getParam('e'));
    $fieldworks = FieldworkQuery::create()->findByFieldworkLeaderEmail($fieldworkLeaderEmail);

    $authenticated = false;
    foreach ($fieldworks as $fieldwork) {
        if (md5($fieldwork->getFieldworkLeaderEmail() . $fieldwork->hashCode()) == $token) {
            $authenticated = true;
            break;
        }
    }

    if (!$authenticated) {
        throw new Exception("not authorized" . $fieldworkInformationSeekers->toJSON());
    }
};


$app->add(new TokenAuthentication([
    'path' => '/fieldwork/connect/dashboard',
    'authenticator' => $fieldworkDashboardAuthenticator,
    'parameter' => 't',
    'header' => 'Token-Authorization-X'
]));


//expert dashboard token authentication
$expertDashboardAuthenticator = function(Slim\Http\Request $request, TokenAuthentication $tokenAuth) {
    # Search for token on header, parameter, cookie or attribute
    $token = $tokenAuth->findToken($request);
    $expertEmail = str_replace(' ', '+', $request->getParam('e'));
    $expert = ExpertsQuery::create()->findOneByEmail($expertEmail);

    $authenticated = false;
    if (md5($expert->getEmail() . $expert->hashCode()) == $token) {
        $authenticated = true;
    }

    if (!$authenticated) {
        throw new Exception("not authorized" . $expert->toJSON());
    }
};


$app->add(new TokenAuthentication([
    'path' => '/experts/dashboard',
    'authenticator' => $expertDashboardAuthenticator,
    'parameter' => 't',
    'header' => 'Token-Authorization-X'
]));

//fieldwork connect applicant lust page token authentication
$ApiAuthenticator = function(Slim\Http\Request $request, TokenAuthentication $tokenAuth) {
    # Search for token on header, parameter, cookie or attribute
    $token = $tokenAuth->findToken($request);
    $apiToken = 'QMt9neFatRqGcUEX';


    $authenticated = false;
    if ($token == $apiToken) {
        $authenticated = true;
    }

    if (!$authenticated) {
        throw new Exception("not authorized");
    }
};


$app->add(new TokenAuthentication([
    'path' => '/api',
    'authenticator' => $ApiAuthenticator,
    'parameter' => 't',
    'header' => 'Token-Authorization-X'
]));

//add recaptcha Authentication
$recaptchaAuthentication = function(Slim\Http\Request $request, TokenAuthentication $tokenAuth) {
    # Search for token on header, parameter, cookie or attribute
    $captcha = $request->getParsedBody()['rt'];
    $secretKey = '6LeyIZ4UAAAAAN4fAqIZq5gztSzKuolohXsJAaQB';

    // post request to server
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array('secret' => $secretKey, 'response' => $captcha);

    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);

    $responseKeys = json_decode($response, true);

    $authenticated = false;
    if ($responseKeys["success"] == 'true') {
        $authenticated = true;
    }

    if (!$authenticated) {
        throw new Exception("not authorized");
    }
};

//recaptcha checks
$app->add(new TokenAuthentication([
    'path' => ['/fieldwork/new-request', '/fieldwork/connect/new-request', '/experts/new-request'],
    'authenticator' => $recaptchaAuthentication,
]));
