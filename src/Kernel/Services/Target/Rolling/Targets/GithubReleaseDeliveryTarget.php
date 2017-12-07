<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\Targets;


use Kugaudo\PhpDeployer\Kernel\Services\Shell\Command\VCS\Git\GitCloneCommand;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Aware\ContainerAwareTarget;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Aware\ContainerAwareTargetTrait;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\RollingStatus;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\Templates\DeliveryDoTemplate;

class GithubReleaseDeliveryTarget extends DeliveryDoTemplate implements ContainerAwareTarget
{
    use ContainerAwareTargetTrait;

    /**
     * @return RollingStatus
     */
    public function rollOut()
    {
        $origin = $this->deploymentConfig->getRollOutConfig()->getRepoOrigin();
        $this->shellHandler->execute(new GitCloneCommand($origin, '.'));

        return RollingStatus::ok('Artifact delivered');
    }

    /**
     * @return RollingStatus
     */
    public function rollBack()
    {
        return RollingStatus::skip();
    }
}