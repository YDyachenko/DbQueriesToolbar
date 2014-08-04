<?php

namespace DbQueriesToolbar;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\Db\Adapter\Profiler\ProfilerInterface;
use DbQueriesToolbar\Collector\DbQueriesCollector;

class Module implements ConfigProviderInterface, ServiceProviderInterface, AutoloaderProviderInterface
{

    /**
     * {@inheritdoc}
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * {@inheritdoc}
     */
    public function getServiceConfig()
    {
        return array (
            'factories' => array (
                'dbqueries.toolbar' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');

                    $collector = new DbQueriesCollector();
                    $profiler  = $dbAdapter->getProfiler();
                    if ($profiler instanceof ProfilerInterface) {
                        $collector->setProfiler($profiler);
                    }

                    return $collector;
                }
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getAutoloaderConfig()
    {
        return array (
            'Zend\Loader\StandardAutoloader' => array (
                'namespaces' => array (
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

}
