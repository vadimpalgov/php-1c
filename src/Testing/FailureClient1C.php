<?php

namespace Php1C\Testing;

use Php1C\Client1CInterface;
use Php1C\Exceptions\MethodInvocationException;
use Php1C\RequestTypes\RequestAddGoodsToOrder;
use Php1C\RequestTypes\RequestAddGoodToOrder;
use Php1C\RequestTypes\RequestAddOrder;
use Php1C\RequestTypes\RequestConfirmOrder;
use Php1C\RequestTypes\RequestResetOrder;

/**
 * Class FailureClient1C Mock-клиент для 1С для локальной разработки. FailureClient1C эмитирует ситуацию, когда сервер
 * 1С недоступен или упал
 *
 * @package Php1C\Testing
 */
class FailureClient1C implements Client1CInterface
{
    /**
     * addOrder adds new order
     *
     * @param \Php1C\RequestTypes\RequestAddOrder $request
     * @return \Php1C\ResponseTypes\ResponseAddOrder
     * @throws \Php1C\Exceptions\MethodInvocationException
     */
    public function addOrder(RequestAddOrder $request)
    {
        throw new MethodInvocationException('Cannot invoke method addOrder');
    }

    /**
     * addGoodToOrder adds a good to an order
     *
     * @param \Php1C\RequestTypes\RequestAddGoodToOrder $request
     * @return \Php1C\ResponseTypes\ResponseAddGoodToOrder
     * @throws \Php1C\Exceptions\MethodInvocationException
     */
    public function addGoodToOrder(RequestAddGoodToOrder $request)
    {
        throw new MethodInvocationException('Cannot invoke method addGoodToOrder');
    }

    /**
     * addGoodsToOrder adds goods to an order
     *
     * @param \Php1C\RequestTypes\RequestAddGoodsToOrder $request
     * @return \Php1C\ResponseTypes\ResponseAddGoodsToOrder
     * @throws \Php1C\Exceptions\MethodInvocationException
     */
    public function addGoodsToOrder(RequestAddGoodsToOrder $request)
    {
        throw new MethodInvocationException('Cannot invoke method addGoodsToOrder');
    }

    /**
     * confirmOrder confirms an order
     *
     * @param \Php1C\RequestTypes\RequestConfirmOrder $request
     * @return \Php1C\ResponseTypes\ResponseConfirmOrder
     * @throws \Php1C\Exceptions\MethodInvocationException
     */
    public function confirmOrder(RequestConfirmOrder $request)
    {
        throw new MethodInvocationException('Cannot invoke method confirmOrder');
    }

    /**
     * resetOrder resets an order
     *
     * @param \Php1C\RequestTypes\RequestResetOrder $request
     * @return \Php1C\ResponseTypes\ResponseResetOrder
     * @throws \Php1C\Exceptions\MethodInvocationException
     */
    public function resetOrder(RequestResetOrder $request)
    {
        throw new MethodInvocationException('Cannot invoke method resetOrder');
    }
}
