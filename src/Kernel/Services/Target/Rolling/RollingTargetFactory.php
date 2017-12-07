<?php

namespace Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling;

interface RollingTargetFactory
{
    /**
     * @return RollingTarget[]
     */
    public function produceSupported();

}