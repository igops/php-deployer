<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\Targets;


use Kugaudo\PhpDeployer\Kernel\Services\Shell\Command\FS\Locator\FSShellCommands;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Aware\ContainerAwareTarget;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Aware\ContainerAwareTargetTrait;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Aware\ContextAwareTarget;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Aware\ContextAwareTargetTrait;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\RollingStatus;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\Templates\DeliveryPrepareTemplate;

class DeliveryPrepareTarget extends DeliveryPrepareTemplate implements ContainerAwareTarget, ContextAwareTarget
{
    use ContainerAwareTargetTrait;
    use ContextAwareTargetTrait;

    /**
     * @return RollingStatus
     */
    public function rollOut()
    {
        $deliveryTargetDir = $this->deploymentContext->getDeliveryDirectoryName();
        $this->shellHandler->execute(FSShellCommands::makeDir($deliveryTargetDir));
        $this->shellHandler->execute(FSShellCommands::changeDir($deliveryTargetDir));

        return RollingStatus::ok('Delivery dir created');
    }

    /**
     * @return RollingStatus
     */
    public function rollBack()
    {
        if ($this->deploymentConfig->getRollBackConfig()->isCleanupDeliveryTargetDir()) {
            $deliveryTargetDir = $this->deploymentContext->getDeliveryDirectoryName();
            FSShellCommands::removeDir($deliveryTargetDir);
            return RollingStatus::ok('Delivery dir removed');
        }

        return RollingStatus::skip();
    }
}