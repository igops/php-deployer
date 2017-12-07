<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Target\Connector\Connectors\SSH\Auth;


use Kugaudo\PhpDeployer\Kernel\Config\Connector\RemoteConnectorConfig;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Connector\Auth\AuthStrategy;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Connector\Connectors\SSH\SshConnector;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Connector\RemoteConnector;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Connector\RemoteConnectorConnectionStatus;

class SshAuthByPassword implements AuthStrategy
{
    /**
     * @param $connector RemoteConnector
     * @param $config RemoteConnectorConfig
     * @return RemoteConnectorConnectionStatus
     */
    public function execute($connector, $config)
    {
        if (!($connector instanceof SshConnector)) {
            throw new \RuntimeException('Invalid class');
        }

        if (!$connector->getShell()->login($config->getUsername(), $config->getPassword())) {
            return RemoteConnectorConnectionStatus::loginFailed();
        }

        return RemoteConnectorConnectionStatus::loginSuccessful();
    }
}