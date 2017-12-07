<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Target\Connector;


use Kugaudo\PhpDeployer\Kernel\Services\Shell\Command\ShellCommand;
use Kugaudo\PhpDeployer\Kernel\Services\Shell\Command\ShellCommandResponse;

class RemoteShellHandler
{
    /** @var RemoteConnector */
    private $connector;

    /**
     * RemoteShellHandler constructor.
     * @param RemoteConnector $connector
     */
    public function __construct(RemoteConnector $connector)
    {
        $this->connector = $connector;
    }

    /**
     * @param ShellCommand $command
     * @return ShellCommandResponse
     */
    public function execute($command)
    {
        return $this->connector->execute($command->toPlain());
    }
}