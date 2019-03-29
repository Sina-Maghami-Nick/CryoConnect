<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;

use CryoConnectDB\CryosphereWhereQuery;
use CryoConnectDB\FieldworkQuery;
use CryoConnectDB\Fieldwork;
use Slim\Http\Request;
use Slim\Http\Response;
use CryoConnectDB\FieldworkInformationSeekerQuery;
use CryoConnectDB\FieldworkInformationSeekerRequestQuery;

/**
 * Description of FieldworkController
 *
 * @author Sina
 */
class FieldworkController extends Controller {

    /**
     * 
     * @param Request $request
     * @param Response $response
     * @param type $args
     */
    public function registrationFormAction(Request $request, Response $response, $args) {

        $cryosphereWhere = CryosphereWhereQuery::create()->find();

        return $this->view->render(
                        $response, 'fieldworks/fieldwork-registration.html.twig', [
                    'cryosphere_where' => $cryosphereWhere->toArray(),
                        ]
        );
    }

    /**
     * 
     * @param type $request
     * @param type $response
     * @param type $args
     */
    public function registrationAction(Request $request, Response $response, $args) {

        $data = $request->getParsedBody();

        $this->container->get('logger')
                ->addInfo('A new fieldwork registration request recieved with data: ' . json_encode($data));

        $leaderEmailAddress = trim(strtolower(filter_var($data['leader_email'], FILTER_SANITIZE_EMAIL)));
        $leaderName = filter_var($data['leader_name'], FILTER_SANITIZE_STRING);
        $projectName = filter_var($data['project_name'], FILTER_SANITIZE_STRING);
        $cryosphereWhereId = filter_var($data['cryosphere_where'], FILTER_SANITIZE_NUMBER_INT);
        $leaderAffiliationName = filter_var($data['leader_affiliation'], FILTER_SANITIZE_STRING);
        $leaderWebsite = filter_var($data['leader_website'], FILTER_SANITIZE_URL);
        $projectWebsite = filter_var($data['project_website'], FILTER_SANITIZE_URL);
        $locations = filter_var($data['locations'], FILTER_SANITIZE_STRING);
        $startDate = strtotime($data['start_date']);
        $endDate = strtotime($data['end_date']);
        $scienteficGoals = filter_var($data['science_goals'], FILTER_SANITIZE_STRING);
        $informationSeekerLimit = filter_var($data['infomation_seeker_limit'], FILTER_SANITIZE_NUMBER_INT);
        $informationSeekerCost = filter_var($data['infomation_seeker_cost'], FILTER_SANITIZE_NUMBER_INT);
        $biddingAllowed = $data['biding_allowed'] ? true : false;
        $packageIncluded = filter_var($data['package_included'], FILTER_SANITIZE_STRING);
        $packageExcluded = filter_var($data['package_excluded'], FILTER_SANITIZE_STRING);
        $informationSeekerApplicationDeadline = strtotime($data['infomation_seeker_deadline']);
        $fieldworkCertain = $data['project_certain'] ? true : false;
        $fieldworkCertainDate = strtotime($data['project_certain_date']);
        $informationSeekerAnnouncmentDate = strtotime($data['infomation_seeker_announcment_date']);


        //rest of validations
        if (
                empty($leaderName) ||
                empty($cryosphereWhereId) ||
                empty($leaderEmailAddress) ||
                empty($leaderAffiliationName) ||
                empty($projectName) ||
                empty($locations) ||
                empty($startDate) ||
                empty($endDate) ||
                empty($informationSeekerLimit) ||
                empty($informationSeekerCost) ||
                empty($informationSeekerApplicationDeadline) ||
                empty($informationSeekerAnnouncmentDate) ||
                (!$fieldworkCertain && empty($fieldworkCertainDate))
        ) {
            $this->container->get('logger')
                    ->addError('Empty or wronge fileds for fieldtrip info recieved within the following request: ' . json_encode($data));
            $technicalAdminEmail = $this->container->get('settings')['contacts']['technical_admin'];
            $response->getBody()->write("Something went wrong! Please contact us at: " . $technicalAdminEmail);

            return $response->withStatus(400);
        }

        //creating a new fieldwork
        $fieldwork = new Fieldwork;

        $fieldwork
                ->setFieldworkName($projectName)
                ->setFieldworkLeaderName($leaderName)
                ->setFieldworkLeaderEmail($leaderEmailAddress)
                ->setFieldworkLeaderWebsite($leaderWebsite)
                ->setFieldworkLeaderAffiliation($leaderAffiliationName)
                ->setFieldworkProjectWebsite($projectWebsite)
                ->setFieldworkLocations($locations)
                ->setFieldworkEndDate($endDate)
                ->setFieldworkStartDate($startDate)
                ->setFieldworkGoal($scienteficGoals)
                ->setCryosphereWhereId($cryosphereWhereId)
                ->setFieldworkInformationSeekerLimit($informationSeekerLimit)
                ->setFieldworkInformationSeekerCost($informationSeekerCost)
                ->setFieldworkInformationSeekerDeadline($informationSeekerApplicationDeadline)
                ->setFieldworkBidingAllowed($biddingAllowed)
                ->setFieldworkInformationSeekerPackageIncluded($packageIncluded)
                ->setFieldworkInformationSeekerPackageExcluded($packageExcluded)
                ->setFieldworkIsCertain($fieldworkCertain)
                ->setFieldworkInformationSeekerAnnouncementDate($informationSeekerAnnouncmentDate)
        ;

        if (!$fieldworkCertain) {
            $fieldwork->setFieldworkWhenCertain($fieldworkCertainDate);
        }

        $fieldwork->save();

        $this->container->get('logger')
                ->addInfo('A new unvalidated fieldwork is added to the databse: ' . json_encode($fieldwork->toArray()));

        $approvalMsg = (new \Swift_Message('Please approve new expedition'))
                ->setFrom([$this->container->get('settings')['mailer']['username'] => 'Cryo Connect'])
                ->setTo($this->container->get('settings')['contacts']['approval_admin'])
                ->setBody(
                $this->view->render(new \Slim\Http\Response(), 'fieldworks/emails/fieldwork-approval-email.html.twig', [
                    'fieldwork' => $fieldwork->toArray(),
                    'token' => md5($fieldwork->getFieldworkLeaderEmail() . $fieldwork->getId()),
                        ]
                )->getBody(), 'text/html'
        );

        $this->mailer->send($approvalMsg);

        return $this->view->render(
                        $response, 'fieldworks/fieldwork-thank-you-page.html.twig', [
                    'leader_name' => $fieldwork->getFieldworkLeaderName(),
                        ]
        );
    }

