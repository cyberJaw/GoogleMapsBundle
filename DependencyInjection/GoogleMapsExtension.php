<?php
/**
 * Created by PhpStorm.
 * User: omfg
 * Date: 7/2/2017
 * Time: 1:57 PM
 */

namespace CyberJaw\GoogleMapsBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class GoogleMapsExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.xml');

        $container->getDefinition('google_maps.api_key')->addMethodCall('setApiKey', [$config['api_key']]);
    }
}