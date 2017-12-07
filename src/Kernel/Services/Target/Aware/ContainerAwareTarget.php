<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Target\Aware;


use Kugaudo\PhpDeployer\Kernel\Config\DeploymentConfig;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Connector\RemoteShellHandler;

interface ContainerAwareTarget
{
    /**
     * @param DeploymentConfig $config
     */
    public function setDeploymentConfig($config);

    /**
     * @param RemoteShellHandler $shellHandler
     */
    public function setShellHandler($shellHandler);

}