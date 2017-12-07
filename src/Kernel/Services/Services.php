<?php


namespace Kugaudo\PhpDeployer\Kernel\Services;


use Kugaudo\PhpDeployer\Kernel\Config\DeploymentConfig;
use Kugaudo\PhpDeployer\Kernel\Services\Deploy\Context\Generate\ContextGenerationStrategy;
use Kugaudo\PhpDeployer\Kernel\Services\Deploy\Executor\CompositeTargetExecutor;
use Kugaudo\PhpDeployer\Kernel\Services\Deploy\SimpleDeployer;
use Kugaudo\PhpDeployer\Kernel\Services\Shell\Command\FS\Locator\FSShellCommandFactory;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Aware\ContainerAwareTarget;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Connector\RemoteConnector;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Connector\RemoteShellHandler;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\RollingTarget;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\RollingTargetFactory;

/**
 * Public services should be located here
 */
class Services
{
    /** @var DeploymentConfig */
    private $deploymentConfig;

    /** @var SimpleDeployer */
    private $deployer;

    /** @var RollingTarget[] */
    private $supportedTargets;

    /** @var FSShellCommandFactory */
    private $shellCommandFactory;

    /**
     * Services constructor.
     * @param DeploymentConfig $deploymentConfig
     * @param RemoteConnector $remoteConnector
     * @param CompositeTargetExecutor $compositeTargetExecutor
     * @param ContextGenerationStrategy $contextGenerationStrategy
     * @param RollingTargetFactory $targetFactory
     */
    public function __construct(DeploymentConfig $deploymentConfig,
                                RemoteConnector $remoteConnector,
                                CompositeTargetExecutor $compositeTargetExecutor,
                                ContextGenerationStrategy $contextGenerationStrategy,
                                RollingTargetFactory $targetFactory)
    {
        $this->deployer = new SimpleDeployer(
            $remoteConnector,
            $compositeTargetExecutor,
            $contextGenerationStrategy
        );

        $this->supportedTargets = $targetFactory->produceSupported();
        $shellHandler = new RemoteShellHandler($remoteConnector);

        foreach ($this->supportedTargets as $target) {
            if ($target instanceof ContainerAwareTarget) {
                $target->setDeploymentConfig($deploymentConfig);
                $target->setShellHandler($shellHandler);
            }
            $this->supportedTargets[$target->getTargetName()] = $target;
        }
    }

    /**
     * @return DeploymentConfig
     */
    public function getDeploymentConfig()
    {
        return $this->deploymentConfig;
    }

    /**
     * @return SimpleDeployer
     */
    public function getDeployer()
    {
        return $this->deployer;
    }

    /**
     * @return RollingTarget[]
     */
    public function getSupportedTargets()
    {
        return $this->supportedTargets;
    }

    /**
     * @return FSShellCommandFactory
     */
    public function getShellCommandFactory()
    {
        return $this->shellCommandFactory;
    }
}