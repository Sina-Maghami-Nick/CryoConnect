<?php

namespace App\Controllers;

use Psr\Container\ContainerInterface;

/**
 * General Controller which can be extended
 *
 * @author Sina Maghami Nick
 */
class Controller {

    protected $container;

    // constructor receives container instance
    public function __construct(ContainerInterface $container) {
        $this->container = $container;
        $settings = $container->get('settings')['proppel'];
        //Initilizing Proppel
        require_once $settings['initializer_path'];
    }

}
