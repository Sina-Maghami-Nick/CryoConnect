<?php

namespace App\Controllers;

use Psr\Container\ContainerInterface;

/**
 * General Controller which can be extended
 *
 * @author Sina Maghami Nick
 */
class Controller {

    /**
     *
     * @var ContainerInterface $container 
     */
    protected $container;

    /**
     *
     * @var \Slim\Views\Twig $view
     */
    protected $view;

    /**
     * 
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container) {
        $this->container = $container;
        $this->view = $this->container->get('view');
    }

}
