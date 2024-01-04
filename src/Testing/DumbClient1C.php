<?php

namespace Php1C\Testing;

use Php1C\Client1CInterface;
use Php1C\Exceptions\MethodInvocationException;
use Php1C\RequestTypes\RequestAddGoodsToOrder;
use Php1C\RequestTypes\RequestAddGoodToOrder;
use Php1C\RequestTypes\RequestAddOrder;
use Php1C\RequestTypes\RequestConfirmOrder;
use Php1C\RequestTypes\RequestResetOrder;
use Php1C\Testing\Exceptions\HandlingRequestException;
use Php1C\Testing\Handlers\HandlerAddGoodsToOrder;
use Php1C\Testing\Handlers\HandlerAddGoodToOrder;
use Php1C\Testing\Handlers\HandlerAddOrder;
use Php1C\Testing\Handlers\HandlerConfirmOrder;
use Php1C\Testing\Handlers\HandlerResetOrder;
use Php1C\Testing\ProviderInterfaces\ProviderClients;
use Php1C\Testing\ProviderInterfaces\ProviderGoods;
use Php1C\Testing\ProviderInterfaces\ProviderOrders;

/**
 * Class DumbClient1C Mock-клиент для 1С для локальной разработки. Полностью эмитирует все действия 1С
 *
 * @package Php1C
 */
class DumbClient1C implements Client1CInterface
{
    /**
     * @var \Php1C\Testing\Handlers\HandlerAddOrder        $handlerAddOrder
     * @var \Php1C\Testing\Handlers\HandlerResetOrder      $handlerResetOrder
     * @var \Php1C\Testing\Handlers\HandlerConfirmOrder    $handlerConfirmOrder
     * @var \Php1C\Testing\Handlers\HandlerAddGoodToOrder  $handlerAddGoodToOrder
     * @var \Php1C\Testing\Handlers\HandlerAddGoodsToOrder $handlerAddGoodsToOrder
     */
    private $handlerAddOrder, $handlerResetOrder, $handlerConfirmOrder, $handlerAddGoodToOrder, $handlerAddGoodsToOrder;

    /**
     * DumbClient1C constructor
     *
     * @param ProviderGoods   $providerGoods
     * @param ProviderClients $providerClients
     * @param ProviderOrders  $providerOrders
     * @param bool            $useDelay
     */
    public function __construct(ProviderGoods $providerGoods, ProviderClients $providerClients, ProviderOrders $providerOrders,
        $useDelay = false)
    {
        $this->handlerAddOrder = new HandlerAddOrder($providerClients, $providerOrders, $useDelay);
        $this->handlerResetOrder = new HandlerResetOrder($providerOrders, $providerGoods, $useDelay);
        $this->handlerConfirmOrder = new HandlerConfirmOrder($providerOrders, $useDelay);
        $this->handlerAddGoodToOrder = new HandlerAddGoodToOrder($providerOrders, $providerGoods, $useDelay);
        $this->handlerAddGoodsToOrder = new HandlerAddGoodsToOrder($providerOrders, $providerGoods, $useDelay);
    }

    /**
     * addOrder adds new order
     *
     * @param \Php1C\RequestTypes\RequestAddOrder $request
     * @return \Php1C\ResponseTypes\ResponseAddOrder
     * @throws \Php1C\Exceptions\MethodInvocationException
     */
    public function addOrder(RequestAddOrder $request)
    {
        try {
            return $this->handlerAddOrder->handle($request)->attachTimeNow()->attachRequest($request);
        } catch (HandlingRequestException $e) {
            throw new MethodInvocationException('Method AddOrder', 0, $e);
        }
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
        try {
            return $this->handlerAddGoodToOrder->handle($request)->attachTimeNow()->attachRequest($request);
        } catch (HandlingRequestException $e) {
            throw new MethodInvocationException('Method AddGoodToOrder', 0, $e);
        }
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
        try {
            return $this->handlerAddGoodsToOrder->handle($request)->attachTimeNow()->attachRequest($request);
        } catch (HandlingRequestException $e) {
            throw new MethodInvocationException('Method AddGoodsToOrder', 0, $e);
        }
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
        try {
            return $this->handlerConfirmOrder->handle($request)->attachTimeNow()->attachRequest($request);
        } catch (HandlingRequestException $e) {
            throw new MethodInvocationException('Method ConfirmOrder', 0, $e);
        }
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
        try {
            return $this->handlerResetOrder->handle($request)->attachTimeNow()->attachRequest($request);
        } catch (HandlingRequestException $e) {
            throw new MethodInvocationException('Method ResetOrder', 0, $e);
        }
    }
}
