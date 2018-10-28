<?php

namespace App\Controllers;

class InformationSeekersController extends Controller {

    public function signupAction($request, $response, $args) {
        // your code
        // to access items in the container... $this->container->get('');
        $response->getBody()->write("Hello test");
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
        $response->getBody()->write("Hello test3");
        return $response;
    }

}
