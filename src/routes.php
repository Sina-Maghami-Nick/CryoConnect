<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Controllers\ExpertsController;
use App\Controllers\InformationSeekersController;
use App\Controllers\DataController;

//Experts Routes
$app->group('/experts', function () {
    //route to the expert sign-up form
    $this->get('/sign-up', ExpertsController::class . ':signupFormAction');

    //route to the expert save data
    $this->post('/new-request', ExpertsController::class . ':signupAction')->setName('expert_signup');

    //route to the expert approval page
    $this->get('/approval', ExpertsController::class . ':approvalAction')->setName('expert_approval');
    
    //route to approve expert
    $this->put('/approval/approve-expert', ExpertsController::class . ':approveExpertAction')->setName('expert_approve');
    
    //route to reject expert
    $this->delete('/approval/reject-expert', ExpertsController::class . ':rejectExpertAction')->setName('expert_reject');
    
    //route to check if expert email exists
    $this->post('/email-exist-check', ExpertsController::class . ':expertEmailExistCheckAction')->setName('expert_check_email');    
});

//Information Seeker Routes
$app->group('/information-seekers', function () {
    //route to the information seeker request form
    $this->get('/sign-up', InformationSeekersController::class . ':signupFormAction');

    //route to the information seeker save data
    $this->get('/new-request', InformationSeekersController::class . ':signupAction');

    //route to the information seeker thank you page
    $this->get('/request-sent', InformationSeekersController::class . ':resultAction');
});