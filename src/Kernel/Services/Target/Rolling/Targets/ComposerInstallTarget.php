<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\Targets;


use Kugaudo\PhpDeployer\Kernel\Services\Shell\Command\PlainShellCommand;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Aware\ContainerAwareTarget;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Aware\ContainerAwareTargetTrait;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\RollingStatus;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\Templates\DependenciesInstallTemplate;

class ComposerInstallTarget extends DependenciesInstallTemplate implements ContainerAwareTarget
{
    use ContainerAwareTargetTrait;

    /**
     * @return RollingStatus
     */
    public function rollOut()
    {
        $command = new PlainShellCommand('composer install');
        $this->shellHandler->execute($command);

        return RollingStatus::ok('Dependencies installed');
    }

    /**
     * @return RollingStatus
     */
    public function rollBack()
    {
        return RollingStatus::skip();
    }
}