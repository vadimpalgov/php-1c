<?php

namespace Php1C\RequestTypes;

use Php1C\Exceptions\InvalidRequestParamException;
use Php1C\Request;
use Ramsey\Uuid\Uuid;

/**
 * Class RequestAddOrder
 *
 * @package Php1C\RequestTypes
 */
class RequestAddOrder extends Request
{
    /**
     * @var string $clientUUID Client's UUID
     */
    public $clientUUID;

    /**
     * RequestAddOrder constructor
     *
     * @param string $clientUUID Client's UUID
     * @throws \Php1C\Exceptions\InvalidRequestParamException
     */
    public function __construct($clientUUID)
    {
        if (empty($clientUUID)) {
            throw new InvalidRequestParamException("empty client UUID");
        }
        if (!Uuid::isValid($clientUUID)) {
            throw new InvalidRequestParamException("invalid client UUID");
        }

        $this->clientUUID = $clientUUID;
    }
}
