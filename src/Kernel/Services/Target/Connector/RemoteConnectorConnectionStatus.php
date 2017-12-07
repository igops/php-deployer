<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Target\Connector;


class RemoteConnectorConnectionStatus
{
    const STATUS_CONNECTED = 0;
    const STATUS_CONNECTION_ERROR = 1;
    const STATUS_DISCONNECTED = 2;

    /** @var int */
    private $status;

    /** @var string */
    private $message;

    /**
     * RemoteConnectorConnectionStatus constructor.
     * @param int $status
     * @param string $message
     */
    public function __construct($status, $message)
    {
        $this->status = $status;
        $this->message = $message;
    }

    /**
     * @return RemoteConnectorConnectionStatus
     */
    public static function loginSuccessful()
    {
        return new self(
            self::STATUS_CONNECTED,
            'Login successful'
        );
    }

    /**
     * @return RemoteConnectorConnectionStatus
     */
    public static function loginFailed()
    {
        return new self(
            self::STATUS_CONNECTION_ERROR,
            'Login failed'
        );
    }

    /**
     * @return RemoteConnectorConnectionStatus
     */
    public static function disconnected()
    {
        return new self(
            self::STATUS_DISCONNECTED,
            'Disconnected'
        );
    }

    /**
     * @return bool
     */
    public function isSuccessful()
    {
        return $this->status === self::STATUS_CONNECTED;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }
}