<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Deploy\Executor;


use Kugaudo\PhpDeployer\Kernel\ServiceContainer;
use Kugaudo\PhpDeployer\Kernel\Services\Deploy\Context\DeploymentContext;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Aware\ContextAwareTarget;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\RollingTarget;

class SimpleCompositeTargetExecutor implements CompositeTargetExecutor
{
    /**
     * @param string[] $targetNames
     * @param callable $executionHandler
     * @param DeploymentContext $deploymentContext
     */
    public function execute(array $targetNames, $executionHandler, $deploymentContext)
    {
        $targets = $this->getTargetServices($targetNames);
        $this->checkTargetOrder($targets);
        $this->passDeploymentContext($targets, $deploymentContext);

        $executionStack = [];

        foreach ($targets as $target) {
            array_unshift($executionStack, $target);
            $status = $target->rollOut();
            $executionHandler($target->getTargetName(), $status->getMessage());

            if ($status->isRollBack()) {
                $this->rollBackAll($executionStack, $executionHandler);
                break;
            }
        }
    }

    /**
     * @param RollingTarget[] $executionStack
     * @param callable $executionHandler
     */
    private function rollBackAll($executionStack, $executionHandler)
    {
        foreach ($executionStack as $target) {
            $status = $target->rollBack();
            $executionHandler($target->getTargetName(), $status->getMessage());
        }
    }

    /**
     * @param string[] $targetNames
     * @return RollingTarget[]
     */
    private function getTargetServices(array $targetNames)
    {
        $targets = [];
        $supported = ServiceContainer::instance()->getServices()->getSupportedTargets();
        foreach ($targetNames as $targetName) {
            if (!array_key_exists($targetName, $supported)) {
                throw new \RuntimeException(sprintf('Target [%s] not supported', $targetName));
            }
            $targets[] = $supported[$targetName];
        }
        return $targets;
    }

    /**
     * @param RollingTarget[] $targets
     */
    private function checkTargetOrder(array $targets)
    {
        $queue = [];
        foreach ($targets as $target) {
            foreach ($target->getDependents() as $targetName) {
                if (!in_array($targetName, $queue)) {
                    throw new \RuntimeException('Invalid target order');
                }
            }
            $queue[] = $target->getTargetName();
        }
    }

    /**
     * @param RollingTarget[] $targets
     * @param DeploymentContext $deploymentContext
     */
    private function passDeploymentContext($targets, $deploymentContext)
    {
        foreach ($targets as $target) {
            if ($target instanceof ContextAwareTarget) {
                $target->setDeploymentContext($deploymentContext);
            }
        }
    }
}