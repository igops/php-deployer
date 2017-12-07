<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Shell;


class OperatingSystem
{

    const OS_LINUX = 1;

    /**
     * @param $operatingSystem
     * @return bool
     */
    public static function isLinux($operatingSystem)
    {
        return $operatingSystem === self::OS_LINUX;
    }

}