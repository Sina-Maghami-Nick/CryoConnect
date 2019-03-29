<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Controllers\ExpertsController;
use App\Controllers\InformationSeekersController;
use App\Controllers\DataController;
use App\Controllers\FieldworkController;

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


//Fieldworks Routes
$app->group('/fieldwork', function () {
    //route to the fieldwork sign-up form
    $this->get('/register', FieldworkController::class . ':registrationFormAction');

    //route to the fieldwork sign-up form
    $this->get('/connect', FieldworkController::class . ':searchFormAction');

    //route to the fieldwork sign-up form
    $this->get('/connect/search', FieldworkController::class . ':searchAction')->setName('fieldwork_connect_search');

    //route to the fieldwork save data
    $this->post('/new-request', FieldworkController::class . ':registrationAction')->setName('fieldwork-registration');

    //route to the fieldwork approval page
    $this->get('/approval', FieldworkController::class . ':approvalAction')->setName('fieldwork_approval');

    //route to approve fieldwork
    $this->put('/approval/approve-fieldwork', FieldworkController::class . ':approveFieldworkAction')->setName('fieldwork_approve');

    //route to reject fieldwork
    $this->delete('/approval/reject-fieldwork', FieldworkController::class . ':rejectFieldworkAction')->setName('fieldwork_reject');

    //route to check if leader's email exists
    $this->post('/email-exist-check', FieldworkController::class . ':leaderExistCheckAction')->setName('leader_check_email');

    //route to the fieldwork sign-up form
    $this->post('/connect/new-request', InformationSeekersController::class . ':fieldworkRequestAction')->setName('fieldwork_connect_new_request');

    //route to the fieldwork approval page
    $this->get('/connect/approval', InformationSeekersController::class . ':fieldworkRequestApprovalPageAction')->setName('fieldwork_connect_approval');

    //route to approve fieldwork information seeker
    $this->put('/connect/approval/approve-fieldwork-information-seeker', InformationSeekersController::class . ':approveFieldworkRequestAction')->setName('fieldwork_information_seeker_approve');

    //route to reject fieldwork information seeker
    $this->delete('/connect/approval/reject-fieldwork-information-seeker', InformationSeekersController::class . ':rejectFieldworkRequestAction')->setName('fieldwork_information_seeker_reject');

    //route to fieldwork-detail for information seeker
    $this->get('/connect/request/exhibition-details', InformationSeekersController::class . ':fieldworkDetailPageAction')->setName('fieldwork_detail');

    //route to fieldwork-detail for information seeker
    $this->post('/connect/request/submit', InformationSeekersController::class . ':fieldworkBidSubmissionAction')->setName('fieldwork_bid_request_submit');

    //route to fieldwork dashboard
    $this->get('/connect/dashboard', FieldworkController::class . ':fieldworkDashboardAction')->setName('fieldwork_dashboard');
    
    //route to fieldwork removeforever
    $this->delete('/connect/dashboard/delete', FieldworkController::class . ':fieldworkDeleteAction')->setName('fieldwork_delete');
    
    //route to fieldwork edit
    $this->put('/connect/dashboard/edit', FieldworkController::class . ':fieldworkEditAction')->setName('fieldwork_edit');
    
    //route to fieldwork applicant accept
    $this->post('/connect/dashboard/applicant/accept', FieldworkController::class . ':fieldworkApplicantAcceptAction')->setName('fieldwork_applicant_accept');
    
    //route to fieldwork applicant reject
    $this->post('/connect/dashboard/applicant/reject', FieldworkController::class . ':fieldworkApplicantRejectAction')->setName('fieldwork_applicant_reject');
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