    /**
     * 
     * @param Request $request
     * @param Response $response
     * @param type $args
     * @return Response
     */
    public function approvalAction(Request $request, Response $response, $args) {
        // your code
        // to access items in the container... $this->container->get('');
        $fieldworkId = $request->getQueryParams()['id'];
        $fieldwork = FieldworkQuery::create()->findOneById($fieldworkId);

        if (!isset($fieldwork) || empty($fieldwork)) {
            $this->container->get('logger')
                    ->addError('Wrong fieldwork ID passed to fieldwork validation page the query params are: ' . json_encode($request->getQueryParams()));
            $technicalAdminEmail = $this->container->get('settings')['contacts']['technical_admin'];
            $response->getBody()->write("Something went wrong! Please contact the technical admin at: " . $technicalAdminEmail);
            $response->withStatus(400);
            return $response;
        }

        $this->container->get('logger')
                ->addInfo('Fieldwork Validation page was accessed by a user for expert:' . json_encode($fieldwork->toArray()));
        return $this->view->render(
                        $response, 'fieldworks/fieldwork-approval.html.twig', [
                    'fieldwork' => $fieldwork->toArray(),
                    'fieldwork_cryosphere_where' => $fieldwork->getCryosphereWhere()->getCryosphereWhereName(),
                        ]
        );
    }

