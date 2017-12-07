<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Target\Aware;


use Kugaudo\PhpDeployer\Kernel\Services\Deploy\Context\DeploymentContext;

trait ContextAwareTargetTrait
{
    /** @var DeploymentContext */
    private $deploymentContext;

    /**
     * @param DeploymentContext $deploymentContext
     */
    public function setDeploymentContext($deploymentContext)
    {
        $this->deploymentContext = $deploymentContext;
    }
}