<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Target\Connector\Connectors\SSH\Auth;


use Kugaudo\PhpDeployer\Kernel\Config\Connector\RemoteConnectorConfig;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Connector\Auth\AuthStrategy;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Connector\Connectors\SSH\SshConnector;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Connector\RemoteConnector;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Connector\RemoteConnectorConnectionStatus;
use phpseclib\Crypt\RSA;

class SshAuthByPrivateKey implements AuthStrategy
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

        $key = new RSA();
        $key->loadKey($config->getPrivateKey());

        if (!$connector->getShell()->login($config->getUsername(), $key)) {
            return RemoteConnectorConnectionStatus::loginFailed();
        }

        return RemoteConnectorConnectionStatus::loginSuccessful();
    }
}