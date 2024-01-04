<?php

use Php1C\Client1CWrapper;
use Php1C\RequestTypes\RequestAddGoodsToOrder;
use Php1C\RequestTypes\RequestAddGoodToOrder;
use Php1C\RequestTypes\RequestAddOrder;
use Php1C\RequestTypes\RequestConfirmOrder;
use Php1C\RequestTypes\RequestResetOrder;
use Php1C\ResponseTypes\ResponseAddGoodsToOrder;
use Php1C\ResponseTypes\ResponseAddGoodToOrder;
use Php1C\ResponseTypes\ResponseAddOrder;
use Php1C\ResponseTypes\ResponseConfirmOrder;
use Php1C\ResponseTypes\ResponseResetOrder;
use Php1C\Testing\DumbClient1C;
use Php1C\Testing\MemoryProviders\ProviderClients;
use Php1C\Testing\MemoryProviders\ProviderGoods;
use Php1C\Testing\MemoryProviders\ProviderOrders;
use PHPUnit\Framework\TestCase;

/**
 * Class Client1CWrapperTest
 */
class Client1CWrapperTest extends TestCase
{
    private static $validUUID = '00000000-0000-0000-0000-000000000000';

    /**
     * @small
     */
    public function testAll()
    {
        $client = new DumbClient1C(new ProviderGoods(), new ProviderClients(), new ProviderOrders());
        $wrapper = new Client1CWrapper($client);

        $response = $wrapper->send(new RequestAddGoodsToOrder(self::$validUUID));
        $this->assertInstanceOf(ResponseAddGoodsToOrder::class, $response);

        $response = $wrapper->send(new RequestAddGoodToOrder(self::$validUUID, self::$validUUID, 0));
        $this->assertInstanceOf(ResponseAddGoodToOrder::class, $response);

        $response = $wrapper->send(new RequestAddOrder(self::$validUUID));
        $this->assertInstanceOf(ResponseAddOrder::class, $response);

        $response = $wrapper->send(new RequestConfirmOrder(self::$validUUID));
        $this->assertInstanceOf(ResponseConfirmOrder::class, $response);

        $response = $wrapper->send(new RequestResetOrder(self::$validUUID));
        $this->assertInstanceOf(ResponseResetOrder::class, $response);
    }
}
