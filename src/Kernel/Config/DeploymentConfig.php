<?php


namespace Kugaudo\PhpDeployer\Kernel\Config;


use Kugaudo\PhpDeployer\Kernel\Config\Connector\RemoteConnectorConfig;
use Kugaudo\PhpDeployer\Kernel\Config\Target\RollBackConfig;
use Kugaudo\PhpDeployer\Kernel\Config\Target\RollOutConfig;

class DeploymentConfig
{
    /** @var RollOutConfig */
    private $rollOutConfig;

    /** @var RollBackConfig */
    private $rollBackConfig;

    /** @var RemoteConnectorConfig */
    private $connectorConfig;

    /**
     * DeploymentConfig constructor.
     * @param RollOutConfig $prepareWorkDirConfig
     * @param RollBackConfig $rollBackConfig
     * @param RemoteConnectorConfig $connectorConfig
     */
    public function __construct(RollOutConfig $prepareWorkDirConfig,
                                RollBackConfig $rollBackConfig,
                                RemoteConnectorConfig $connectorConfig)
    {
        $this->rollOutConfig = $prepareWorkDirConfig;
        $this->rollBackConfig = $rollBackConfig;
        $this->connectorConfig = $connectorConfig;
    }

    /**
     * @return RollOutConfig
     */
    public function getRollOutConfig()
    {
        return $this->rollOutConfig;
    }

    /**
     * @return RollBackConfig
     */
    public function getRollBackConfig()
    {
        return $this->rollBackConfig;
    }

    /**
     * @return RemoteConnectorConfig
     */
    public function getConnectorConfig()
    {
        return $this->connectorConfig;
    }
}