<?php

namespace App\Controllers;

use CryoConnectDB\CountriesQuery;
use CryoConnectDB\LanguagesQuery;
use CryoConnectDB\CryosphereWhatQuery;
use CryoConnectDB\CryosphereWhat;
use CryoConnectDB\CryosphereWhatSpeceficQuery;
use CryoConnectDB\CryosphereWhatSpecefic;
use CryoConnectDB\CryosphereWhereQuery;
use CryoConnectDB\CryosphereWhenQuery;
use CryoConnectDB\CryosphereWhen;
use CryoConnectDB\CryosphereMethodsQuery;
use CryoConnectDB\CryosphereMethods;
use CryoConnectDB\CareerStageQuery;
use CryoConnectDB\Experts;
use CryoConnectDB\ExpertsQuery;
use CryoConnectDB\ExpertCryosphereWhat;
use CryoConnectDB\ExpertCryosphereWhere;
use CryoConnectDB\ExpertCryosphereWhen;
use CryoConnectDB\ExpertCryosphereWhatSpecefic;
use CryoConnectDB\ExpertCryosphereMethods;
use CryoConnectDB\ExpertCareerStage;
use CryoConnectDB\ExpertFieldWork;
use CryoConnectDB\ExpertPrimaryAffiliation;
use CryoConnectDB\ExpertSecondaryAffiliation;
use CryoConnectDB\ContactTypesQuery;
use CryoConnectDB\ExpertContact;
use CryoConnectDB\Languages;

class ExpertsController extends Controller {

    /**
     * Making the sign-up form and rendering it
     * 
     */
    public function signupFormAction($request, $response, $args) {

        $cryosphereWhat = CryosphereWhatQuery::create()->findByApproved(True);
        $cryosphereWhatSpecefic = CryosphereWhatSpeceficQuery::create()->findByApproved(True);
        $cryosphereWhere = CryosphereWhereQuery::create()->find();
        $cryosphereWhen = CryosphereWhenQuery::create()->findByApproved(True);
        $cryosphereMethods = CryosphereMethodsQuery::create()->findByApproved(True);
        $careerStages = CareerStageQuery::create()->find();
        $countries = CountriesQuery::create()->orderByCountryName()->find();
        $languages = LanguagesQuery::create()->orderByLanguage()->find();

        return $this->view->render(
                        $response, 'experts-signup.html.twig', [
                    'countries' => $countries->toArray(),
                    'languages' => $languages->toArray(),
                    'cryosphere_what' => $cryosphereWhat->toArray(),
                    'cryosphere_what_specefic' => $cryosphereWhatSpecefic->toArray(),
                    'cryosphere_where' => $cryosphereWhere->toArray(),
                    'cryosphere_when' => $cryosphereWhen->toArray(),
                    'cryosphere_methods' => $cryosphereMethods->toArray(),
                    'career_stages' => $careerStages->toArray(),
                        ]
        );
    }

