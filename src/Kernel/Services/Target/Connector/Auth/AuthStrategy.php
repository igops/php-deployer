<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Target\Connector\Auth;


use Kugaudo\PhpDeployer\Kernel\Config\Connector\RemoteConnectorConfig;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Connector\RemoteConnector;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Connector\RemoteConnectorConnectionStatus;

interface AuthStrategy
{
    /**
     * @param $connector RemoteConnector
     * @param $config RemoteConnectorConfig
     * @return RemoteConnectorConnectionStatus
     */
    public function execute($connector, $config);

}