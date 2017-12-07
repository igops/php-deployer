<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\Templates;


use Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\RollingTarget;

abstract class CacheWarmupTemplate implements RollingTarget
{
    /**
     * @return string
     */
    public function getTargetName()
    {
        return 'cache-warmup';
    }

    /**
     * @return string[]
     */
    public function getDependents()
    {
        return [
            'cache-clear',
        ];
    }
}