    /**
     * Approving fieldwork
     * @param type $request
     * @param type $response
     * @param type $args
     */
    public function approveFieldworkAction(Request $request, Response $response, $args) {
        $data = $request->getParsedBody();

        $fieldworkId = trim(filter_var($data['id'], FILTER_SANITIZE_NUMBER_INT));
        $fieldwork = FieldworkQuery::create()->filterByApproved(false)->findOneById($fieldworkId);

        if (
                empty($fieldworkId) ||
                empty($fieldwork->getId())
        ) {
            $this->container->get('logger')
                    ->addError('Empty or wronge fieldwork id recieved for fieldwork approval: ' . json_encode($data));
            $technicalAdminEmail = $this->container->get('settings')['contacts']['technical_admin'];
            $response->getBody()->write("Something went wrong! Please contact us at: " . $technicalAdminEmail);


            return $response->withStatus(400);
        }

        $fieldwork->setApproved(true);
        $fieldwork->save();
        $this->container->get('logger')
                ->addInfo('A new fieldwork has been approved. FieldworkId =' . $fieldwork->getId());

        $emailMsg = (new \Swift_Message('Confirmation of expedition registration'))
                ->setFrom([$this->container->get('settings')['mailer']['username'] => 'Cryo Connect'])
                ->setTo($fieldwork->getFieldworkLeaderEmail())
                ->setBody(
                $this->view->render(new \Slim\Http\Response(), 'fieldworks/emails/fieldwork-welcome-email.html.twig', [
                    'fieldwork_leader_name' => $fieldwork->getFieldworkLeaderName(),
                    'leader_email' => $fieldwork->getFieldworkLeaderEmail(),
                    'token' => md5($fieldwork->getFieldworkLeaderEmail() . $fieldwork->hashCode()),
                        ]
                )->getBody(), 'text/html'
        );

        $this->mailer->send($emailMsg);

        return $response->withStatus(200);
    }

    /**
     * Rejecting a fieldwork
     * 
     * @param Request $request
     * @param Response $response
     * @param type $args
     * @return type
     */
    public function rejectFieldworkAction(Request $request, Response $response, $args) {
        $data = $request->getParsedBody();

        $fieldworkId = trim(filter_var($data['id'], FILTER_SANITIZE_NUMBER_INT));
        $fieldwork = FieldworkQuery::create()->filterByApproved(false)->findOneById($fieldworkId);
        $explanation = trim(filter_var($data['explanation'], FILTER_SANITIZE_STRING));

        if (
                empty($fieldworkId) ||
                empty($fieldwork->getId())
        ) {
            $this->container->get('logger')
                    ->addError('Empty or wronge fieldwork id recieved for fieldwork approval: ' . json_encode($data));
            $technicalAdminEmail = $this->container->get('settings')['contacts']['technical_admin'];
            $response->getBody()->write("Something went wrong! Please contact us at: " . $technicalAdminEmail);

            return $response->withStatus(400);
        }


        $this->container->get('logger')
                ->addInfo('A fieldwork is being deleted. FieldworkEmail: ' . $fieldwork->getFieldworkLeaderEmail() . ' With explanation: ' . $explanation);

        $fieldwork->delete();

        $emailMsg = (new \Swift_Message('Rejection of expedition listing'))
                ->setFrom([$this->container->get('settings')['mailer']['username'] => 'Cryo Connect'])
                ->setTo($fieldwork->getFieldworkLeaderEmail())
                ->setBody(
                $this->view->render(new \Slim\Http\Response(), 'fieldworks/emails/fieldwork-rejection-email.html.twig', [
                    'fieldwork_leader_name' => $fieldwork->getFieldworkLeaderName(),
                    'explanation' => $explanation
                        ]
                )->getBody(), 'text/html'
        );

        $this->mailer->send($emailMsg);

        return $response->withStatus(200);
    }

