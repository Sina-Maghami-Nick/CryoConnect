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
                        $response, 'fieldwork-registration.html.twig', [
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
        $duration = filter_var($data['duration'], FILTER_SANITIZE_NUMBER_INT);
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
                empty($duration) ||
                empty($informationSeekerLimit) ||
                empty($informationSeekerCost) ||
                empty($informationSeekerApplicationDeadline) ||
                empty($informationSeekerAnnouncmentDate) ||
                (!$fieldworkCertain && empty($fieldworkCertainDate)) ||
                FieldworkQuery::create()->findOneByFieldworkLeaderEmail($leaderEmailAddress)
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
                ->setFieldworkDuration($duration)
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

        $approvalMsg = (new \Swift_Message('Approval of new fieldwork expert: ' . $leaderName))
                ->setFrom([$this->container->get('settings')['mailer']['username'] => 'Cryoconnect'])
                ->setTo($this->container->get('settings')['contacts']['approval_admin'])
                ->setBody(
                $this->view->render(new \Slim\Http\Response(), 'emails/fieldwork-approval-email.html.twig', [
                    'fieldwork' => $fieldwork->toArray(),
                    'token' => md5($fieldwork->getFieldworkLeaderEmail() . $fieldwork->getId()),
                        ]
                )->getBody(), 'text/html'
        );

        $this->mailer->send($approvalMsg);

        return $this->view->render(
                        $response, 'fieldwork-thank-you-page.html.twig', [
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
                        $response, 'fieldwork-approval.html.twig', [
                    'fieldwork' => $fieldwork->toArray(),
                    'fieldwork_cryosphere_where' => $fieldwork->getCryosphereWhere()->getCryosphereWhereName(),
                        ]
        );
    }

    /**
     * Approving expert
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

        $emailMsg = (new \Swift_Message('Your fieldwork is registered at Cryo Connect now'))
                ->setFrom([$this->container->get('settings')['mailer']['username'] => 'Cryoconnect'])
                ->setTo($fieldwork->getFieldworkLeaderEmail())
                ->setBody(
                $this->view->render(new \Slim\Http\Response(), 'emails/fieldwork-welcome-email.html.twig', [
                    'fieldwork_leader_name' => $fieldwork->getFieldworkLeaderName(),
                        ]
                )->getBody(), 'text/html'
        );

        $this->mailer->send($emailMsg);

        return $response->withStatus(200);
    }

    /**
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

        $emailMsg = (new \Swift_Message('Sorry Cryoconnect could not approve your request'))
                ->setFrom([$this->container->get('settings')['mailer']['username'] => 'Cryoconnect'])
                ->setTo($fieldwork->getFieldworkLeaderEmail())
                ->setBody(
                $this->view->render(new \Slim\Http\Response(), 'emails/fieldwork-rejection-email.html.twig', [
                    'fieldwork_leader_name' => $fieldwork->getFieldworkLeaderName(),
                    'explanation' => $explanation
                        ]
                )->getBody(), 'text/html'
        );

        $this->mailer->send($emailMsg);

        return $response->withStatus(200);
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
