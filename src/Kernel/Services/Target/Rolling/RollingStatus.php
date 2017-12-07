<?php


namespace Kugaudo\PhpDeployer\Kernel\Services\Target\Rolling;


class RollingStatus
{
    const STATUS_OK = 0;
    const STATUS_SKIP = 1;
    const STATUS_ROLLBACK = -1;

    /**
     * @var int
     */
    private $status;

    /**
     * @var string
     */
    private $message;

    /**
     * RollBackStatus constructor.
     * @param int $status
     * @param string $message
     */
    public function __construct($status, $message)
    {
        $this->status = $status;
        $this->message = $message;
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

    /**
     * @return bool
     */
    public function isRollBack()
    {
        return $this->status === self::STATUS_ROLLBACK;
    }

    /**
     * @param $message
     * @return RollingStatus
     */
    public static function ok($message)
    {
        return new self(self::STATUS_OK, $message);
    }

    /**
     * @param $message
     * @return RollingStatus
     */
    public static function skip($message = 'skipped')
    {
        return new self(self::STATUS_SKIP, $message);
    }

    /**
     * @param $message
     * @return RollingStatus
     */
    public static function rollBack($message = '!!!')
    {
        return new self(self::STATUS_ROLLBACK, $message);
    }
}