<?php


namespace Kugaudo\PhpDeployer\Kernel\Services;


use Kugaudo\PhpDeployer\Kernel\Config\DeploymentConfig;
use Kugaudo\PhpDeployer\Kernel\Services\Deploy\Context\Generate\ContextGenerationStrategy;
use Kugaudo\PhpDeployer\Kernel\Services\Deploy\Context\Generate\SimpleContextGenerationStrategy;
use Kugaudo\PhpDeployer\Kernel\Services\Deploy\Executor\SimpleCompositeTargetExecutor;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Connector\Connectors\SSH\SshConnector;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Connector\RemoteConnector;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\DefaultTargetFactory;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\RollingTargetFactory;

class ServicesBuilder
{
    /** @var DeploymentConfig  */
    private $deploymentConfig;

    /** @var RemoteConnector */
    private $remoteConnector;

    /** @var ContextGenerationStrategy */
    private $contextGenerationStrategy;

    /** @var SimpleCompositeTargetExecutor */
    private $compositeTargetExecutor;

    /** @var RollingTargetFactory */
    private $targetFactory;

    /**
     * @param DeploymentConfig $deploymentConfig
     * @return ServicesBuilder
     */
    public function withDeploymentConfig($deploymentConfig)
    {
        $this->deploymentConfig = $deploymentConfig;
        return $this;
    }

    /**
     * @param RemoteConnector $remoteConnector
     * @return ServicesBuilder
     */
    public function withRemoteConnector($remoteConnector)
    {
        $this->remoteConnector = $remoteConnector;
        return $this;
    }

    /**
     * @param ContextGenerationStrategy $contextGenerationStrategy
     * @return ServicesBuilder
     */
    public function withContextGenerationStrategy($contextGenerationStrategy)
    {
        $this->contextGenerationStrategy = $contextGenerationStrategy;
        return $this;
    }

    /**
     * @param SimpleCompositeTargetExecutor $compositeTargetExecutor
     * @return ServicesBuilder
     */
    public function withCompositeTargetExecutor($compositeTargetExecutor)
    {
        $this->compositeTargetExecutor = $compositeTargetExecutor;
        return $this;
    }

    /**
     * @param RollingTargetFactory $targetFactory
     * @return ServicesBuilder
     */
    public function withTargetFactory($targetFactory)
    {
        $this->targetFactory = $targetFactory;
        return $this;
    }

    /**
     * @return Services
     */
    public function build()
    {
        if ($this->deploymentConfig === null) {
            throw new \RuntimeException('Config could not be null');
        }
        if ($this->remoteConnector === null) {
            $this->remoteConnector = new SshConnector();
        }
        if ($this->contextGenerationStrategy === null) {
            $this->contextGenerationStrategy = new SimpleContextGenerationStrategy();
        }
        if ($this->compositeTargetExecutor === null) {
            $this->compositeTargetExecutor = new SimpleCompositeTargetExecutor();
        }
        if ($this->targetFactory === null) {
            $this->targetFactory = new DefaultTargetFactory();
        }

        return new Services(
            $this->deploymentConfig,
            $this->remoteConnector,
            $this->compositeTargetExecutor,
            $this->contextGenerationStrategy,
            $this->targetFactory
        );
    }
}