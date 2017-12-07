<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Shell\Command\VCS;


use Kugaudo\PhpDeployer\Kernel\Services\Shell\Command\ShellCommand;

interface VcsCloneCommand extends ShellCommand
{
    /**
     * @return string
     */
    public function getOrigin();

    /**
     * @return string
     */
    public function getTargetDir();

    /**
     * @return string
     */
    public function getParams();

}