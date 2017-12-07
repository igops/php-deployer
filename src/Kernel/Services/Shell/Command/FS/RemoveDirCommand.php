<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Shell\Command\FS;


use Kugaudo\PhpDeployer\Kernel\Services\Shell\Command\ShellCommand;

interface RemoveDirCommand extends ShellCommand
{
    /**
     * @return string
     */
    public function getTargetDir();

}