    /**
     * @param type $request
     * @param type $response
     * @param type $args
     */
    public function fieldworkDashboardAction(Request $request, Response $response, $args) {
        // your code
        // to access items in the container... $this->container->get('');
        $fieldworkLeaderEmail = $request->getQueryParams()['e'];
        $token = $request->getQueryParams()['t'];

        $fieldworks = FieldworkQuery::create()->findByFieldworkLeaderEmail($fieldworkLeaderEmail);

        foreach ($fieldworks as $oneFieldwork) {
            if (md5($oneFieldwork->getFieldworkLeaderEmail() . $oneFieldwork->hashCode()) == $token) {
                $fieldwork = $oneFieldwork;
                break;
            }
        }

        $fieldworkInformationSeekerRequests = FieldworkInformationSeekerRequestQuery::create()
                ->filterByFieldwork($fieldwork)
                ->filterByApplicationSent(true)
                ->find();

        $this->container->get('logger')
                ->addInfo('Fieldwork applicant info was accessed by a leader:' . json_encode($fieldwork->toArray()));

        $applicants = array();
        $acceptedApplicantCount = 0;

        if (!empty($fieldworkInformationSeekerRequests)) {
            foreach ($fieldworkInformationSeekerRequests->toArray() as $key => $fieldworkInformationSeekerRequest) {
                $informationSeeker = FieldworkInformationSeekerQuery::create()->findOneById($fieldworkInformationSeekerRequest['FieldworkInformationSeekerId']);
                $applicants[$key]['Id'] = $informationSeeker->hashCode();
                $applicants[$key]['Name'] = $informationSeeker->getInformationSeekerName();
                $applicants[$key]['Email'] = $informationSeeker->getInformationSeekerEmail();
                $applicants[$key]['Website'] = $informationSeeker->getInformationSeekerWebsite();
                $applicants[$key]['Reasons'] = $informationSeeker->getInformationSeekerReasons();
                $applicants[$key]['Affiliation'] = $informationSeeker->getInformationSeekerAffiliation();
                $applicants[$key]['AffiliationWebsite'] = $informationSeeker->getInformationSeekerAffiliationWebsite();
                $applicants[$key]['Bid'] = $fieldworkInformationSeekerRequest['Bid'];
                $applicants[$key]['Accepted'] = $fieldworkInformationSeekerRequest['ApplicationAccepted'];
                $applicants[$key]['RequestedSpots'] = $informationSeeker->getInformationSeekerRequestedSpots();

                if ($applicants[$key]['Accepted']) {
                    $acceptedApplicantCount += $applicants[$key]['RequestedSpots'];
                }
            }
        }

        return $this->view->render(
                        $response, 'fieldworks/fieldwork-connect-applicants.html.twig', [
                    'applicants' => $applicants,
                    'accepted_applicant_count' => $acceptedApplicantCount,
                    'fieldworkId' => $fieldwork->hashCode(),
                    'fieldwork_leader_email' => $fieldwork->getFieldworkLeaderEmail(),
                    'fieldwork_name' => $fieldwork->getFieldworkName(),
                    'fieldwork_application_deadline' => $fieldwork->getFieldworkInformationSeekerDeadline(),
                    'fieldwork_website' => $fieldwork->getFieldworkProjectWebsite(),
                    'fieldwork_goal' => $fieldwork->getFieldworkGoal(),
                    'fieldwork_locations' => $fieldwork->getFieldworkLocations(),
                    'fieldwork_information_seeker_limit' => $fieldwork->getFieldworkInformationSeekerLimit(),
                    'fieldwork_cost' => $fieldwork->getFieldworkInformationSeekerCost(),
                    'fieldwork_cost_inc' => $fieldwork->getFieldworkInformationSeekerPackageIncluded(),
                    'fieldwork_cost_exc' => $fieldwork->getFieldworkInformationSeekerPackageExcluded(),
                    'fieldwork_start_date' => $fieldwork->getFieldworkStartDate(),
                    'fieldwork_end_date' => $fieldwork->getFieldworkEndDate(),
                    'fieldwork_application_deadline' => $fieldwork->getFieldworkInformationSeekerDeadline(),
                    'fieldwork_announcement_deadline' => $fieldwork->getFieldworkInformationSeekerAnnouncementDate(),
                    'fieldwork_leader_name' => $fieldwork->getFieldworkLeaderName(),
                    'fieldwork_leader_website' => $fieldwork->getFieldworkLeaderWebsite(),
                    'fieldwork_leader_affiliation' => $fieldwork->getFieldworkLeaderAffiliation(),
                        ]
        );
    }

