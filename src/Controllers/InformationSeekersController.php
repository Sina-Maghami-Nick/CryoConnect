<?php

namespace App\Controllers;

use CryoConnectDB\FieldworkQuery;
use CryoConnectDB\FieldworkInformationSeeker;
use CryoConnectDB\FieldworkInformationSeekerQuery;
use CryoConnectDB\CryosphereWhereQuery;
use CryoConnectDB\FieldworkInformationSeekerRequestQuery;
use Slim\Http\Request;
use Slim\Http\Response;

class InformationSeekersController extends Controller {

    public function signupFormAction($request, $response, $args) {
        // your code
        // to access items in the container... $this->container->get('');
        $response->getBody()->write("Hello test");
        return $response;
    }

    public function signupAction($request, $response, $args) {
        // your code
        // to access items in the container... $this->container->get('');
        $response->getBody()->write("Hello test2");
        return $response;
    }

    public function resultAction($request, $response, $args) {
        // your code
        // to access items in the container... $this->container->get('');
        $response->getBody()->write("Hello test3");
        return $response;
    }

    /**
     * 
     * @param type $request
     * @param type $response
     * @param type $args
     */
    public function fieldworkRequestAction(Request $request, Response $response, $args) {

        $data = $request->getParsedBody();

        $this->container->get('logger')
                ->addInfo('A new fieldwork connect request recieved with data: ' . json_encode($data));

        $informationSeekerEmailAddress = trim(strtolower(filter_var($data['information_seeker_email'], FILTER_SANITIZE_EMAIL)));
        $informationSeekerName = filter_var($data['information_seeker_name'], FILTER_SANITIZE_STRING);
        $requestedFieldworkIds = filter_var_array($data['fieldwork_ids'], FILTER_SANITIZE_STRING);
        $informationSeekerAffiliationName = filter_var($data['information_seeker_affiliation'], FILTER_SANITIZE_STRING);
        $informationSeekerWebsite = filter_var($data['information_seeker_website'], FILTER_SANITIZE_URL);
        $informationSeekerAffiliationWebsite = filter_var($data['information_seeker_affiliation_website'], FILTER_SANITIZE_URL);
        $informationSeekerReasons = filter_var($data['information_seeker_reasons'], FILTER_SANITIZE_STRING);

        //rest of validations
        if (
                empty($informationSeekerEmailAddress) ||
                empty($informationSeekerName) ||
                empty($requestedFieldworkIds) ||
                empty($informationSeekerAffiliationName) ||
                empty($informationSeekerWebsite) ||
                empty($informationSeekerAffiliationWebsite) ||
                empty($informationSeekerReasons)
        ) {
            $this->container->get('logger')
                    ->addError('Empty or wronge fileds for fieldwork connect request recieved with the following request: ' . json_encode($data));
            $technicalAdminEmail = $this->container->get('settings')['contacts']['technical_admin'];
            $response->getBody()->write("Something went wrong! Please contact us at: " . $technicalAdminEmail);

            return $response->withStatus(400);
        }

        $fieldworkInformationSeeker = new FieldworkInformationSeeker;

        $fieldworkInformationSeeker
                ->setInformationSeekerName($informationSeekerName)
                ->setInformationSeekerEmail($informationSeekerEmailAddress)
                ->setInformationSeekerWebsite($informationSeekerWebsite)
                ->setInformationSeekerAffiliation($informationSeekerAffiliationName)
                ->setInformationSeekerAffiliationWebsite($informationSeekerAffiliationWebsite)
                ->setInformationSeekerReasons($informationSeekerReasons);

        foreach ($requestedFieldworkIds as $requestedFieldworkId) {
            $fieldwork = FieldworkQuery::create()->findOneById($requestedFieldworkId);

            if (empty($fieldwork)) {
                $this->container->get('logger')
                        ->addError('Wrong fieldwork Id passed from frontend: ' . json_encode($data));
                $technicalAdminEmail = $this->container->get('settings')['contacts']['technical_admin'];
                $response->getBody()->write("Something went wrong! Please contact us at: " . $technicalAdminEmail);

                return $response->withStatus(400);
            }

            $fieldworkInformationSeeker->addFieldwork($fieldwork);
        }

        $fieldworkInformationSeeker->save();

        $this->container->get('logger')
                ->addInfo('A new unvalidated fieldwork information seeker request is added to the databse: ' . json_encode($fieldwork->toArray()));

        $approvalMsg = (new \Swift_Message('Approval of new fieldwork connect request: ' . $leaderName))
                ->setFrom([$this->container->get('settings')['mailer']['username'] => 'Cryoconnect'])
                ->setTo($this->container->get('settings')['contacts']['approval_admin'])
                ->setBody(
                $this->view->render(new \Slim\Http\Response(), 'information-seekers/emails/fieldwork-connect-approval-email.html.twig', [
                    'fieldwork_information_seeker' => $fieldworkInformationSeeker->toArray(),
                    'token' => md5($fieldworkInformationSeeker->getInformationSeekerEmail() . $fieldworkInformationSeeker->getId()),
                        ]
                )->getBody(), 'text/html'
        );

        $this->mailer->send($approvalMsg);

        return $this->view->render(
                        $response, 'information-seekers/fieldwork-connect-thank-you-page.html.twig', [
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
    public function fieldworkRequestApprovalPageAction(Request $request, Response $response, $args) {
        // your code
        // to access items in the container... $this->container->get('');
        $fieldworkInformationSeekerId = $request->getQueryParams()['id'];
        $fieldworkInformationSeeker = FieldworkInformationSeekerQuery::create()->findOneById($fieldworkInformationSeekerId);

        if (!isset($fieldworkInformationSeeker) || empty($fieldworkInformationSeeker)) {
            $this->container->get('logger')
                    ->addError('Wrong fieldwork infromation seeker ID passed to fieldwork validation page the query params are: ' . json_encode($request->getQueryParams()));
            $technicalAdminEmail = $this->container->get('settings')['contacts']['technical_admin'];
            $response->getBody()->write("Something went wrong! Please contact the technical admin at: " . $technicalAdminEmail);
            $response->withStatus(400);
            return $response;
        }

        $this->container->get('logger')
                ->addInfo('Fieldwork Information seeker connect validation page was accessed by a user for expert:' . json_encode($fieldworkInformationSeeker->toArray()));
        return $this->view->render(
                        $response, 'information-seekers/fieldwork-connect-approval.html.twig', [
                    'fieldwork_information_seeker' => $fieldworkInformationSeeker->toArray(),
                    'fieldworks' => $fieldworkInformationSeeker->getFieldworkInformationSeekerRequestsJoinFieldwork()->toArray(),
                        ]
        );
    }

    /**
     * viewing field work details to information seeker
     * 
     * @param Request $request
     * @param Response $response
     * @param type $args
     * @return Response
     */
    public function fieldworkDetailPageAction(Request $request, Response $response, $args) {
        // your code
        // to access items in the container... $this->container->get('');
        $fieldworkInformationSeekerEmail = $request->getQueryParams()['e'];
        $token = $request->getQueryParams()['t'];
        $fieldworkInformationSeekers = FieldworkInformationSeekerQuery::create()->filterByApproved(true)->findByInformationSeekerEmail($fieldworkInformationSeekerEmail);

        foreach ($fieldworkInformationSeekers as $informationSeeker) {
            if (md5($informationSeeker->getInformationSeekerEmail() . $informationSeeker->hashCode()) == $token) {
                $fieldworkInformationSeeker = $informationSeeker;
                break;
            }
        }

        if (!isset($fieldworkInformationSeeker) || empty($fieldworkInformationSeeker)) {
            $this->container->get('logger')
                    ->addError('Wrong fieldwork infromation seeker Hash passed to fieldwork detail page the query params are: ' . json_encode($request->getQueryParams()));
            $technicalAdminEmail = $this->container->get('settings')['contacts']['technical_admin'];
            $response->getBody()->write("Something went wrong! Please contact the technical admin at: " . $technicalAdminEmail);
            $response->withStatus(400);
            return $response;
        }

        $this->container->get('logger')
                ->addInfo('Fieldwork Information seeker detail info was accessed by an information seeker:' . json_encode($fieldworkInformationSeeker->toArray()));

        $fieldworkInfo = array();
        $fieldworkRequests = $fieldworkInformationSeeker->getFieldworkInformationSeekerRequestsJoinFieldwork()->toArray();
        foreach ($fieldworkRequests as $key => $fieldworkRequest) {
            $fieldworkInfo[$key]['Id'] = FieldworkQuery::create()->findOneById($fieldworkRequest['Fieldwork']['Id'])->hashCode();
            $fieldworkInfo[$key]['ApplicationSent'] = $fieldworkRequest['ApplicationSent'];
            $fieldworkInfo[$key]['Bid'] = $fieldworkRequest['Bid'];
            $fieldworkInfo[$key]['FieldworkName'] = $fieldworkRequest['Fieldwork']['FieldworkName'];
            $fieldworkInfo[$key]['FieldworkLocations'] = $fieldworkRequest['Fieldwork']['FieldworkLocations'];
            $fieldworkInfo[$key]['FieldworkStartDate'] = $fieldworkRequest['Fieldwork']['FieldworkStartDate'];
            $fieldworkInfo[$key]['FieldworkDuration'] = $fieldworkRequest['Fieldwork']['FieldworkDuration'];
            $fieldworkInfo[$key]['FieldworkInformationSeekerDeadline'] = $fieldworkRequest['Fieldwork']['FieldworkInformationSeekerDeadline'];
            $fieldworkInfo[$key]['FieldworkRegion'] = CryosphereWhereQuery::create()
                    ->findOneById($fieldworkRequest['Fieldwork']['CryosphereWhereId'])
                    ->getCryosphereWhereName();
            $fieldworkInfo[$key]['FieldworkGoal'] = $fieldworkRequest['Fieldwork']['FieldworkGoal'];
            $fieldworkInfo[$key]['FieldworkStartDate'] = $fieldworkRequest['Fieldwork']['FieldworkStartDate'];
            $fieldworkInfo[$key]['FieldworkInformationSeekerCost'] = $fieldworkRequest['Fieldwork']['FieldworkInformationSeekerCost'];
            $fieldworkInfo[$key]['FieldworkBidingAllowed'] = $fieldworkRequest['Fieldwork']['FieldworkBidingAllowed'];
            $fieldworkInfo[$key]['FieldworkInformationSeekerPackageIncluded'] = $fieldworkRequest['Fieldwork']['FieldworkInformationSeekerPackageIncluded'];
            $fieldworkInfo[$key]['FieldworkInformationSeekerPackageExcluded'] = $fieldworkRequest['Fieldwork']['FieldworkInformationSeekerPackageExcluded'];
            $fieldworkInfo[$key]['FieldworkIsCertain'] = $fieldworkRequest['Fieldwork']['FieldworkIsCertain'];
            $fieldworkInfo[$key]['FieldworkWhenCertain'] = $fieldworkRequest['Fieldwork']['FieldworkWhenCertain'];
            $fieldworkInfo[$key]['FieldworkInformationSeekerAnnouncementDate'] = $fieldworkRequest['Fieldwork']['FieldworkInformationSeekerAnnouncementDate'];
            $fieldworkInfo[$key]['FieldworkInformationSeekerDeadline'] = $fieldworkRequest['Fieldwork']['FieldworkInformationSeekerDeadline'];
            $fieldworkInfo[$key]['FieldworkProjectWebsite'] = $fieldworkRequest['Fieldwork']['FieldworkProjectWebsite'];
        }
        return $this->view->render(
                        $response, 'information-seekers/fieldwork-connect-details.html.twig', [
                    'fieldwork_information_seeker_hash' => $fieldworkInformationSeeker->hashCode(),
                    'fieldworks' => $fieldworkInfo,
                    'token' => $token,
                    'email' => $fieldworkInformationSeekerEmail,
                        ]
        );
    }

    /**
     * Approving fieldwork
     * @param type $request
     * @param type $response
     * @param type $args
     */
    public function approveFieldworkRequestAction(Request $request, Response $response, $args) {
        $data = $request->getParsedBody();

        $fieldworkInformationSeekerId = trim(filter_var($data['id'], FILTER_SANITIZE_NUMBER_INT));
        $fieldworkInformationSeeker = FieldworkInformationSeekerQuery::create()->filterByApproved(false)->findOneById($fieldworkInformationSeekerId);

        if (
                empty($fieldworkInformationSeekerId) ||
                empty($fieldworkInformationSeeker->getId())
        ) {
            $this->container->get('logger')
                    ->addError('Empty or wronge fieldwork information seeker id recieved for fieldwork connect approval: ' . json_encode($data));
            $technicalAdminEmail = $this->container->get('settings')['contacts']['technical_admin'];
            $response->getBody()->write("Something went wrong! Please contact us at: " . $technicalAdminEmail);


            return $response->withStatus(400);
        }

        $fieldworkInformationSeeker->setApproved(true);
        $fieldworkInformationSeeker->save();
        $this->container->get('logger')
                ->addInfo('A new fieldwork information seeker has been approved. FieldworkId =' . $fieldworkInformationSeeker->getId());

        $requestedFieldworks = $fieldworkInformationSeeker->getFieldworkInformationSeekerRequestsJoinFieldwork();
        $emailMsg = (new \Swift_Message('Your request is approved at Cryo Connect now'))
                ->setFrom([$this->container->get('settings')['mailer']['username'] => 'Cryoconnect'])
                ->setTo($fieldworkInformationSeeker->getInformationSeekerEmail())
                ->setBody(
                $this->view->render(new \Slim\Http\Response(), 'information-seekers/emails/fieldwork-connect-welcome-email.html.twig', [
                    'fieldwork_information_seeker_name' => $fieldworkInformationSeeker->getInformationSeekerName(),
                    'email' => $fieldworkInformationSeeker->getInformationSeekerEmail(),
                    'token' => md5($fieldworkInformationSeeker->getInformationSeekerEmail() . $fieldworkInformationSeeker->hashCode())
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
    public function rejectFieldworkRequestAction(Request $request, Response $response, $args) {
        $data = $request->getParsedBody();

        $fieldworkInformationSeekerId = trim(filter_var($data['id'], FILTER_SANITIZE_NUMBER_INT));
        $fieldworkInformationSeeker = FieldworkInformationSeekerQuery::create()->filterByApproved(false)->findOneById($fieldworkInformationSeekerId);
        $explanation = trim(filter_var($data['explanation'], FILTER_SANITIZE_STRING));

        if (
                empty($fieldworkInformationSeekerId) ||
                empty($fieldworkInformationSeeker->getId())
        ) {
            $this->container->get('logger')
                    ->addError('Empty or wronge fieldwork information seeker id recieved for fieldwork connect approval: ' . json_encode($data));
            $technicalAdminEmail = $this->container->get('settings')['contacts']['technical_admin'];
            $response->getBody()->write("Something went wrong! Please contact us at: " . $technicalAdminEmail);


            return $response->withStatus(400);
        }


        $this->container->get('logger')
                ->addInfo('A fieldwork information seeker is being deleted. Information seekers email: ' . $fieldworkInformationSeeker->getInformationSeekerEmail() . ' With explanation: ' . $explanation);

        $fieldworkInformationSeeker->delete();

        $emailMsg = (new \Swift_Message('Sorry Cryoconnect could not approve your request'))
                ->setFrom([$this->container->get('settings')['mailer']['username'] => 'Cryoconnect'])
                ->setTo($fieldworkInformationSeeker->getInformationSeekerEmail())
                ->setBody(
                $this->view->render(new \Slim\Http\Response(), 'information-seekers/emails/fieldwork-connect-rejection-email.html.twig', [
                    'fieldwork_information_seeker_name' => $fieldworkInformationSeeker->getInformationSeekerName(),
                    'explanation' => $explanation
                        ]
                )->getBody(), 'text/html'
        );

        $this->mailer->send($emailMsg);

        return $response->withStatus(200);
    }

    /**
     * Approving fieldwork
     * @param type $request
     * @param type $response
     * @param type $args
     */
    public function fieldworkApplicantsAction(Request $request, Response $response, $args) {
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

        if (!isset($fieldworkInformationSeekerRequests) || empty($fieldworkInformationSeekerRequests)) {
            $this->container->get('logger')
                    ->addError('Wrong fieldwork Hash passed to fieldwork applicant page the query params are: ' . json_encode($request->getQueryParams()));
            $technicalAdminEmail = $this->container->get('settings')['contacts']['technical_admin'];
            $response->getBody()->write("Something went wrong! Please contact the technical admin at: " . $technicalAdminEmail);
            $response->withStatus(400);
            return $response;
        }

        $this->container->get('logger')
                ->addInfo('Fieldwork applicant info was accessed by a leader:' . json_encode($fieldwork->toArray()));

        $applicants = array();

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
        }
        return $this->view->render(
                        $response, 'fieldworks/fieldwork-connect-applicants.html.twig', [
                    'applicants' => $applicants,
                    'fieldworkId' => $fieldwork->hashCode(),
                    'fieldwork_name' => $fieldwork->getFieldworkName(),
                    'fieldwork_application_deadline' => $fieldwork->getFieldworkInformationSeekerDeadline(),
                    'fieldwork_website' => $fieldwork->getFieldworkProjectWebsite(),
                    'fieldwork_cost' => $fieldwork->getFieldworkInformationSeekerCost(),
                    'fieldwork_start_date' => $fieldwork->getFieldworkStartDate(),
                    'fieldwork_announcement_deadline' => $fieldwork->getFieldworkInformationSeekerAnnouncementDate(),
                    'fieldwork_bidding_allowed' => $fieldwork->getFieldworkBidingAllowed()
                        ]
        );
    }

    /**
     * Approving fieldwork
     * @param type $request
     * @param type $response
     * @param type $args
     */
    public function fieldworkBidSubmissionAction(Request $request, Response $response, $args) {
        $data = $request->getParsedBody();

        $this->container->get('logger')
                ->addInfo('A new fieldwork bid submittion request recieved with data: ' . json_encode($data));

        $fieldworkInformationSeekerHash = filter_var($data['ish'], FILTER_SANITIZE_STRING);
        $fieldworkHash = filter_var($data['fh'], FILTER_SANITIZE_STRING);
        $bid = filter_var($data['bid'], FILTER_SANITIZE_NUMBER_INT);
        $fieldworkInformationSeekerEmail = filter_var(str_replace(' ', '+', $data['e']), FILTER_SANITIZE_EMAIL);

        //rest of validations
        if (
                empty($fieldworkInformationSeekerHash) ||
                empty($fieldworkHash) ||
                empty($fieldworkInformationSeekerEmail)
        ) {
            $this->container->get('logger')
                    ->addError('Wrong fieldwork infromation seeker Hash passed to fieldwork detail page the query params are: ' . json_encode(data));
            $technicalAdminEmail = $this->container->get('settings')['contacts']['technical_admin'];
            $response->getBody()->write("Something went wrong! Please contact the technical admin at: " . $technicalAdminEmail);
            $response->withStatus(400);
            return $response;
        }
        $fieldworkInformationSeekers = FieldworkInformationSeekerQuery::create()->filterByApproved(true)->findByInformationSeekerEmail($fieldworkInformationSeekerEmail);

        foreach ($fieldworkInformationSeekers as $informationSeeker) {
            if ($informationSeeker->hashCode() == $fieldworkInformationSeekerHash) {
                $fieldworkInformationSeeker = $informationSeeker;
                foreach ($fieldworkInformationSeeker->getFieldworks() as $fieldwork) {
                    if ($fieldwork->hashCode() == $fieldworkHash) {
                        $requestedFieldwork = $fieldwork;
                        break;
                    }
                }
                break;
            }
        }



        if (
                !isset($requestedFieldwork) ||
                empty($requestedFieldwork) ||
                ($requestedFieldwork->getFieldworkBidingAllowed() && empty($bid))
        ) {
            $this->container->get('logger')
                    ->addError('Wrong fieldwork infromation seeker Hash passed to fieldwork detail page the query params are: ' . json_encode($request->getQueryParams()));
            $technicalAdminEmail = $this->container->get('settings')['contacts']['technical_admin'];
            $response->getBody()->write("Something went wrong! Please contact the technical admin at: " . $technicalAdminEmail);
            $response->withStatus(400);
            return $response;
        }

        $fieldworkInformationSeekerRequest = FieldworkInformationSeekerRequestQuery::create()
                ->filterByFieldworkInformationSeeker($fieldworkInformationSeeker)
                ->findOneByFieldworkId($requestedFieldwork->getId());

        $fieldworkInformationSeekerRequest->setApplicationSent('true');

        if (!empty($bid)) {
            $fieldworkInformationSeekerRequest->setBid($bid);
        }

        $fieldworkInformationSeekerRequest->setTimestamp(time());

        $fieldworkInformationSeekerRequest->save();

        $this->container->get('logger')
                ->addInfo('FieldworkInformationSeeker Bid request has been added to fieldworkInformationSeekerRequest=' . $fieldworkInformationSeekerRequest->getFieldworkInformationSeekerId() . '-' . $fieldworkInformationSeekerRequest->getFieldworkId());

        $emailMsg = (new \Swift_Message('A new information seeker has applied for ' . $requestedFieldwork->getFieldworkName()))
                ->setFrom([$this->container->get('settings')['mailer']['username'] => 'Cryoconnect'])
                ->setTo($requestedFieldwork->getFieldworkLeaderEmail())
                ->setBody(
                $this->view->render(new \Slim\Http\Response(), 'information-seekers/emails/fieldwork-connect-bid-request-email.html.twig', [
                    'leader_name' => $requestedFieldwork->getFieldworkLeaderName(),
                    'leader_email' => $requestedFieldwork->getFieldworkLeaderEmail(),
                    'fieldwork_name' => $requestedFieldwork->getFieldworkName(),
                    'information_seeker_name' => $fieldworkInformationSeeker->getInformationSeekerName(),
                    'token' => md5($requestedFieldwork->getFieldworkLeaderEmail() . $requestedFieldwork->hashCode()),
                    'announcement_day' => $requestedFieldwork->getFieldworkInformationSeekerAnnouncementDate()
                        ]
                )->getBody(), 'text/html'
        );

        $this->mailer->send($emailMsg);

        return $response->withStatus(200);
    }

}
