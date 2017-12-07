<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Deploy\Context\Generate;


class SimpleContextGenerationStrategy implements ContextGenerationStrategy
{
    /**
     * @param string $versionFrom
     * @param string $versionTo
     * @return string
     */
    public function generateDeliveryDirectoryName($versionFrom, $versionTo)
    {
        return $versionTo . '_' . time();
    }

    /**
     * @param string $versionFrom
     * @param string $versionTo
     * @return string
     */
    public function generateDatabaseBackupName($versionFrom, $versionTo)
    {
        return $versionFrom . '_' . time() . '.sql';
    }
}