    public function signupAction($request, $response, $args) {

        $data = $request->getParsedBody();

        $this->container->get('logger')
                ->addInfo('A new expert signup request recieved with data: ' . json_encode($data));

        $emailAddress = trim(strtolower(filter_var($data['email'], FILTER_SANITIZE_EMAIL)));
        $firstName = filter_var($data['first_name'], FILTER_SANITIZE_STRING);
        $lastName = trim(filter_var($data['last_name'], FILTER_SANITIZE_STRING));
        $gender = filter_var($data['gender'], FILTER_SANITIZE_STRING);
        $birthYear = filter_var($data['birth_year'], FILTER_SANITIZE_NUMBER_INT);
        $cryosphereExistingWhat = filter_var_array($data['cryosphere_what'], FILTER_SANITIZE_NUMBER_INT);
        $cryosphereExistingWhere = filter_var_array($data['cryosphere_where'], FILTER_SANITIZE_NUMBER_INT);
        $cryosphereExistingWhatSpecefic = filter_var_array($data['cryosphere_what_specefic'], FILTER_SANITIZE_NUMBER_INT);
        $cryosphereExistingMethods = filter_var_array($data['cryosphere_method'], FILTER_SANITIZE_NUMBER_INT);
        $cryosphereExistingWhen = filter_var_array($data['cryosphere_when'], FILTER_SANITIZE_NUMBER_INT);
        $languageCodes = filter_var_array($data['languages'], FILTER_SANITIZE_STRING);
        $careerStage = filter_var($data['caree_stage'], FILTER_SANITIZE_NUMBER_INT);
        $primaryAffiliationName = filter_var($data['affiliation']['primary']['name'], FILTER_SANITIZE_STRING);
        $primaryAffiliationCountryCode = filter_var($data['affiliation']['primary']['country'], FILTER_SANITIZE_STRING);
        $primaryAffiliationCity = filter_var($data['affiliation']['primary']['city'], FILTER_SANITIZE_STRING);
        $secondryAffiliations = explode(',', filter_var($data['affiliation']['secondry']['name'], FILTER_SANITIZE_STRING));
        $phoneNumber = filter_var($data['phone_number'], FILTER_SANITIZE_STRING);
        $website = filter_var($data['personal_website'], FILTER_SANITIZE_URL);
        $linkedIn = filter_var($data['personal_linkedin'], FILTER_SANITIZE_URL);
        $googleScholar = filter_var($data['personal_google_scholar'], FILTER_SANITIZE_URL);

        //rest of validations
        if (
                empty($firstName) ||
                empty($lastName) ||
                empty($emailAddress) ||
                empty($gender) ||
                empty($birthYear) ||
                empty($primaryAffiliationName) ||
                empty($primaryAffiliationCountryCode) ||
                empty(CountriesQuery::create()->findByCountryCode($primaryAffiliationCountryCode)) ||
                empty($cryosphereExistingWhere) ||
                empty($languageCodes) ||
                empty($careerStage) ||
                empty(CareerStageQuery::create()->findOneById($careerStage)) ||
                empty($cryosphereExistingWhat) ||
                empty($cryosphereExistingWhen) ||
                empty($cryosphereExistingWhatSpecefic) ||
                empty($cryosphereExistingMethods) ||
                ExpertsQuery::create()->findOneByEmail($emailAddress)
        ) {
            $this->container->get('logger')
                    ->addError('Empty or wronge fileds for expert info recieved within the following request: ' . json_encode($data));
            $technicalAdminEmail = $this->container->get('settings')['contacts']['technical_admin'];
            $response->getBody()->write("Something went wrong! Please contact us at: " . $technicalAdminEmail);

            return $response->withStatus(400);
        }

        //Creating the new expert
        $expert = new Experts();
        $expert->setFirstName($firstName);
        $expert->setLastName($lastName);
        $expert->setEmail($emailAddress);
        $expert->setBirthYear($birthYear);
        $expert->setCountryCode($primaryAffiliationCountryCode);
        $expert->setGender($gender);
        $expert->setApproved(false);


        $expert = $this->setExpertWhat($expert, $cryosphereExistingWhat);
        $expert = $this->setExpertWhatSpecefic($expert, $cryosphereExistingWhatSpecefic);
        $expert = $this->setExpertWhen($expert, $cryosphereExistingWhen);
        $expert = $this->setExpertMethods($expert, $cryosphereExistingMethods);
        $expert = $this->setExpertWhere($expert, $cryosphereExistingWhere);
        $expert = $this->setExpertCareerStage($expert, $careerStage);
        $expert = $this->setExpertAffiliations($expert, $primaryAffiliationName, $primaryAffiliationCountryCode, $primaryAffiliationCity, $secondryAffiliations);
        $expert = $this->setExpertContact($expert, $phoneNumber, $website, $linkedIn, $googleScholar);
        $expet = $this->setExpertLanguages($expert, $languageCodes);

        $expert->save();

        $this->container->get('logger')
                ->addInfo('A new unvalidated expert is added to the databse: ' . json_encode($expert->toArray()));

        $approvalMsg = (new \Swift_Message('Approval of new cryoconnect expert: ' . $firstName . ' ' . $lastName))
                ->setFrom([$this->container->get('settings')['mailer']['username'] => 'No-reply'])
                ->setTo($this->container->get('settings')['contacts']['approval_admin'])
                ->setBody(
                $this->view->render(new \Slim\Http\Response(), 'emails/experts-approval-email.html.twig', [
                    'expert' => $expert->toArray(),
                    'token' => md5($expert->getEmail() . $expert->getBirthYear()),
                        ]
                )->getBody(), 'text/html'
        );

        $this->mailer->send($approvalMsg);

        return $this->view->render(
                        $response, 'experts-thank-you-page.html.twig', [
                    'expert_first_name' => $firstName,
                    'expert_last_name' => $lastName,
                        ]
        );
    }

