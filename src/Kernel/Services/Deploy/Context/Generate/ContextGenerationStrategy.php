<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Deploy\Context\Generate;


interface ContextGenerationStrategy
{
    /**
     * @param string $versionFrom
     * @param string $versionTo
     * @return string
     */
    public function generateDeliveryDirectoryName($versionFrom, $versionTo);

    /**
     * @param string $versionFrom
     * @param string $versionTo
     * @return string
     */
    public function generateDatabaseBackupName($versionFrom, $versionTo);

}