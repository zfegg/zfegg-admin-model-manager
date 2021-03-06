<?php

namespace Zfegg\ModelManager\DataSource;
use Zfegg\ModelManager\Module;
use Zend\ServiceManager\Config;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;


class DataSourceManagerFactory implements FactoryInterface
{


    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('config');

        $serviceConfig = null;
        if (isset($config[Module::CONFIG_KEY]['data_source_manager'])) {
            $serviceConfig = new Config($config[Module::CONFIG_KEY]['data_source_manager']);
        }

        $plugin = new DataSourceManager($serviceConfig);

        return $plugin;
    }
}