<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\Templates;


use Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\RollingTarget;

abstract class DeliveryPrepareTemplate implements RollingTarget
{
    /**
     * @return string
     */
    public function getTargetName()
    {
        return 'delivery-prepare';
    }

    /**
     * @return string[]
     */
    public function getDependents()
    {
        return [];
    }
}