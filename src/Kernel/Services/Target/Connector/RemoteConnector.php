<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Target\Connector;


use Kugaudo\PhpDeployer\Kernel\Services\Shell\Command\ShellCommandResponse;

interface RemoteConnector
{
    /**
     * @return RemoteConnectorConnectionStatus
     */
    public function connect();

    /**
     * @param string $command
     * @return ShellCommandResponse
     */
    public function execute($command);

    /**
     * @return RemoteConnectorConnectionStatus
     */
    public function closeConnection();

}