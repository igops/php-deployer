<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Target\Connector\Connectors\SSH;


use Kugaudo\PhpDeployer\Kernel\ServiceContainer;
use Kugaudo\PhpDeployer\Kernel\Services\Shell\Command\ShellCommandResponse;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Connector\Auth\AuthBuilder;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Connector\Connectors\SSH\Auth\SshAuthByPassword;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Connector\Connectors\SSH\Auth\SshAuthByPrivateKey;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Connector\RemoteConnector;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Connector\RemoteConnectorConnectionStatus;
use phpseclib\Net\SSH2;

class SshConnector implements RemoteConnector
{
    /** @var SSH2 */
    private $shell;

    /**
     * @return RemoteConnectorConnectionStatus
     */
    public function connect()
    {
        $config = ServiceContainer::instance()->getConfig()->getConnectorConfig();

        $this->shell = new SSH2($config->getHost(), $config->getPort());

        return (new AuthBuilder())
            ->withConnector($this)
            ->withConfig($config)
            ->withAuthByPrivateKey(new SshAuthByPrivateKey())
            ->withAuthByPassword(new SshAuthByPassword())
            ->build()
            ->execute()
        ;
    }

    /**
     * @param $command
     * @return ShellCommandResponse
     */
    public function execute($command)
    {
        $output = $this->shell->exec($command);
        return new ShellCommandResponse($output);
    }

    /**
     * @return RemoteConnectorConnectionStatus
     */
    public function closeConnection()
    {
        $this->shell->disconnect();
        return RemoteConnectorConnectionStatus::disconnected();
    }

    /**
     * @return SSH2
     */
    public function getShell()
    {
        return $this->shell;
    }
}