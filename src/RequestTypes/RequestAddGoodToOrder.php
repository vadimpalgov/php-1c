<?php

namespace Php1C\RequestTypes;

use Php1C\Exceptions\InvalidRequestParamException;
use Php1C\Request;
use Ramsey\Uuid\Uuid;

/**
 * Class RequestAddGoodToOrder
 *
 * @package Php1C\RequestTypes
 */
class RequestAddGoodToOrder extends Request
{
    /**
     * @var string $orderUUID Order's UUID
     * @var string $goodUUID  Good's UUID
     * @var string $count     Count of goods
     */
    public $orderUUID, $goodUUID, $count;

    /**
     * RequestAddGoodToOrder constructor
     *
     * @param string $orderUUID Order's UUID
     * @param string $goodUUID  Good's UUID
     * @param int    $count     Count of goods
     * @throws \Php1C\Exceptions\InvalidRequestParamException
     */
    public function __construct($orderUUID, $goodUUID, $count)
    {
        if (empty($orderUUID)) {
            throw new InvalidRequestParamException("empty order UUID");
        }
        if (!Uuid::isValid($orderUUID)) {
            throw new InvalidRequestParamException("invalid order UUID");
        }
        if (empty($goodUUID)) {
            throw new InvalidRequestParamException("empty good UUID");
        }
        if (!Uuid::isValid($goodUUID)) {
            throw new InvalidRequestParamException("invalid good UUID");
        }
        if ($count < 0) {
            throw new InvalidRequestParamException("invalid count");
        }

        $this->orderUUID = $orderUUID;
        $this->goodUUID = $goodUUID;
        $this->count = $count;
    }
}
