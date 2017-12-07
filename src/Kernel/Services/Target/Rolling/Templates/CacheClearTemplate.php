<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\Templates;


use Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\RollingTarget;

abstract class CacheClearTemplate implements RollingTarget
{
    /**
     * @return string
     */
    public function getTargetName()
    {
        return 'cache-clear';
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