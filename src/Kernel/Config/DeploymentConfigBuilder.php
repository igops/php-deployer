<?php


namespace Kugaudo\PhpDeployer\Kernel\Config;


use Kugaudo\PhpDeployer\Kernel\Config\Connector\RemoteConnectorConfig;
use Kugaudo\PhpDeployer\Kernel\Config\Target\RollBackConfig;
use Kugaudo\PhpDeployer\Kernel\Config\Target\RollOutConfig;

class DeploymentConfigBuilder
{
    /** @var RollOutConfig */
    private $rollOutConfig;

    /** @var RollBackConfig */
    private $rollBackConfig;

    /** @var RemoteConnectorConfig */
    private $connectorConfig;

    /**
     * @param RollOutConfig $rollOutConfig
     * @return DeploymentConfigBuilder
     */
    public function withRollOutConfig($rollOutConfig)
    {
        $this->rollOutConfig = $rollOutConfig;
        return $this;
    }

    /**
     * @param RollBackConfig $rollBackConfig
     * @return DeploymentConfigBuilder
     */
    public function withtRollBackConfig($rollBackConfig)
    {
        $this->rollBackConfig = $rollBackConfig;
        return $this;
    }

    /**
     * @param RemoteConnectorConfig $connectorConfig
     * @return DeploymentConfigBuilder
     */
    public function withConnectorConfig($connectorConfig)
    {
        $this->connectorConfig = $connectorConfig;
        return $this;
    }

    /**
     * @return DeploymentConfig
     */
    public function build() {
        return new DeploymentConfig(
            $this->rollOutConfig,
            $this->rollBackConfig,
            $this->connectorConfig
        );
    }
}