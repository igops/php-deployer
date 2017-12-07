<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Target\Connector\Auth;


use Kugaudo\PhpDeployer\Kernel\Config\Connector\RemoteConnectorConfig;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Connector\RemoteConnector;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Connector\RemoteConnectorConnectionStatus;

class AuthPerformer
{
    /** @var RemoteConnector */
    private $connector;

    /** @var RemoteConnectorConfig */
    private $config;

    /** @var AuthStrategy[] */
    private $strategies;

    /**
     * AuthPerformer constructor.
     * @param RemoteConnector $connector
     * @param RemoteConnectorConfig $config
     * @param AuthStrategy[] $strategies
     */
    public function __construct(RemoteConnector $connector, RemoteConnectorConfig $config, array $strategies)
    {
        $this->connector = $connector;
        $this->config = $config;
        $this->strategies = $strategies;
    }

    /**
     * @return RemoteConnector
     */
    public function getConnector()
    {
        return $this->connector;
    }

    /**
     * @return RemoteConnectorConfig
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @return AuthStrategy[]
     */
    public function getStrategies()
    {
        return $this->strategies;
    }

    /**
     * @return RemoteConnectorConnectionStatus
     */
    public function execute()
    {
        $authMethod = $this->config->getAuthMethod();
        if (!array_key_exists($authMethod, $this->strategies)) {
            throw new \RuntimeException('Required auth method not provided');
        }
        return $this->strategies[$authMethod]->execute($this->connector, $this->config);
    }
}