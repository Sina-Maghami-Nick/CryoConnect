<?php

namespace App\Controllers;

use CryoConnectDB\CountriesQuery;
use CryoConnectDB\LanguagesQuery;
use CryoConnectDB\CryosphereWhatQuery;
use CryoConnectDB\CryosphereWhat;
use CryoConnectDB\CryosphereWhatSpeceficQuery;
use CryoConnectDB\CryosphereWhatSpecefic;
use CryoConnectDB\CryosphereWhereQuery;
use CryoConnectDB\CryosphereWhere;
use CryoConnectDB\CryosphereWhenQuery;
use CryoConnectDB\CryosphereWhen;
use CryoConnectDB\CryosphereMethodsQuery;
use CryoConnectDB\CryosphereMethods;
use CryoConnectDB\CareerStageQuery;
use CryoConnectDB\CareerStage;

class ExpertsController extends Controller {

    /**
     * Making the sign-up form and rendering it
     * 
     */
    public function signupFormAction($request, $response, $args) {

        //Getting list of Expertise (Cryosphere_What)
        //$cryosphereWhatAll = CryosphereWhatQuery::create()->find();
//        $c = new CareerStage();
//        $c->setCareerStageName('Msc Student')->save();

        $cryosphereWhat = CryosphereWhatQuery::create()->find();
        $cryosphereWhatSpecefic = CryosphereWhatSpeceficQuery::create()->find();
        $cryosphereWhere = CryosphereWhereQuery::create()->find();
        $cryosphereWhen = CryosphereWhenQuery::create()->find();
        $cryosphereMethods = CryosphereMethodsQuery::create()->find();
        $careerStages = CareerStageQuery::create()->find();
        $countries = CountriesQuery::create()->find();
        $languages = LanguagesQuery::create()->find();

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
        // your code
        // to access items in the container... $this->container->get('');
        $data = $request->getParsedBody();
        $response->getBody()->write(json_encode($data));
        return $response;
    }

    public function resultAction($request, $response, $args) {
        // your code
        // to access items in the container... $this->container->get('');
        $response->getBody()->write($this->container->get('settings')['propel']['initializer_path']);
        return $response;
    }

}