    /**
     * Checking if expert email exists
     */
    public function expertEmailExistCheckAction($request, $response, $args) {
        $data = $request->getParsedBody();
        $emailAddress = trim(strtolower(filter_var($data['email'], FILTER_SANITIZE_EMAIL)));

        if (
                !ExpertsQuery::create()->findOneByEmail($emailAddress)
        ) {
            return $response->withStatus(400);
        }

        return $response->withStatus(200);
    }

    /**
     * Rendering approve page for expert
     * @param type $request
     * @param type $response
     * @param type $args
     * @return type
     */
    public function approvalAction($request, $response, $args) {
        // your code
        // to access items in the container... $this->container->get('');
        $expertId = $request->getQueryParams()['id'];
        $expert = ExpertsQuery::create()->findPk($expertId);

        if (!isset($expert) || empty($expert)) {
            $this->container->get('logger')
                    ->addError('Wrong expert ID passed to expert validation page the query params are: ' . json_encode($request->getQueryParams()));
            $technicalAdminEmail = $this->container->get('settings')['contacts']['technical_admin'];
            $response->getBody()->write("Something went wrong! Please contact the technical admin at: " . $technicalAdminEmail);
            $response->withStatus(400);

            return $response;
        }

        $this->container->get('logger')
                ->addInfo('Expert Validation page was accessed by a user for expert:' . json_encode($expert->toArray()));
        return $this->view->render(
                        $response, 'expert-approval.html.twig', [
                    'expert' => $expert->toArray(),
                    'expert_what' => $expert->getExpertCryosphereWhatsJoinCryosphereWhat()->toArray(),
                    'expert_what_specefic' => $expert->getExpertCryosphereWhatSpeceficsJoinCryosphereWhatSpecefic()->toArray(),
                    'expert_when' => $expert->getExpertCryosphereWhensJoinCryosphereWhen()->toArray(),
                    'expert_methods' => $expert->getExpertCryosphereMethodssJoinCryosphereMethods()->toArray(),
                    'expert_where' => $expert->getExpertCryosphereWheresJoinCryosphereWhere()->toArray(),
                    'expert_career_stages' => $expert->getExpertCareerStagesJoinCareerStage()->toArray(),
                    'expert_languages' => $expert->getLanguagess()->toArray(),
                    'expert_primary_affiliation' => $expert->getExpertPrimaryAffiliation()->toArray(),
                    'expert_secondary_affiliation' => $expert->getExpertSecondaryAffiliations()->toArray(),
                    'expert_contacts' => $expert->getExpertContactsJoinContactTypes()->toArray(),
                    'expert_country' => CountriesQuery::create()->findByCountryCode($expert->getCountryCode())->toArray(),
                        ]
        );
    }

