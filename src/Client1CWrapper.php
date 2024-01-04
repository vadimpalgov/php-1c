<?php

namespace Php1C;

use Php1C\Exceptions\UnsupportedRequestException;
use Php1C\RequestTypes\RequestAddGoodsToOrder;
use Php1C\RequestTypes\RequestAddGoodToOrder;
use Php1C\RequestTypes\RequestAddOrder;
use Php1C\RequestTypes\RequestConfirmOrder;
use Php1C\RequestTypes\RequestResetOrder;

/**
 * Class Client1CWrapper Обертка для Client1C с одним методом send для всех типов запросов к 1С
 *
 * @package Php1C
 */
class Client1CWrapper
{
    /**
     * @var \Php1C\Client1CInterface
     */
    private $client;

    /**
     * Client1CWrapper constructor
     *
     * @param \Php1C\Client1CInterface $client
     */
    public function __construct(Client1CInterface $client)
    {
        $this->client = $client;
    }

    /**
     * send sends request and returns response
     *
     * @param \Php1C\Request $request
     * @return \Php1C\Response
     * @throws \Php1C\Exceptions\MethodInvocationException
     * @throws \Php1C\Exceptions\UnsupportedRequestException
     */
    public function send(Request $request)
    {
        if ($request instanceof RequestAddGoodsToOrder) {
            return $this->client->addGoodsToOrder($request);
        }

        if ($request instanceof RequestAddGoodToOrder) {
            return $this->client->addGoodToOrder($request);
        }

        if ($request instanceof RequestAddOrder) {
            return $this->client->addOrder($request);
        }

        if ($request instanceof RequestConfirmOrder) {
            return $this->client->confirmOrder($request);
        }

        if ($request instanceof RequestResetOrder) {
            return $this->client->resetOrder($request);
        }

        throw new UnsupportedRequestException($request);
    }
}
