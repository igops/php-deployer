<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Target\Aware;


use Kugaudo\PhpDeployer\Kernel\Services\Deploy\Context\DeploymentContext;

interface ContextAwareTarget
{
    /**
     * @param DeploymentContext $deploymentContext
     */
    public function setDeploymentContext($deploymentContext);

}