    /**
     * Approving expert
     * @param type $request
     * @param type $response
     * @param type $args
     */
    public function approveExpertAction($request, $response, $args) {
        $data = $request->getParsedBody();

        $expertId = trim(filter_var($data['id'], FILTER_SANITIZE_NUMBER_INT));
        $expert = ExpertsQuery::create()->filterByApproved(false)->findOneById($expertId);

        if (
                empty($expertId) ||
                empty($expert->getId())
        ) {
            $this->container->get('logger')
                    ->addError('Empty or wronge expert id recieved for expert approval: ' . json_encode($data));
            $technicalAdminEmail = $this->container->get('settings')['contacts']['technical_admin'];
            $response->getBody()->write("Something went wrong! Please contact us at: " . $technicalAdminEmail);


            return $response->withStatus(400);
        }

        $expert->setApproved(true);
        $expert->save();
        $this->container->get('logger')
                ->addInfo('A new expert has been approved. ExpertId =' . $expert->getId());

        $emailMsg = (new \Swift_Message('Welcome to Cryoconnect experts family'))
                ->setFrom([$this->container->get('settings')['mailer']['username'] => 'No-reply'])
                ->setTo($expert->getEmail())
                ->setBody(
                $this->view->render(new \Slim\Http\Response(), 'emails/experts-welcome-email.html.twig', [
                    'expert_name' => $expert->getFirstName() . " " . $expert->getLastName(),
                        ]
                )->getBody(), 'text/html'
        );

        $this->mailer->send($emailMsg);

        return $response->withStatus(200);
    }

    /**
     * Approving expert
     * @param type $request
     * @param type $response
     * @param type $args
     */
    public function rejectExpertAction($request, $response, $args) {
        $data = $request->getParsedBody();

        $expertId = trim(filter_var($data['id'], FILTER_SANITIZE_NUMBER_INT));
        $expert = ExpertsQuery::create()->filterByApproved(false)->findOneById($expertId);
        $explanation = trim(filter_var($data['explanation'], FILTER_SANITIZE_STRING));

        if (
                empty($expertId) ||
                empty($expert->getId())
        ) {
            $this->container->get('logger')
                    ->addError('Empty or wronge expert id recieved for expert approval: ' . json_encode($data));
            $technicalAdminEmail = $this->container->get('settings')['contacts']['technical_admin'];
            $response->getBody()->write("Something went wrong! Please contact us at: " . $technicalAdminEmail);

            return $response->withStatus(400);
        }


        $this->container->get('logger')
                ->addInfo('A expert is being deleted. ExpertEmail: ' . $expert->getEmail() . ' With explanation: ' . $explanation);

        $expert->delete();

        $emailMsg = (new \Swift_Message('Sorry Cryoconnect could not approve your request'))
                ->setFrom([$this->container->get('settings')['mailer']['username'] => 'No-reply'])
                ->setTo($expert->getEmail())
                ->setBody(
                $this->view->render(new \Slim\Http\Response(), 'emails/experts-rejection-email.html.twig', [
                    'expert_name' => $expert->getFirstName() . " " . $expert->getLastName(),
                    'explanation' => $explanation
                        ]
                )->getBody(), 'text/html'
        );

        $this->mailer->send($emailMsg);

        return $response->withStatus(200);
    }

    /**
     * 
     * @param Experts $expert
     * @param array $cryosphereExistingWhat
     * @return Experts
     */
    private function setExpertWhat(Experts $expert, $cryosphereExistingWhat) {
        //Adding experts Crysphere whats
        if (!empty($cryosphereExistingWhat)) {
            foreach ($cryosphereExistingWhat as $cryosphereWhatID) {
                $expertCryosphereWhat = new ExpertCryosphereWhat();
                $expertCryosphereWhat->setCryosphereWhatId($cryosphereWhatID);
                $expert->addExpertCryosphereWhat($expertCryosphereWhat);
            }
        }

        return $expert;
    }

