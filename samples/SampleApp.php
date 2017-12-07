<?php


namespace Kugaudo\PhpDeployer\Samples;


use Kugaudo\PhpDeployer\Kernel\Config\Connector\RemoteConnectorConfig;
use Kugaudo\PhpDeployer\Kernel\Config\DeploymentConfig;
use Kugaudo\PhpDeployer\Kernel\Config\Target\RollBackConfig;
use Kugaudo\PhpDeployer\Kernel\Config\Target\RollOutConfig;
use Kugaudo\PhpDeployer\Kernel\DeployerApp;
use Kugaudo\PhpDeployer\Kernel\Services\ServicesBuilder;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Connector\Connectors\SSH\SshConnector;

require_once __DIR__.'/../vendor/autoload.php';

// NOT TESTED YET!

(new DeployerApp(
    (new ServicesBuilder())
        ->withDeploymentConfig(new DeploymentConfig(
            new RollOutConfig(),
            new RollBackConfig(),
            new RemoteConnectorConfig()
        ))
        ->withRemoteConnector(new SshConnector())
        ->build()
    ))
    ->deploy('1.0.0', '2.0.0', [
        'delivery-prepare',
        'delivery-do',
        'cache-clear'
    ], function($target, $message) {
        echo $target . ': ' . $message . PHP_EOL;
    });