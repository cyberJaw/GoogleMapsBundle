<?php

namespace CyberJaw\GoogleMapsBundle\Twig;

use Symfony\Component\DependencyInjection\Container;

/**
 * Created by PhpStorm.
 * User: Alexandar
 * Date: 7/3/2017
 * Time: 11:29 AM
 */
class ApiExtension extends \Twig_Extension
{
    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('google_maps_api_key', [$this->container->get('google_maps.api_key'), 'getApiKey'])
        ];
    }

    public function getName()
    {
        return 'google_maps_api_key';
    }
}