    /**
     * 
     * @param Experts $expert
     * @param array $cryosphereExistingWhatSpecefic
     * @return Experts
     */
    private function setExpertWhatSpecefic(Experts $expert, $cryosphereExistingWhatSpecefic) {
        //Adding experts Crysphere what specefics
        if (!empty($cryosphereExistingWhatSpecefic)) {
            foreach ($cryosphereExistingWhatSpecefic as $cryosphereWhatSpeceficID) {
                $expertCryosphereWhatSpecefic = new ExpertCryosphereWhatSpecefic();
                $expertCryosphereWhatSpecefic->setCryosphereWhatSpeceficId($cryosphereWhatSpeceficID);
                $expert->addExpertCryosphereWhatSpecefic($expertCryosphereWhatSpecefic);
            }
        }

        return $expert;
    }

    /**
     * 
     * @param Experts $expert
     * @param array $cryosphereExistingWhen
     * @return Experts
     */
    private function setExpertWhen(Experts $expert, $cryosphereExistingWhen) {
        //Adding experts Crysphere whens
        if (!empty($cryosphereExistingWhen)) {
            foreach ($cryosphereExistingWhen as $cryosphereWhenID) {
                $expertCryosphereWhen = new ExpertCryosphereWhen();
                $expertCryosphereWhen->setCryosphereWhenId($cryosphereWhenID);
                $expert->addExpertCryosphereWhen($expertCryosphereWhen);
            }
        }

        return $expert;
    }

    /**
     * 
     * @param Experts $expert
     * @param array $cryosphereExistingMethods
     * @return Experts
     */
    private function setExpertMethods(Experts $expert, $cryosphereExistingMethods) {
        //Adding experts Crysphere methods
        if (!empty($cryosphereExistingMethods)) {
            foreach ($cryosphereExistingMethods as $cryosphereMethodsID) {
                $expertCryosphereMethods = new ExpertCryosphereMethods();
                $expertCryosphereMethods->setMethodId($cryosphereMethodsID);
                $expert->addExpertCryosphereMethods($expertCryosphereMethods);
            }
        }

        return $expert;
    }

    /**
     * 
     * @param Experts $expert
     * @param array $cryosphereExistingWhere
     * @return Experts
     */
    private function setExpertWhere(Experts $expert, $cryosphereExistingWhere) {
        //Adding experts Crysphere wheres
        if (!empty($cryosphereExistingWhere)) {
            foreach ($cryosphereExistingWhere as $cryosphereWhereID) {
                $expertCryosphereWhere = new ExpertCryosphereWhere();
                $expertCryosphereWhere->setCryosphereWhereId($cryosphereWhereID);
                $expert->addExpertCryosphereWhere($expertCryosphereWhere);
            }
        }

        return $expert;
    }

    /**
     * 
     * @param Experts $expert
     * @param int $careerStage
     * @return Experts
     */
    private function setExpertCareerStage(Experts $expert, int $careerStage) {

        $expertCareerStage = new ExpertCareerStage();
        $expertCareerStage->setCareerStageId($careerStage);
        $expert->addExpertCareerStage($expertCareerStage);

        return $expert;
    }

    /**
     * 
     * @param Experts $expert
     * @param string $fieldWorkLocation
     * @param string $fieldWorkDate
     * @return Experts
     */
//    private function setExpertFieldWork(Experts $expert, string $fieldWorkLocation, string $fieldWorkDate) {
//        //Adding experts Crysphere wheres
//        $expertFieldWork = new ExpertFieldWork();
//
//        if (!empty($fieldWorkLocation)) {
//            $expertFieldWork->setFieldWorkWhere($fieldWorkLocation);
//        }
//
//        if (($timestamp = strtotime($fieldWorkDate)) !== false) {
//            $expertFieldWork->setFieldWorkYear(date("Y", $timestamp));
//            $expertFieldWork->setFieldWorkMonth(date("m", $timestamp));
//        }
//
//        $expert->addExpertFieldWork($expertFieldWork);
//
//        return $expert;
//    }

