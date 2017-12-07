<?php


namespace Kugaudo\PhpDeployer\Kernel\Config\Connector;


class RemoteConnectorConfig
{

    const AUTH_METHOD_PASSWORD = 1;
    const AUTH_METHOD_PRIVATE_KEY = 2;

    /** @var string */
    private $host;

    /** @var int */
    private $port = 22;

    /** @var int */
    private $authMethod;

    /** @var string */
    private $username;

    /** @var string */
    private $password;

    /** @var string */
    private $privateKey;

    /** @var int */
    private $osFamily;

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param string $host
     * @return RemoteConnectorConfig
     */
    public function setHost($host)
    {
        $this->host = $host;
        return $this;
    }

    /**
     * @return int
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param int $port
     * @return RemoteConnectorConfig
     */
    public function setPort($port)
    {
        $this->port = $port;
        return $this;
    }

    /**
     * @return int
     */
    public function getAuthMethod()
    {
        return $this->authMethod;
    }

    /**
     * @param int $authMethod
     * @return RemoteConnectorConfig
     */
    public function setAuthMethod($authMethod)
    {
        $this->authMethod = $authMethod;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return RemoteConnectorConfig
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return RemoteConnectorConfig
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrivateKey()
    {
        return $this->privateKey;
    }

    /**
     * @param string $privateKey
     * @return RemoteConnectorConfig
     */
    public function setPrivateKey($privateKey)
    {
        $this->privateKey = $privateKey;
        return $this;
    }

    /**
     * @return int
     */
    public function getOsFamily()
    {
        return $this->osFamily;
    }

    /**
     * @param int $osFamily
     * @return RemoteConnectorConfig
     */
    public function setOsFamily($osFamily)
    {
        $this->osFamily = $osFamily;
        return $this;
    }
}