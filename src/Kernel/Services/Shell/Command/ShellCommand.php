<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Shell\Command;


interface ShellCommand
{
    /**
     * @return string
     */
    public function toPlain();

}