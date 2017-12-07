<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Shell\Command;


class PlainShellCommand implements ShellCommand
{

    private $plain;

    /**
     * PlainShellCommand constructor.
     * @param $plain
     */
    public function __construct($plain)
    {
        $this->plain = $plain;
    }

    /**
     * @return string
     */
    public function toPlain()
    {
        return $this->plain;
    }
}