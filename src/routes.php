<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Controllers\ExpertsController;
use App\Controllers\InformationSeekersController;

//Experts Routes
$app->group('/experts', function () {
//route to the expert sign-up form
    $this->get('/sign-up', ExpertsController::class . ':signup');

//route to the expert save data
    $this->post('/new-request', ExpertsController::class . ':newRequest');

//route to the expert thank you page
    $this->get('/request-sent', ExpertsController::class . ':requestSent');
});


//Information Seeker Routes
$app->group('/information-seekers', function () {
//route to the information seeker request form
    $this->get('/sign-up', InformationSeekersController::class . ':signup');

//route to the information seeker save data
    $this->get('/new-request', InformationSeekersController::class . ':newRequest');

//route to the expert thank you page
    $this->get('/request-sent', InformationSeekersController::class . ':requestSent');
});
