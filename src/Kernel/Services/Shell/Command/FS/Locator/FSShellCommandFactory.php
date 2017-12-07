<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Shell\Command\FS\Locator;


use Kugaudo\PhpDeployer\Kernel\ServiceContainer;
use Kugaudo\PhpDeployer\Kernel\Services\Shell\Command\FS\Linux\LinuxChangeDirCommand;
use Kugaudo\PhpDeployer\Kernel\Services\Shell\Command\FS\Linux\LinuxMakeDirCommand;
use Kugaudo\PhpDeployer\Kernel\Services\Shell\Command\FS\Linux\LinuxRemoveDirCommand;
use Kugaudo\PhpDeployer\Kernel\Services\Shell\Command\FS\MakeDirCommand;
use Kugaudo\PhpDeployer\Kernel\Services\Shell\Command\FS\RemoveDirCommand;
use Kugaudo\PhpDeployer\Kernel\Services\Shell\OperatingSystem;

class FSShellCommandFactory
{
    /** @var boolean */
    private $isLinux;

    /**
     * ShellCommandFactory constructor.
     */
    public function __construct()
    {
        $operatingSystem = ServiceContainer::instance()->getConfig()->getConnectorConfig()->getOsFamily();
        $this->isLinux = OperatingSystem::isLinux($operatingSystem);
    }

    /**
     * @param string $targetDir
     * @return LinuxChangeDirCommand
     */
    public function changeDir($targetDir)
    {
        if ($this->isLinux) {
            return new LinuxChangeDirCommand($targetDir);
        }
        throw new \RuntimeException('Should never happen');
    }

    /**
     * @param string $targetDir
     * @return MakeDirCommand
     */
    public function makeDir($targetDir)
    {
        if ($this->isLinux) {
            return new LinuxMakeDirCommand($targetDir);
        }
        throw new \RuntimeException('Should never happen');
    }

    /**
     * @param string $targetDir
     * @return RemoveDirCommand
     */
    public function removeDir($targetDir)
    {
        if ($this->isLinux) {
            return new LinuxRemoveDirCommand($targetDir);
        }
        throw new \RuntimeException('Should never happen');
    }
}