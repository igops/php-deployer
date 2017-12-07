<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Shell\Command\FS\Locator;


use Kugaudo\PhpDeployer\Kernel\ServiceContainer;
use Kugaudo\PhpDeployer\Kernel\Services\Shell\Command\FS\ChangeDirCommand;
use Kugaudo\PhpDeployer\Kernel\Services\Shell\Command\FS\MakeDirCommand;
use Kugaudo\PhpDeployer\Kernel\Services\Shell\Command\FS\RemoveDirCommand;

class FSShellCommands
{
    /**
     * @param $dir
     * @return ChangeDirCommand
     */
    public static function changeDir($dir)
    {
        return ServiceContainer::instance()->getServices()->getShellCommandFactory()->changeDir($dir);
    }

    /**
     * @param $dir
     * @return MakeDirCommand
     */
    public static function makeDir($dir)
    {
        return ServiceContainer::instance()->getServices()->getShellCommandFactory()->makeDir($dir);
    }

    /**
     * @param $dir
     * @return RemoveDirCommand
     */
    public static function removeDir($dir)
    {
        return ServiceContainer::instance()->getServices()->getShellCommandFactory()->removeDir($dir);
    }
}