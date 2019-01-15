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


//Data Change Routes
$app->group('/api', function () {   
    //route to approval of cryosphere what
    $this->post('/approve-expert-cryosphere-what', DataController::class . ':addCryosphereWhatAction')->setName('cryosphere_what_approve');

    //route to edit and approval of cryosphere what
    $this->put('/update-expert-cryosphere-what', DataController::class . ':updateCryosphereWhatAction')->setName('cryosphere_what_update');

    //route to removal of cryosphere what
    $this->delete('/remove-expert-cryosphere-what', DataController::class . ':removeCryosphereWhatAction')->setName('cryosphere_what_remove');
    
    //route to approval of cryosphere what specefic
    $this->post('/approve-expert-cryosphere-what-specefic', DataController::class . ':addCryosphereWhatSpeceficAction')->setName('cryosphere_what_specefic_approve');

    //route to edit and approval of cryosphere what specefic
    $this->put('/update-expert-cryosphere-what-specefic', DataController::class . ':updateCryosphereWhatSpeceficAction')->setName('cryosphere_what_specefic_update');

    //route to removal of cryosphere what specefic
    $this->delete('/remove-expert-cryosphere-what-specefic', DataController::class . ':removeCryosphereWhatSpeceficAction')->setName('cryosphere_what_specefic_remove');

    
    //route to approval of cryosphere when
    $this->post('/approve-expert-cryosphere-when', DataController::class . ':addCryosphereWhenAction')->setName('cryosphere_when_approve');

    //route to edit and approval of cryosphere when
    $this->put('/update-expert-cryosphere-when', DataController::class . ':updateCryosphereWhenAction')->setName('cryosphere_when_update');

    //route to removal of cryosphere when
    $this->delete('/remove-expert-cryosphere-when', DataController::class . ':removeCryosphereWhenAction')->setName('cryosphere_when_remove');
    
    //route to approval of cryosphere methods
    $this->post('/approve-expert-cryosphere-methods', DataController::class . ':addCryosphereMethodsAction')->setName('cryosphere_methods_approve');

    //route to edit and approval of cryosphere methods
    $this->put('/update-expert-cryosphere-methods', DataController::class . ':updateCryosphereMethodsAction')->setName('cryosphere_methods_update');

    //route to removal of cryosphere methods
    $this->delete('/remove-expert-cryosphere-methods', DataController::class . ':removeCryosphereMethodsAction')->setName('cryosphere_methods_remove');
});