    /**
     * 
     * @param Experts $expert
     * @param string $primaryAffiliation
     * @param string $primaryAffiliationCountry
     * @param string $primaryAffiliationCity
     * @param array $secondryAffiliations
     * @return Experts
     */
    private function setExpertAffiliations(Experts $expert, string $primaryAffiliationName, string $primaryAffiliationCountryCode, string $primaryAffiliationCity, $secondryAffiliations) {
        //Adding experts Crysphere wheres
        $expertPrimaryAffiliation = new ExpertPrimaryAffiliation();
        $expertPrimaryAffiliation->setPrimaryAffiliationName($primaryAffiliationName);
        $expertPrimaryAffiliation->setPrimaryAffiliationCountryCode($primaryAffiliationCountryCode);
        $primaryAffiliationCity ?? $expertPrimaryAffiliation->setPrimaryAffiliationCity($primaryAffiliationCity);

        if (!empty($secondryAffiliations)) {
            foreach ($secondryAffiliations as $secondryAffiliationName) {
                $expertSecondryAffiliation = new ExpertSecondaryAffiliation();
                $expertSecondryAffiliation->setSecondaryAffiliationName($secondryAffiliationName);
                $expert->addExpertSecondaryAffiliation($expertSecondryAffiliation);
                unset($expertSecondryAffiliation);
            }
        }

        $expert->setExpertPrimaryAffiliation($expertPrimaryAffiliation);

        return $expert;
    }

    /**
     * 
     * @param Experts $expert
     * @param array $languageCodes
     * @return Experts
     */
    private function setExpertLanguages(Experts $expert, $languageCodes) {
        //Adding new expert methods fed into the expert

        foreach ($languageCodes as $languageCode) {
            $language = LanguagesQuery::create()->findOneByLanguageCode($languageCode);
            $expert->addLanguages($language);
        }

        return $expert;
    }

    /**
     * 
     * @param Experts $expert
     * @param string $phoneNumber
     * @param string $website
     * @param string $linkedIn
     * @param string $googleScholar
     * @return Experts
     */
    private function setExpertContact(Experts $expert, string $phoneNumber, string $website, string $linkedIn, string $googleScholar) {

        //Adding expert telephone number
        if (!empty($phoneNumber)) {
            if ($contactTypeId = ContactTypesQuery::create()->findOneByContactType('phone')->getId()) {
                $expertContact = new ExpertContact;
                $expertContact->setContactTypeId($contactTypeId);
                $expertContact->setContactInformation($phoneNumber);
                $expert->addExpertContact($expertContact);
            }
        }

        // Adding expert's Website
        if (!empty($website)) {
            if ($contactTypeId = ContactTypesQuery::create()->findOneByContactType('website')->getId()) {
                $expertContact = new ExpertContact;
                $expertContact->setContactTypeId($contactTypeId);
                $expertContact->setContactInformation($website);
                $expert->addExpertContact($expertContact);
            }
        }

        // Adding expert's LinkedIn
        if (!empty($linkedIn)) {
            if ($contactTypeId = ContactTypesQuery::create()->findOneByContactType('linkedIn')->getId()) {
                $expertContact = new ExpertContact;
                $expertContact->setContactTypeId($contactTypeId);
                $expertContact->setContactInformation($linkedIn);
                $expert->addExpertContact($expertContact);
            }
        }

        // Adding expert's GoogleScholar
        if (!empty($googleScholar)) {
            if ($contactTypeId = ContactTypesQuery::create()->findOneByContactType('googleScholar')->getId()) {
                $expertContact = new ExpertContact;
                $expertContact->setContactTypeId($contactTypeId);
                $expertContact->setContactInformation($googleScholar);
                $expert->addExpertContact($expertContact);
            }
        }

        return $expert;
    }

}
