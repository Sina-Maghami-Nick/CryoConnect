<?php

namespace App\Controllers;

use CryoConnectDB\FieldworkQuery;
use Slim\Http\Request;
use Slim\Http\Response;

class ApiController extends Controller {

    public function remindUrcertainExpedition(Request $request, Response $response, $args) {

        $this->container->get('logger')
                ->addInfo('A new check is performed to send reminders to exibition leaders to approve/disaprove or change fieldtrip to certain');


        //Creating a new expedition search
        $searchDate = date('Y-m-d');
        $notCertainExpeditions = FieldworkQuery::create()->filterByFieldworkIsCertain(false)->filterByFieldworkWhenCertain((array("min" => $searchDate . " 00:00:00", "max" => $searchDate . " 23:59:59")))->find();

        if (isset($notCertainExpeditions) && !empty($notCertainExpeditions)) {
            foreach ($notCertainExpeditions as $expedition) {
                $emailMsg = (new \Swift_Message('Reminder: time to set your expedition to certain'))
                        ->setFrom([$this->container->get('settings')['mailer']['username'] => 'Cryo Connect'])
                        ->setTo($expedition->getFieldworkLeaderEmail())
                        ->setBody(
                        $this->view->render(new \Slim\Http\Response(), 'api/emails/is-certain-date-today.html.twig', [
                            'leader_name' => $expedition->getFieldworkLeaderName(),
                            'leader_email' => $expedition->getFieldworkLeaderEmail(),
                            'fieldwork_name' => $expedition->getFieldworkName(),
                            'token' => md5($expedition->getFieldworkLeaderEmail() . $expedition->hashCode()),
                                ]
                        )->getBody(), 'text/html');

                //check if email is sent
                if (!$this->mailer->send($emailMsg)) {
                    $this->container->get('logger')
                            ->addError('There was an error in sending an email to exebition leader to change certain date for the expedition: ' . $expedition->toJSON());
                    $technicalAdminEmail = $this->container->get('settings')['contacts']['technical_admin'];
                    $response->getBody()->write("Something went wrong! Please contact the technical admin at: " . $technicalAdminEmail);
                    $response->withStatus(400);
                }
            }
        }

        return $response;
    }

    public function remindApplicantApprove(Request $request, Response $response, $args) {

        $this->container->get('logger')
                ->addInfo('A new check is performed to send reminders to exibition leaders 3 days perior to descision day');


        //Creating a new expedition search
        $searchDate = date('Y-m-d', strtotime("+3 days"));
        $threeDaysLeftExpeditions = FieldworkQuery::create()->filterByFieldworkInformationSeekerAnnouncementDate(array("min" => $searchDate . " 00:00:00", "max" => $searchDate . " 23:59:59"))->find();

        foreach ($threeDaysLeftExpeditions as $expedition) {

            $remindIsApplicable = false;
            foreach ($expedition->getFieldworkInformationSeekerRequests() as $informationSeekerRequest) {
                if ($informationSeekerRequest->isApplicationAccepted() == false) {
                    $remindIsApplicable = true;
                    break;
                }
            }

            if ($remindIsApplicable) {
                $emailMsg = (new \Swift_Message('Reminder: 3 days left to announcement date'))
                        ->setFrom([$this->container->get('settings')['mailer']['username'] => 'Cryo Connect'])
                        ->setTo($expedition->getFieldworkLeaderEmail())
                        ->setBody(
                        $this->view->render(new \Slim\Http\Response(), 'api/emails/expedition-announcement-deadline.html.twig', [
                            'leader_name' => $expedition->getFieldworkLeaderName(),
                            'leader_email' => $expedition->getFieldworkLeaderEmail(),
                            'fieldwork_name' => $expedition->getFieldworkName(),
                            'token' => md5($expedition->getFieldworkLeaderEmail() . $expedition->hashCode()),
                                ]
                        )->getBody(), 'text/html');

                //check if email is sent
                if (!$this->mailer->send($emailMsg)) {
                    $this->container->get('logger')
                            ->addError('There was an error in sending an email to exebition leader to remind that there are three days left: ' . $expedition->toJSON());
                    $technicalAdminEmail = $this->container->get('settings')['contacts']['technical_admin'];
                    $response->getBody()->write("Something went wrong! Please contact the technical admin at: " . $technicalAdminEmail);
                    $response->withStatus(400);
                }
            }
        }

        return $response;
    }

}
