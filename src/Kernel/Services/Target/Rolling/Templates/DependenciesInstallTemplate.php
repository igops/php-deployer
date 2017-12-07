<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\Templates;


use Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\RollingTarget;

abstract class DependenciesInstallTemplate implements RollingTarget
{
    /**
     * @return string
     */
    public function getTargetName()
    {
        return 'dependencies-install';
    }

    public function getDependents()
    {
        return [
            'delivery-do',
        ];
    }
}