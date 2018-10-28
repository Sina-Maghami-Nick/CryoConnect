<?php

namespace App\Controllers;

use CryoConnectDB\CountriesQuery;
use CryoConnectDB\CryosphereWhatQuery;
use CryoConnectDB\CryosphereWhat;
use CryoConnectDB\CryosphereWhereQuery;
use CryoConnectDB\CryosphereWhere;

class ExpertsController extends Controller {

    public function signupAction($request, $response, $args) {

        //Getting list of Expertise (Cryosphere_What)
        //$cryosphereWhatAll = CryosphereWhatQuery::create()->find();
        
        $cryospherewhats = CryosphereWhatQuery::create()->find();
        $cryospherewheres = CryosphereWhereQuery::create()->find();
        $countries = CountriesQuery::create()->find();

        return $this->view->render(
                        $response, 'expertsSignUp.html.twig', [
                    'countries' => $countries->toArray(),
                    'cryosphere-whats' => $cryospherewhats->toArray(),
                    'cryosphere-wheres' => $cryospherewhats->toArray()
                        ]
        );
    }

    public function saveAction($request, $response, $args) {
        // your code
        // to access items in the container... $this->container->get('');
        $response->getBody()->write("Hello test2");
        return $response;
    }

    public function resultAction($request, $response, $args) {
        // your code
        // to access items in the container... $this->container->get('');
        $response->getBody()->write($this->container->get('settings')['propel']['initializer_path']);
        return $response;
    }

}
