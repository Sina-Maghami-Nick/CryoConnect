<?php

use Psr\Container\ContainerInterface;

class InformationSeekersController
{
   protected $container;

   // constructor receives container instance
   public function __construct(ContainerInterface $container) {
       $this->container = $container;
   }

   public function signup($request, $response, $args) {
        // your code
        // to access items in the container... $this->container->get('');
       $response->getBody()->write("Hello test");
        return $response;
   }

   public function newRequest($request, $response, $args) {
        // your code
        // to access items in the container... $this->container->get('');
       $response->getBody()->write("Hello test2");
        return $response;
   }
   
   public function requestSent($request, $response, $args) {
        // your code
        // to access items in the container... $this->container->get('');
       $response->getBody()->write("Hello test3");
        return $response;
   }
}

