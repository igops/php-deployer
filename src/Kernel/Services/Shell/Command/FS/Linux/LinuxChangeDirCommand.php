<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Shell\Command\FS\Linux;


use Kugaudo\PhpDeployer\Kernel\Services\Shell\Command\FS\ChangeDirCommand;

class LinuxChangeDirCommand implements ChangeDirCommand
{
    /** @var string */
    private $targetDir;

    /**
     * ChangeDirCommand constructor.
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
        return 'cd ' . $this->targetDir;
    }

    /**
     * @return string
     */
    public function getTargetDir()
    {
        return $this->targetDir;
    }
}