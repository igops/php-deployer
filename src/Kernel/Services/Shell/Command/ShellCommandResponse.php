<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Shell\Command;


class ShellCommandResponse
{
    /** @var string */
    private $response;

    /**
     * RemoteConnectorResponse constructor.
     * @param string $response
     */
    public function __construct($response)
    {
        $this->response = $response;
    }

    /**
     * @return string
     */
    public function getResponse()
    {
        return $this->response;
    }
}