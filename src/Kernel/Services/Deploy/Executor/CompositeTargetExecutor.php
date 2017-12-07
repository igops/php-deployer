<?php

namespace Kugaudo\PhpDeployer\Kernel\Services\Deploy\Executor;

use Kugaudo\PhpDeployer\Kernel\Services\Deploy\Context\DeploymentContext;

interface CompositeTargetExecutor
{
    /**
     * @param string[] $targetNames
     * @param callable $executionHandler
     * @param DeploymentContext $deploymentContext
     */
    public function execute(array $targetNames, $executionHandler, $deploymentContext);

}