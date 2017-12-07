<?php

namespace Kugaudo\PhpDeployer\Kernel\Services\Deploy;

interface Deployer
{
    /**
     * @param string $versionFrom
     * @param string $versionTo
     * @param string[] $targetNames
     * @param callable $executionHandler
     * @return
     */
    public function deploy($versionFrom, $versionTo, $targetNames, $executionHandler);

}