    /**
     * @param type $request
     * @param type $response
     * @param type $args
     */
    public function fieldworkApplicantAcceptAction(Request $request, Response $response, $args) {
        $data = $request->getParsedBody();

        $fieldworkHash = trim(filter_var($data['id'], FILTER_SANITIZE_STRING));
        $fieldworkLeaderEmail = filter_var(str_replace(' ', '+', $data['e']), FILTER_SANITIZE_EMAIL);
        $informationSeekerHash = trim(filter_var($data['aph'], FILTER_SANITIZE_STRING));

        $fieldworks = FieldworkQuery::create()->findByFieldworkLeaderEmail($fieldworkLeaderEmail);

        foreach ($fieldworks as $oneFieldwork) {
            if ($oneFieldwork->hashCode() == $fieldworkHash) {
                $fieldwork = $oneFieldwork;
                break;
            }
        }

        $fieldworkInformationSeekerRequests = FieldworkInformationSeekerRequestQuery::create()->filterByFieldwork($fieldwork)->find();

        foreach ($fieldworkInformationSeekerRequests as $oneFieldworkInformationSeekerRequest) {
            if ($oneFieldworkInformationSeekerRequest->getFieldworkInformationSeeker()->hashCode() == $informationSeekerHash) {
                $fieldworkInformationSeekerRequest = $oneFieldworkInformationSeekerRequest;
                break;
            }
        }

        if (
                empty($fieldworkInformationSeekerRequest) ||
                empty($fieldwork) ||
                empty($fieldwork->getId())
        ) {
            $this->container->get('logger')
                    ->addError('Empty or wronge fieldwork id recieved for fieldwork applicant acceptance from dashboard: ' . json_encode($data));
            $technicalAdminEmail = $this->container->get('settings')['contacts']['technical_admin'];
            $response->getBody()->write("Something went wrong! Please contact us at: " . $technicalAdminEmail);

            return $response->withStatus(400);
        }

        $informationSeeker = $fieldworkInformationSeekerRequest->getFieldworkInformationSeeker();

        $this->container->get('logger')
                ->addInfo('A applicant fieldwork is being accepted by a leader. FieldworkID:' . $fieldwork->getId() . ' Infomration seeker ID: ' . $informationSeeker->getId());

        $fieldworkInformationSeekerRequest
                        ->setApplicationAccepted(true)
                ->save();

        $emailMsg = (new \Swift_Message('You are invited to join the expedition'))
                ->setFrom([$this->container->get('settings')['mailer']['username'] => 'Cryo Connect'])
                ->setTo($informationSeeker->getInformationSeekerEmail())
                ->setBody(
                $this->view->render(new \Slim\Http\Response(), 'information-seekers/emails/fieldwork-connect-application-accepted-email.html.twig', [
                    'fieldwork_information_seeker_name' => $informationSeeker->getInformationSeekerName(),
                    'fieldwork_leader_email' => $fieldwork->getFieldworkLeaderEmail(),
                    'fieldwork_leader_name' => $fieldwork->getFieldworkLeaderName(),
                    'fieldwork_name' => $fieldwork->getFieldworkName()
                        ]
                )->getBody(), 'text/html'
        );

        $this->mailer->send($emailMsg);

        return $response->withStatus(200);
    }

    /**
     * @param type $request
     * @param type $response
     * @param type $args
     */
    public function fieldworkApplicantRejectAction(Request $request, Response $response, $args) {

        $data = $request->getParsedBody();

        $fieldworkHash = trim(filter_var($data['id'], FILTER_SANITIZE_STRING));
        $fieldworkLeaderEmail = filter_var(str_replace(' ', '+', $data['e']), FILTER_SANITIZE_EMAIL);
        $informationSeekerHash = trim(filter_var($data['aph'], FILTER_SANITIZE_STRING));

        $fieldworks = FieldworkQuery::create()->findByFieldworkLeaderEmail($fieldworkLeaderEmail);

        foreach ($fieldworks as $oneFieldwork) {
            if ($oneFieldwork->hashCode() == $fieldworkHash) {
                $fieldwork = $oneFieldwork;
                break;
            }
        }

        $fieldworkInformationSeekerRequests = FieldworkInformationSeekerRequestQuery::create()->filterByFieldwork($fieldwork)->find();

        foreach ($fieldworkInformationSeekerRequests as $oneFieldworkInformationSeekerRequest) {
            if ($oneFieldworkInformationSeekerRequest->getFieldworkInformationSeeker()->hashCode() == $informationSeekerHash) {
                $fieldworkInformationSeekerRequest = $oneFieldworkInformationSeekerRequest;
                break;
            }
        }

        if (
                empty($fieldworkInformationSeekerRequest) ||
                empty($fieldwork) ||
                empty($fieldwork->getId())
        ) {
            $this->container->get('logger')
                    ->addError('Empty or wrong fieldwork id recieved for fieldwork applicant reject from dashboard: ' . json_encode($data));
            $technicalAdminEmail = $this->container->get('settings')['contacts']['technical_admin'];
            $response->getBody()->write("Something went wrong! Please contact us at: " . $technicalAdminEmail);

            return $response->withStatus(400);
        }

        $informationSeeker = $fieldworkInformationSeekerRequest->getFieldworkInformationSeeker();

        $this->container->get('logger')
                ->addInfo('A applicant fieldwork is being rejected by a leader. FieldworkID:' . $fieldwork->getId() . ' Infomration seeker ID: ' . $informationSeeker->getId());


        $fieldworkInformationSeekerRequest->delete();

        $emailMsg = (new \Swift_Message('You did not get selected to join the expedition'))
                ->setFrom([$this->container->get('settings')['mailer']['username'] => 'Cryo Connect'])
                ->setTo($informationSeeker->getInformationSeekerEmail())
                ->setBody(
                $this->view->render(new \Slim\Http\Response(), 'information-seekers/emails/fieldwork-connect-application-rejected-email.html.twig', [
                    'fieldwork_information_seeker_name' => $informationSeeker->getInformationSeekerName(),
                    'fieldwork_name' => $fieldwork->getFieldworkName()
                        ]
                )->getBody(), 'text/html'
        );

        $this->mailer->send($emailMsg);

        return $response->withStatus(200);
    }

