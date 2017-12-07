<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\Templates;


use Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\RollingTarget;

abstract class WorkDirSubstituteTemplate implements RollingTarget
{
    /**
     * @return string
     */
    public function getTargetName()
    {
        return 'workdir-substitute';
    }

    /**
     * @return string[]
     */
    public function getDependents()
    {
        return [
            'delivery-do',
        ];
    }
}