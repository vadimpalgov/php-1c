<?php

namespace Php1C\Testing\ProviderInterfaces;

use Php1C\Testing\DumbOrder;

/**
 * Interface ProviderOrders
 *
 * @package Php1C\Testing\ProviderInterfaces
 */
interface ProviderOrders
{
    /**
     * @param string $orderUUID
     * @return \Php1C\Testing\DumbOrder
     * @throws \Php1C\Testing\Exceptions\InvalidUUIDException
     * @throws \Php1C\Testing\Exceptions\OrderNotFoundException
     */
    public function getOrder($orderUUID);

    /**
     * @param \Php1C\Testing\DumbOrder
     * @throws \Php1C\Testing\Exceptions\WritingOrderException
     */
    public function addOrder(DumbOrder $order);
}
