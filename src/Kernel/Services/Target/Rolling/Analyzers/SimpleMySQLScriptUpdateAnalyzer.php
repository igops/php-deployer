<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\Analyzers;


use Kugaudo\PhpDeployer\Kernel\Services\Shell\Command\ShellCommandResponse;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\RollingStatus;

class SimpleMySQLScriptUpdateAnalyzer
{
    /**
     * @param ShellCommandResponse $response
     * @return RollingStatus
     */
    public static function analyze(ShellCommandResponse $response)
    {
        // TODO remove dummy code
        if (strpos($response->getResponse(), 'error') !== false) {
            return RollingStatus::ok('Script completed without errors');
        }

        return RollingStatus::rollBack();
    }
}