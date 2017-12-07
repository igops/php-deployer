<?php


namespace Kugaudo\PhpDeployer\Kernel;


use Kugaudo\PhpDeployer\Kernel\Config\DeploymentConfig;
use Kugaudo\PhpDeployer\Kernel\Services\Services;

final class ServiceContainer
{
    /**
     * @var ServiceContainer
     */
    private static $instance;

    /** @var bool */
    private $initialized = false;

    /**
     * @var Services
     */
    private $services;

    /**
     * ServiceContainer constructor.
     */
    private function __construct() {}

    /**
     * @return ServiceContainer
     */
    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @param Services $services
     */
    public function init($services)
    {
        if ($this->initialized) {
            throw new \RuntimeException('Service container already initialized');
        }
        $this->services = $services;
        $this->initialized = true;
    }

    /**
     * @return Services
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * @return DeploymentConfig
     */
    public function getConfig()
    {
        return $this->services->getDeploymentConfig();
    }
}