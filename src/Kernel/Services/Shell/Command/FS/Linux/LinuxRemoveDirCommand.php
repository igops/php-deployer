<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Shell\Command\FS\Linux;


use Kugaudo\PhpDeployer\Kernel\Services\Shell\Command\FS\RemoveDirCommand;

class LinuxRemoveDirCommand implements RemoveDirCommand
{
    /** @var string */
    private $targetDir;

    /**
     * LinuxRemoveDirCommand constructor.
     * @param string $targetDir
     */
    public function __construct($targetDir)
    {
        $this->targetDir = $targetDir;
    }

    /**
     * @return string
     */
    public function getTargetDir()
    {
        return $this->targetDir;
    }

    /**
     * @return string
     */
    public function toPlain()
    {
        return 'rm -rf ' . $this->targetDir;
    }
}