<?php


namespace Kugaudo\PhpDeployer\Kernel\Utils;


class FilePathUtil
{
    /**
     * @param string $dirName
     * @param string $fileName
     * @return string
     */
    public static function buildPath($dirName, $fileName)
    {
        return rtrim($dirName,"/") . $fileName;
    }
}