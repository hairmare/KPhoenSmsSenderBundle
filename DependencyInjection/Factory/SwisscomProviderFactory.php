<?php

namespace KPhoen\SmsSenderBundle\DependencyInjection\Factory;

use Symfony\Component\Config\Definition\Builder\NodeDefinition;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * swisscom provider factory
 *
 * @author Lucas Bickel <hairmare@purplehaze.ch>
 */
class SwisscomProviderFactory implements ProviderFactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function create(ContainerBuilder $container, $id, array $config)
    {
        $container->getDefinition($id)
            ->replaceArguments(1, $config['api_key'])
            ->replaceArguments(2, $config['international_prefix'])
        ;
    }

    /**
     * {@inheriDoc}
     */
    public function getKey()
    {
        return 'swisscom';
    }

    /**
     * {@inheritDoc}
     */
    public function addConfiguration(NodeDefinition $node)
    {
        $node
            ->children()
                ->scalarNode('api_key')->isRequired()->end()
                ->scalarNode('international_prefix')->defaultValue('+41')->end()
            ->end()
        ;
    }
}
