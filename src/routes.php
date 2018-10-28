<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Controllers\ExpertsController;
use App\Controllers\InformationSeekersController;

//Experts Routes
$app->group('/experts', function () {
//route to the expert sign-up form
    $this->get('/sign-up', ExpertsController::class . ':signupAction');

//route to the expert save data
    $this->post('/new-request', ExpertsController::class . ':saveAction');

//route to the expert thank you page
    $this->get('/request-sent', ExpertsController::class . ':resultAction');
});


//Information Seeker Routes
$app->group('/information-seekers', function () {
//route to the information seeker request form
    $this->get('/sign-up', InformationSeekersController::class . ':signupAction');

//route to the information seeker save data
    $this->get('/new-request', InformationSeekersController::class . ':saveAction');

//route to the expert thank you page
    $this->get('/request-sent', InformationSeekersController::class . ':resultAction');
});
