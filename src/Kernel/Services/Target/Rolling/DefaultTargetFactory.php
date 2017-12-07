<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling;


use Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\Targets\ComposerInstallTarget;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\Targets\DeliveryPrepareTarget;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\Targets\GithubReleaseDeliveryTarget;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\Targets\SimpleMySQLScriptUpdateTarget;

class DefaultTargetFactory implements RollingTargetFactory
{
    /**
     * @return RollingTarget[]
     */
    public function produceSupported() {

        return [
            new DeliveryPrepareTarget(),
            new GithubReleaseDeliveryTarget(),
            new ComposerInstallTarget(),
            new SimpleMySQLScriptUpdateTarget(),
        ];
    }
}