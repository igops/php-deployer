<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling;


interface RollingTarget
{
    /**
     * @return RollingStatus
     */
    public function rollOut();

    /**
     * @return RollingStatus
     */
    public function rollBack();

    /**
     * @return string[]
     */
    public function getDependents();

    /**
     * @return string
     */
    public function getTargetName();

}