<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\Templates;


use Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\RollingTarget;

abstract class DatabaseDataFixTemplate implements RollingTarget
{
    /**
     * @return string
     */
    public function getTargetName()
    {
        return 'db-datafix';
    }

    /**
     * @return string[]
     */
    public function getDependents()
    {
        return [
            'db-migrate',
        ];
    }
}