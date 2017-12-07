<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Target\Connector\Auth;


use Kugaudo\PhpDeployer\Kernel\Config\Connector\RemoteConnectorConfig;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Connector\RemoteConnector;

class AuthBuilder
{
    /** @var RemoteConnector */
    private $connector;

    /** @var RemoteConnectorConfig */
    private $config;

    /** @var AuthStrategy[] */
    private $strategies;

    /**
     * @param RemoteConnector $connector
     * @return AuthBuilder
     */
    public function withConnector($connector)
    {
        $this->connector = $connector;
        return $this;
    }

    /**
     * @param RemoteConnectorConfig $config
     * @return AuthBuilder
     */
    public function withConfig($config)
    {
        $this->config = $config;
        return $this;
    }

    /**
     * @param AuthStrategy $strategy
     * @return AuthBuilder
     */
    public function withAuthByPassword($strategy)
    {
        $this->strategies[RemoteConnectorConfig::AUTH_METHOD_PASSWORD] = $strategy;
        return $this;
    }

    /**
     * @param AuthStrategy $strategy
     * @return AuthBuilder
     */
    public function withAuthByPrivateKey($strategy)
    {
        $this->strategies[RemoteConnectorConfig::AUTH_METHOD_PRIVATE_KEY] = $strategy;
        return $this;
    }

    /**
     * @return AuthPerformer
     */
    public function build()
    {
        return new AuthPerformer(
            $this->connector,
            $this->config,
            $this->strategies
        );
    }

}