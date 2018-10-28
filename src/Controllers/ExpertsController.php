<?php

namespace App\Controllers;

use CryoconnectDB\CountriesQuery;
use CryoconnectDB\CryosphereWhatQuery;

class ExpertsController extends Controller {

    public function signupAction($request, $response, $args) {
        
        //Getting list of Expertise (Cryosphere_What)
        $cryosphereWhatAll = CryosphereWhatQuery::create()->find();
        
        $q = new CountriesQuery();
        $countries = $q->find();
        
        $response->getBody()->write($countries->toJSON());
        return $response;
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
