<?php

namespace App\Controllers;

use CryoConnectDB\FieldworkQuery;
use CryoConnectDB\FieldworkInformationSeeker;
use CryoConnectDB\FieldworkInformationSeekerQuery;
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
                    'fieldworks' => $requestedFieldworks
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

}
