<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Deploy\Context;


use Kugaudo\PhpDeployer\Kernel\Services\Deploy\Context\Generate\ContextGenerationStrategy;

class DeploymentContext
{
    /** @var string */
    private $versionFrom;

    /** @var string */
    private $versionTo;

    /** @var string[] */
    private $completedTargets = [];

    /** @var boolean */
    private $rollBack = false;

    /** @var string */
    private $deliveryDirectoryName;

    /** @var string */
    private $databaseBackupName;

    /**
     * DefaultDeploymentContext constructor.
     * @param string $versionFrom
     * @param string $versionTo
     * @param ContextGenerationStrategy $contextGenerationStrategy
     */
    public function __construct($versionFrom, $versionTo, $contextGenerationStrategy)
    {
        $this->versionFrom = $versionFrom;
        $this->versionTo = $versionTo;

        $this->deliveryDirectoryName = $contextGenerationStrategy->generateDeliveryDirectoryName($versionFrom, $versionTo);
        $this->databaseBackupName = $contextGenerationStrategy->generateDatabaseBackupName($versionFrom, $versionTo);
    }

    /**
     * @return string
     */
    public function getVersionFrom()
    {
        return $this->versionFrom;
    }

    /**
     * @return string
     */
    public function getVersionTo()
    {
        return $this->versionTo;
    }

    /**
     * @return string[]
     */
    public function getCompletedTargets()
    {
        return $this->completedTargets;
    }

    /**
     * @return boolean
     */
    public function isRollBack()
    {
        return $this->rollBack;
    }

    /**
     * @param boolean $rollBack
     */
    public function setRollBack($rollBack)
    {
        $this->rollBack = $rollBack;
    }

    /**
     * @return string
     */
    public function getDeliveryDirectoryName()
    {
        return $this->deliveryDirectoryName;
    }

    /**
     * @return string
     */
    public function getDatabaseBackupName()
    {
        return $this->databaseBackupName;
    }
}