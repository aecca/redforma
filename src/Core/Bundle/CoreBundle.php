<?php

namespace Redforma\Bundle;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\Bundle\Bundle as BaseBundle;

/**
 * Class CoreBundle
 *
 * @package Redforma\Bundle
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class CoreBundle extends BaseBundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/Resources/config'));
        $loader->load('config.yml');
    }
}