<?php
/**
 * Created by PhpStorm.
 * User: omfg
 * Date: 7/2/2017
 * Time: 1:56 PM
 */

namespace CyberJaw\GoogleMapsBundle\DependancyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();

        $rootNode = $treeBuilder->root('google_maps');
        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.
        return $treeBuilder;
    }
}