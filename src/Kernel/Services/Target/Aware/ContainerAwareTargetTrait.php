<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Target\Aware;


use Kugaudo\PhpDeployer\Kernel\Config\DeploymentConfig;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Connector\RemoteShellHandler;

trait ContainerAwareTargetTrait
{
    /** @var DeploymentConfig */
    private $deploymentConfig;

    /** @var RemoteShellHandler */
    private $shellHandler;

    /**
     * @param DeploymentConfig $config
     */
    public function setDeploymentConfig($config)
    {
        $this->deploymentConfig = $config;
    }

    /**
     * @param RemoteShellHandler $shellHandler
     */
    public function setShellHandler($shellHandler)
    {
        $this->shellHandler = $shellHandler;
    }
}