    /**
     * @param type $request
     * @param type $response
     * @param type $args
     */
    public function fieldworkDeleteAction(Request $request, Response $response, $args) {

        $data = $request->getParsedBody();

        $fieldworkHash = trim(filter_var($data['id'], FILTER_SANITIZE_STRING));
        $fieldworkLeaderEmail = filter_var(str_replace(' ', '+', $data['e']), FILTER_SANITIZE_EMAIL);

        $fieldworks = FieldworkQuery::create()->findByFieldworkLeaderEmail($fieldworkLeaderEmail);

        foreach ($fieldworks as $oneFieldwork) {
            if ($oneFieldwork->hashCode() == $fieldworkHash) {
                $fieldwork = $oneFieldwork;
                break;
            }
        }

        if (
                empty($fieldwork) ||
                empty($fieldwork->getId())
        ) {
            $this->container->get('logger')
                    ->addError('Empty or wronge fieldwork id recieved for fieldwork deletation from dashboard: ' . json_encode($data));
            $technicalAdminEmail = $this->container->get('settings')['contacts']['technical_admin'];
            $response->getBody()->write("Something went wrong! Please contact us at: " . $technicalAdminEmail);

            return $response->withStatus(400);
        }


        $this->container->get('logger')
                ->addInfo('A fieldwork is being deleted by a leader. FieldworkEmail: ' . $fieldwork->getFieldworkLeaderEmail() . ' With explanation: ' . $explanation);


        $fieldworkInformationSeekerRequests = FieldworkInformationSeekerRequestQuery::create()
                ->filterByFieldwork($fieldwork)
                ->filterByApplicationSent(true)
                ->find();

        if (!empty($fieldworkInformationSeekerRequests)) {
            foreach ($fieldworkInformationSeekerRequests->toArray() as $key => $fieldworkInformationSeekerRequest) {
                $informationSeeker = FieldworkInformationSeekerQuery::create()->findOneById($fieldworkInformationSeekerRequest['FieldworkInformationSeekerId']);

                $emailMsg = (new \Swift_Message('An expedition has been cancelled'))
                        ->setFrom([$this->container->get('settings')['mailer']['username'] => 'Cryo Connect'])
                        ->setTo($informationSeeker->getInformationSeekerEmail())
                        ->setBody(
                        $this->view->render(new \Slim\Http\Response(), 'information-seekers/emails/fieldwork-deleted-email.html.twig', [
                            'fieldwork_information_seeker_name' => $informationSeeker->getInformationSeekerName(),
                            'fieldwork_leader_email' => $fieldwork->getFieldworkLeaderEmail(),
                            'fieldwork_name' => $fieldwork->getFieldworkName()
                                ]
                        )->getBody(), 'text/html'
                );

                $this->mailer->send($emailMsg);
            }
        }

        $fieldwork->delete();

        return $response->withStatus(200);
    }

