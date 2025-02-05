<?php

namespace Php1C\Testing\Handlers;

use Php1C\RequestTypes\RequestAddOrder;
use Php1C\ResponseTypes\ResponseAddOrder;
use Php1C\Testing\DumbOrder;
use Php1C\Testing\Exceptions\ClientNotFoundException;
use Php1C\Testing\Exceptions\InvalidUUIDException;
use Php1C\Testing\Exceptions\WritingOrderException;
use Php1C\Testing\ProviderInterfaces\ProviderClients;
use Php1C\Testing\ProviderInterfaces\ProviderOrders;

/**
 * Class HandlerAddOrder
 *
 * @package Php1C\Testing\Handlers
 */
class HandlerAddOrder
{
    const DELAY_MIN = 7;
    const DELAY_MAX = 11;

    /**
     * @var \Php1C\Testing\ProviderInterfaces\ProviderClients $providerClients
     * @var \Php1C\Testing\ProviderInterfaces\ProviderOrders  $providerOrders
     */
    private $providerClients, $providerOrders;

    /**
     * Эмитировать долгую обработку запроса, как в 1С, если true
     *
     * @var bool
     */
    private $useDelay = false;

    /**
     * HandlerAddOrder constructor
     *
     * @param \Php1C\Testing\ProviderInterfaces\ProviderClients $providerClients
     * @param \Php1C\Testing\ProviderInterfaces\ProviderOrders  $providerOrders
     * @param bool                                                                $useDelay
     */
    public function __construct(ProviderClients $providerClients, ProviderOrders $providerOrders, $useDelay = false)
    {
        $this->providerClients = $providerClients;
        $this->providerOrders = $providerOrders;
        $this->useDelay = $useDelay;
    }

    /**
     * @param \Php1C\RequestTypes\RequestAddOrder $request
     * @return \Php1C\ResponseTypes\ResponseAddOrder
     */
    public function handle(RequestAddOrder $request)
    {
        // `status = 1` - `clientUUID` не был передан
        if (empty($request->clientUUID)) {
            return new ResponseAddOrder(ResponseAddOrder::STATUS_EMPTY_CLIENT_UUID);
        }

        if ($this->useDelay) {
            // Имитация долгого выполнения запроса, как в 1С
            sleep(mt_rand(self::DELAY_MIN, self::DELAY_MAX));
        }

        try {
            $client = $this->providerClients->getClient($request->clientUUID);

            // `status = 4` - невозможно определить соглашение
            if (!$client->hasAgreement()) {
                return new ResponseAddOrder(ResponseAddOrder::STATUS_CLIENT_AGREEMENT_DOES_NOT_EXISTS);
            }

            // Создание заказа
            $order = new DumbOrder($client->VAT(), $client->payType(), $client->deliveryType());
            $this->providerOrders->addOrder($order);

            // `status = 0` - все хорошо
            return new ResponseAddOrder(ResponseAddOrder::STATUS_SUCCESS, $order->UUID(), $order->ID(), $order->VAT(),
                $order->payType(), $order->deliveryType());

        } catch (InvalidUUIDException $e) {
            // `status = 2` - `clientUUID` не корректен
            return new ResponseAddOrder(ResponseAddOrder::STATUS_INVALID_CLIENT_UUID);
        } catch (ClientNotFoundException $e) {
            // `status = 3` - клиент с `clientUUID` не найден
            return new ResponseAddOrder(ResponseAddOrder::STATUS_CLIENT_NOT_FOUND);
        } catch (WritingOrderException $e) {
            // `status = 5` - ошибка записи заказа
            return new ResponseAddOrder(ResponseAddOrder::STATUS_ERROR_WRITING_ORDER);
        }
    }
}
