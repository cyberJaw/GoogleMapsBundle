<?php
/**
 * Created by PhpStorm.
 * User: omfg
 * Date: 7/2/2017
 * Time: 1:56 PM
 */

namespace CyberJaw\GoogleMapsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();

        $rootNode = $treeBuilder->root('google_maps');
        $rootNode->children()
            ->scalarNode('api_key')
            ->end();
        return $treeBuilder;
    }
}