<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\Targets;


use Kugaudo\PhpDeployer\Kernel\Services\Shell\Command\PlainShellCommand;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Aware\ContainerAwareTarget;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Aware\ContainerAwareTargetTrait;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Aware\ContextAwareTarget;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Aware\ContextAwareTargetTrait;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\Analyzers\SimpleMySQLScriptUpdateAnalyzer;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\RollingStatus;
use Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling\Templates\DatabaseMigrateTemplate;
use Kugaudo\PhpDeployer\Kernel\Utils\FilePathUtil;

class SimpleMySQLScriptUpdateTarget extends DatabaseMigrateTemplate implements ContainerAwareTarget, ContextAwareTarget
{
    use ContainerAwareTargetTrait;
    use ContextAwareTargetTrait;

    /**
     * @return RollingStatus
     */
    public function rollOut()
    {
        $this->backup();

        $config = $this->deploymentConfig->getRollOutConfig();
        $this->shellHandler->execute(new PlainShellCommand(
            sprintf('mysql -u %s -p %s < %s', $config->getDatabaseUser(), $config->getDatabaseName(), $config->getDatabaseUpdateScriptPath()))
        );
        $response = $this->shellHandler->execute(new PlainShellCommand(
            $config->getDatabasePassword()
        ));

        return SimpleMySQLScriptUpdateAnalyzer::analyze($response);
    }

    /**
     * @return RollingStatus
     */
    public function rollBack()
    {
        $this->restore();
        return RollingStatus::ok('Database restored');
    }

    /**
     * @return string
     */
    private function getBackupFilePath()
    {
        $config = $this->deploymentConfig->getRollOutConfig();
        return FilePathUtil::buildPath(
            $config->getDatabaseBackupParentDir(),
            $this->deploymentContext->getDatabaseBackupName());
    }

    private function backup()
    {
        $config = $this->deploymentConfig->getRollOutConfig();
        $this->shellHandler->execute(new PlainShellCommand(
            sprintf('mysqldump %s > %s', $config->getDatabaseName(), $this->getBackupFilePath())
        ));
    }

    private function restore()
    {
        $config = $this->deploymentConfig->getRollOutConfig();
        $this->shellHandler->execute(new PlainShellCommand(
            sprintf('mysql %s < %s', $config->getDatabaseName(), $this->getBackupFilePath())
        ));
    }
}