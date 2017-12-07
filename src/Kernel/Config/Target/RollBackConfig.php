<?php


namespace Kugaudo\PhpDeployer\Kernel\Config\Target;


class RollBackConfig
{
    /** @var boolean */
    private $cleanupDeliveryTargetDir;

    /**
     * @return bool
     */
    public function isCleanupDeliveryTargetDir()
    {
        return $this->cleanupDeliveryTargetDir;
    }

    /**
     * @param bool $cleanupDeliveryTargetDir
     * @return RollBackConfig
     */
    public function setCleanupDeliveryTargetDir($cleanupDeliveryTargetDir)
    {
        $this->cleanupDeliveryTargetDir = $cleanupDeliveryTargetDir;
        return $this;
    }

}