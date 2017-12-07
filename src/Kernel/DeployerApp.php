<?php


namespace Kugaudo\PhpDeployer\Kernel;


use Kugaudo\PhpDeployer\Kernel\Services\Deploy\Deployer;
use Kugaudo\PhpDeployer\Kernel\Services\Services;

class DeployerApp
{
    /** @var Deployer */
    private $deployer;

    /**
     * @param Services $services
     */
    public function __construct($services)
    {
        ServiceContainer::instance()->init($services);
        $this->deployer = ServiceContainer::instance()->getServices()->getDeployer();
    }

    /**
     * @param string $versionFrom
     * @param string $versionTo
     * @param string[] $targetNames
     * @param callable $executionHandler
     */
    public function deploy($versionFrom, $versionTo, $targetNames, $executionHandler)
    {
        $this->deployer->deploy($versionFrom, $versionTo, $targetNames, $executionHandler);
    }
}