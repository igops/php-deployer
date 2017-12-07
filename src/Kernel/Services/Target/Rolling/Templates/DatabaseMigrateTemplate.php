<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\Templates;


use Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\RollingTarget;

abstract class DatabaseMigrateTemplate implements RollingTarget
{
    /**
     * @return string
     */
    public function getTargetName()
    {
        return 'db-migrate';
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