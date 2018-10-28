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
    protected $view;

    // constructor receives container instance
    public function __construct(ContainerInterface $container) {
        $this->container = $container;
        //$this->view = $this->container->get($id);
    }

}
