<?php


namespace Kugaudo\PhpDeployer\Kernel\Config\Target;


class RollOutConfig
{
    /** @var string */
    private $repoOrigin;

    /** @var string */
    private $databaseName;

    /** @var string */
    private $databaseUser;

    /** @var string */
    private $databasePassword;

    /** @var string */
    private $databaseUpdateScriptPath;

    /** @var string */
    private $databaseBackupParentDir;

    /**
     * @return string
     */
    public function getRepoOrigin()
    {
        return $this->repoOrigin;
    }

    /**
     * @param string $repoOrigin
     * @return RollOutConfig
     */
    public function setRepoOrigin($repoOrigin)
    {
        $this->repoOrigin = $repoOrigin;
        return $this;
    }

    /**
     * @return string
     */
    public function getDatabaseName()
    {
        return $this->databaseName;
    }

    /**
     * @param string $databaseName
     * @return RollOutConfig
     */
    public function setDatabaseName($databaseName)
    {
        $this->databaseName = $databaseName;
        return $this;
    }

    /**
     * @return string
     */
    public function getDatabaseUser()
    {
        return $this->databaseUser;
    }

    /**
     * @param string $databaseUser
     * @return RollOutConfig
     */
    public function setDatabaseUser($databaseUser)
    {
        $this->databaseUser = $databaseUser;
        return $this;
    }

    /**
     * @return string
     */
    public function getDatabasePassword()
    {
        return $this->databasePassword;
    }

    /**
     * @param string $databasePassword
     * @return RollOutConfig
     */
    public function setDatabasePassword($databasePassword)
    {
        $this->databasePassword = $databasePassword;
        return $this;
    }

    /**
     * @return string
     */
    public function getDatabaseUpdateScriptPath()
    {
        return $this->databaseUpdateScriptPath;
    }

    /**
     * @param string $databaseUpdateScriptPath
     * @return RollOutConfig
     */
    public function setDatabaseUpdateScriptPath($databaseUpdateScriptPath)
    {
        $this->databaseUpdateScriptPath = $databaseUpdateScriptPath;
        return $this;
    }

    /**
     * @return string
     */
    public function getDatabaseBackupParentDir()
    {
        return $this->databaseBackupParentDir;
    }

    /**
     * @param string $databaseBackupParentDir
     * @return RollOutConfig
     */
    public function setDatabaseBackupParentDir($databaseBackupParentDir)
    {
        $this->databaseBackupParentDir = $databaseBackupParentDir;
        return $this;
    }
}