    /**
     * @param type $request
     * @param type $response
     * @param type $args
     */
    public function fieldworkEditAction(Request $request, Response $response, $args) {

        $data = $request->getParsedBody();

        $fieldworkHash = trim(filter_var($data['id'], FILTER_SANITIZE_STRING));
        $fieldworkLeaderEmail = filter_var(str_replace(' ', '+', $data['e']), FILTER_SANITIZE_EMAIL);

        $fieldworks = FieldworkQuery::create()->findByFieldworkLeaderEmail($fieldworkLeaderEmail);

        foreach ($fieldworks as $oneFieldwork) {
            if ($oneFieldwork->hashCode() == $fieldworkHash) {
                $fieldwork = $oneFieldwork;
                break;
            }
        }

        if (
                empty($fieldwork) ||
                empty($fieldwork->getId())
        ) {
            $this->container->get('logger')
                    ->addError('Empty or wronge fieldwork id recieved for fieldwork editation from dashboard: ' . json_encode($data));
            $technicalAdminEmail = $this->container->get('settings')['contacts']['technical_admin'];
            $response->getBody()->write("Something went wrong! Please contact us at: " . $technicalAdminEmail);

            return $response->withStatus(400);
        }

        $leaderName = filter_var($data['leader_name'], FILTER_SANITIZE_STRING);
        $projectName = filter_var($data['project_name'], FILTER_SANITIZE_STRING);
        $leaderAffiliationName = filter_var($data['leader_affiliation'], FILTER_SANITIZE_STRING);
        $leaderWebsite = filter_var($data['leader_website'], FILTER_SANITIZE_URL);
        $projectWebsite = filter_var($data['project_website'], FILTER_SANITIZE_URL);
        $locations = filter_var($data['locations'], FILTER_SANITIZE_STRING);
        $scienteficGoals = filter_var($data['science_goals'], FILTER_SANITIZE_STRING);
        $informationSeekerLimit = filter_var($data['infomation_seeker_limit'], FILTER_SANITIZE_NUMBER_INT);
        $informationSeekerCost = filter_var($data['infomation_seeker_cost'], FILTER_SANITIZE_NUMBER_INT);
        $packageIncluded = filter_var($data['package_included'], FILTER_SANITIZE_STRING);
        $packageExcluded = filter_var($data['package_excluded'], FILTER_SANITIZE_STRING);
        $informationSeekerApplicationDeadline = strtotime($data['infomation_seeker_deadline']);
        $informationSeekerAnnouncmentDate = strtotime($data['infomation_seeker_announcment_date']);


        $this->container->get('logger')
                ->addInfo('A fieldwork is being edited by a leader. FieldworkEmail: ' . $fieldwork->getFieldworkLeaderEmail() . ' With explanation: ' . $explanation);

        if (!empty($leaderName)) {
            $fieldwork->setFieldworkLeaderName($leaderName);
        }

        if (!empty($projectName)) {
            $fieldwork->setFieldworkName($projectName);
        }

        if (!empty($leaderAffiliationName)) {
            $fieldwork->setFieldworkLeaderAffiliation($leaderAffiliationName);
        }

        if (!empty($leaderWebsite)) {
            $fieldwork->setFieldworkLeaderWebsite($leaderWebsite);
        }

        if (!empty($projectWebsite)) {
            $fieldwork->setFieldworkProjectWebsite($projectWebsite);
        }

        if (!empty($locations)) {
            $fieldwork->setFieldworkLocations($locations);
        }

        if (!empty($scienteficGoals)) {
            $fieldwork->setFieldworkGoal($scienteficGoals);
        }

        if (!empty($informationSeekerLimit) && ($informationSeekerLimit > $fieldwork->getFieldworkInformationSeekerLimit())) {
            $fieldwork->setFieldworkInformationSeekerLimit($informationSeekerLimit);
        }

        if (!empty($informationSeekerCost)) {
            $fieldwork->setFieldworkInformationSeekerCost($informationSeekerCost);
        }

        if (!empty($packageIncluded)) {
            $fieldwork->setFieldworkInformationSeekerPackageIncluded($packageIncluded);
        }

        if (!empty($packageExcluded)) {
            $fieldwork->setFieldworkInformationSeekerPackageExcluded($packageExcluded);
        }

        if (!empty($informationSeekerApplicationDeadline)) {
            $fieldwork->setFieldworkInformationSeekerDeadline($informationSeekerApplicationDeadline);
        }

        if (!empty($informationSeekerAnnouncmentDate)) {
            $fieldwork->setFieldworkInformationSeekerAnnouncementDate($informationSeekerAnnouncmentDate);
        }

        $fieldworkInformationSeekerRequests = FieldworkInformationSeekerRequestQuery::create()
                ->filterByFieldwork($fieldwork)
                ->filterByApplicationSent(true)
                ->find();

        if (!empty($fieldworkInformationSeekerRequests)) {
            foreach ($fieldworkInformationSeekerRequests->toArray() as $key => $fieldworkInformationSeekerRequest) {
                $informationSeeker = FieldworkInformationSeekerQuery::create()->findOneById($fieldworkInformationSeekerRequest['FieldworkInformationSeekerId']);

                $emailMsg = (new \Swift_Message('An expedition has been updated'))
                        ->setFrom([$this->container->get('settings')['mailer']['username'] => 'Cryo Connect'])
                        ->setTo($informationSeeker->getInformationSeekerEmail())
                        ->setBody(
                        $this->view->render(new \Slim\Http\Response(), 'information-seekers/emails/fieldwork-updated-email.html.twig', [
                            'fieldwork_information_seeker_name' => $informationSeeker->getInformationSeekerName(),
                            'fieldwork_name' => $fieldwork->getFieldworkName(),
                            'fieldwork_hash' => $fieldwork->hashCode(),
                            'email' => $informationSeeker->getInformationSeekerEmail(),
                            'token' => md5($informationSeeker->getInformationSeekerEmail() . $informationSeeker->hashCode())
                                ]
                        )->getBody(), 'text/html'
                );

                $this->mailer->send($emailMsg);
            }
        }

        $fieldwork->save();

        return $response->withStatus(200);
    }

