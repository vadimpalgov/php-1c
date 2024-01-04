<?php

namespace Php1C;

use Php1C\RequestTypes\RequestAddOrder;
use Php1C\RequestTypes\RequestAddGoodToOrder;
use Php1C\RequestTypes\RequestAddGoodsToOrder;
use Php1C\RequestTypes\RequestConfirmOrder;
use Php1C\RequestTypes\RequestResetOrder;

/**
 * Interface ClientInterface
 *
 * @package Php1C
 */
interface Client1CInterface
{
    /**
     * addOrder adds new order
     *
     * @param \Php1C\RequestTypes\RequestAddOrder $request
     * @return \Php1C\ResponseTypes\ResponseAddOrder
     * @throws \Php1C\Exceptions\MethodInvocationException
     */
    public function addOrder(RequestAddOrder $request);

    /**
     * addGoodToOrder adds a good to an order
     *
     * @param \Php1C\RequestTypes\RequestAddGoodToOrder $request
     * @return \Php1C\ResponseTypes\ResponseAddGoodToOrder
     * @throws \Php1C\Exceptions\MethodInvocationException
     */
    public function addGoodToOrder(RequestAddGoodToOrder $request);

    /**
     * addGoodsToOrder adds goods to an order
     *
     * @param \Php1C\RequestTypes\RequestAddGoodsToOrder $request
     * @return \Php1C\ResponseTypes\ResponseAddGoodsToOrder
     * @throws \Php1C\Exceptions\MethodInvocationException
     */
    public function addGoodsToOrder(RequestAddGoodsToOrder $request);

    /**
     * confirmOrder confirms an order
     *
     * @param \Php1C\RequestTypes\RequestConfirmOrder $request
     * @return \Php1C\ResponseTypes\ResponseConfirmOrder
     * @throws \Php1C\Exceptions\MethodInvocationException
     */
    public function confirmOrder(RequestConfirmOrder $request);

    /**
     * resetOrder resets an order
     *
     * @param \Php1C\RequestTypes\RequestResetOrder $request
     * @return \Php1C\ResponseTypes\ResponseResetOrder
     * @throws \Php1C\Exceptions\MethodInvocationException
     */
    public function resetOrder(RequestResetOrder $request);
}
