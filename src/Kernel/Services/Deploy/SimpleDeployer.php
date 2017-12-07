<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Deploy;


use Kugaudo\PhpDeployer\Kernel\Services\Deploy\Context\DeploymentContext;
use Kugaudo\PhpDeployer\Kernel\Services\Deploy\Context\Generate\ContextGenerationStrategy;
use Kugaudo\PhpDeployer\Kernel\Services\Deploy\Executor\CompositeTargetExecutor;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Connector\RemoteConnector;

class SimpleDeployer implements Deployer
{
    private $lock = false;

    /** @var RemoteConnector */
    private $connector;

    /** @var CompositeTargetExecutor */
    private $executor;

    /** @var ContextGenerationStrategy */
    private $contextGenerationStrategy;

    /**
     * Deployer constructor.
     * @param RemoteConnector $connector
     * @param CompositeTargetExecutor $executor
     * @param ContextGenerationStrategy $contextGenerationStrategy
     */
    public function __construct(RemoteConnector $connector,
                                CompositeTargetExecutor $executor,
                                ContextGenerationStrategy $contextGenerationStrategy)
    {
        $this->connector = $connector;
        $this->executor = $executor;
        $this->contextGenerationStrategy = $contextGenerationStrategy;
    }

    /**
     * @param string $versionFrom
     * @param string $versionTo
     * @param string[] $targetNames
     * @param callable $executionHandler
     */
    public function deploy($versionFrom, $versionTo, $targetNames, $executionHandler)
    {
        if ($this->lock) {
            throw new \RuntimeException('Concurrent execution is not supported');
        }
        $this->lock = true;

        $connectionStatus = $this->connector->connect();
        $executionHandler('Remote host', $connectionStatus->getMessage());

        if (!$connectionStatus->isSuccessful()) {
            $this->connector->closeConnection();
            return;
        }

        $deploymentContext = new DeploymentContext($versionFrom, $versionTo, $this->contextGenerationStrategy);

        $this->executor->execute($targetNames, $executionHandler, $deploymentContext);
        $this->connector->closeConnection();

        $this->lock = false;
    }
}