    /**
     * Rendering a form for information seekers to search for 
     * 
     * @param Request $request
     * @param Response $response
     * @param type $args
     */
    public function searchFormAction(Request $request, Response $response, $args) {

        $cryosphereWhere = CryosphereWhereQuery::create()->find();

        return $this->view->render(
                        $response, 'fieldworks/fieldwork-connect.html.twig', [
                    'cryosphere_where' => $cryosphereWhere->toArray(),
                        ]
        );
    }

    /**
     * 
     * @param Request $request
     * @param Response $response
     * @param type $args
     */
    public function searchAction(Request $request, Response $response, $args) {

        $data = $request->getQueryParams();

        $cryosphereWhereId = filter_var_array($data['cryosphere_where'], FILTER_SANITIZE_NUMBER_INT);
        $dateRange = filter_var_array(explode(' to ', $data['range_date']), FILTER_SANITIZE_STRING);
        $fromDate = strtotime($dateRange[0]);
        $toDate = strtotime($dateRange[1]);

        if (
                empty($cryosphereWhereId) ||
                empty($dateRange) ||
                empty($fromDate) ||
                empty($toDate)
        ) {
            $this->container->get('logger')
                    ->addError('Empty or wronge fileds for fieldtrip connect search info recieved within the following request: ' . json_encode($data));
            $technicalAdminEmail = $this->container->get('settings')['contacts']['technical_admin'];
            $response->getBody()->write("Something went wrong! Please contact us at: " . $technicalAdminEmail);

            return $response->withStatus(400);
        }

        $fieldworks = FieldworkQuery::create()->filterByCryosphereWhereId($cryosphereWhereId)
                ->filterByApproved(true)
                ->filterByFieldworkInformationSeekerDeadline(array('min' => date()))
                ->filterByFieldworkStartDate(array('max' => $toDate))
                ->filterByFieldworkEndDate(array('min' => $fromDate))
                ->find();

        $minFieldworkInfo = array();
        foreach ($fieldworks->toArray() as $key => $fieldwork) {
            $minFieldworkInfo[$key]['Id'] = $fieldwork['Id'];
            $minFieldworkInfo[$key]['FieldworkName'] = $fieldwork['FieldworkName'];
            $minFieldworkInfo[$key]['FieldworkLocations'] = $fieldwork['FieldworkLocations'];
            $minFieldworkInfo[$key]['FieldworkStartDate'] = $fieldwork['FieldworkStartDate'];
            $minFieldworkInfo[$key]['FieldworkEndDate'] = $fieldwork['FieldworkEndDate'];
            $minFieldworkInfo[$key]['FieldworkGoal'] = $fieldwork['FieldworkGoal'];
            $minFieldworkInfo[$key]['FieldworkInformationSeekerDeadline'] = $fieldwork['FieldworkInformationSeekerDeadline'];
            $minFieldworkInfo[$key]['FieldworkRegion'] = CryosphereWhereQuery::create()
                    ->findOneById($fieldwork['CryosphereWhereId'])
                    ->getCryosphereWhereName();
        }

        return $this->view->render(
                        $response, 'fieldworks/fieldwork-connect-search.html.twig', [
                    'fieldworks' => $minFieldworkInfo,
                    'cryosphere_where' => CryosphereWhereQuery::create()->find()->toArray()
                        ]
        );
    }

    /**
     * Checking if leader email exists
     */
    public function leaderExistCheckAction(Request $request, Response $response, $args) {
        $data = $request->getParsedBody();
        $emailAddress = trim(strtolower(filter_var($data['email'], FILTER_SANITIZE_EMAIL)));

        if (
                !FieldworkQuery::create()->findOneByFieldworkLeaderEmail($emailAddress)
        ) {
            return $response->withStatus(400);
        }

        return $response->withStatus(200);
    }

}
