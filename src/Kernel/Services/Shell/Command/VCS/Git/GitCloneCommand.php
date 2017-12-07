<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Shell\Command\VCS\Git;


use Kugaudo\PhpDeployer\Kernel\Services\Shell\Command\VCS\VcsCloneCommand;

class GitCloneCommand implements VcsCloneCommand
{
    /** @var string */
    private $origin;

    /** @var string */
    private $targetDir;

    /** @var string */
    private $params;

    /**
     * GitCloneCommand constructor.
     * @param string $origin
     * @param string $targetDir
     * @param string $params
     */
    public function __construct($origin, $targetDir, $params = '')
    {
        $this->origin = $origin;
        $this->targetDir = $targetDir;
        $this->params = $params;
    }

    /**
     * @return string
     */
    public function toPlain()
    {
        return sprintf('git clone %s %s %s', $this->origin, $this->targetDir, $this->params);
    }

    /**
     * @return string
     */
    public function getOrigin()
    {
        return $this->origin;
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
    public function getParams()
    {
        return $this->params;
    }
}