<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Shell\Command\FS\Linux;


use Kugaudo\PhpDeployer\Kernel\Services\Shell\Command\FS\MakeDirCommand;

class LinuxMakeDirCommand implements MakeDirCommand
{

    /** @var string */
    private $targetDir;

    /**
     * LinuxMakeDirCommand constructor.
     * @param string $targetDir
     */
    public function __construct($targetDir)
    {
        $this->targetDir = $targetDir;
    }

    /**
     * @return string
     */
    public function toPlain()
    {
        return 'mkdir -p ' . $this->targetDir;
    }

    /**
     * @return string
     */
    public function getTargetDir()
    {
        return $this->targetDir;
    }
}