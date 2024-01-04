<?php

namespace Php1C\Testing\MemoryProviders;

use Php1C\Testing\DumbOrder;
use Php1C\Testing\Exceptions\InvalidUUIDException;
use Php1C\Testing\Exceptions\OrderNotFoundException;
use Php1C\Testing\ProviderInterfaces\ProviderOrders as ProviderOrdersInterface;
use Ramsey\Uuid\Uuid;

/**
 * Class ProviderOrders
 *
 * @package Php1C\Testing\MemoryProviders
 */
class ProviderOrders implements ProviderOrdersInterface
{
    /**
     * @var \Php1C\Testing\DumbOrder[]
     */
    private $orders = [];

    /**
     * @param string $orderUUID
     * @return \Php1C\Testing\DumbOrder
     * @throws \Php1C\Testing\Exceptions\InvalidUUIDException
     * @throws \Php1C\Testing\Exceptions\OrderNotFoundException
     */
    public function getOrder($orderUUID)
    {
        if (!Uuid::isValid($orderUUID)) {
            throw new InvalidUUIDException();
        }

        foreach ($this->orders as $order) {
            if ($order->UUID() === $orderUUID) {
                return $order;
            }
        }

        throw new OrderNotFoundException();
    }

    /**
     * @param \Php1C\Testing\DumbOrder $order
     * @throws \Php1C\Testing\Exceptions\WritingOrderException
     */
    public function addOrder(DumbOrder $order)
    {
        array_push($this->orders, $order);
    }
}
