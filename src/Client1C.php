<?php

namespace Php1C;

use Php1C\Exceptions\MethodInvocationException;
use Php1C\RequestTypes\RequestAddGoodsToOrder;
use Php1C\RequestTypes\RequestConfirmOrder;
use Php1C\RequestTypes\RequestResetOrder;
use Php1C\RequestTypes\RequestAddOrder;
use Php1C\RequestTypes\RequestAddGoodToOrder;
use Php1C\ResponseTypes\ResponseAddGoodsToOrder;
use Php1C\ResponseTypes\ResponseAddGoodToOrder;
use Php1C\ResponseTypes\ResponseAddOrder;
use Php1C\ResponseTypes\OrderItem;
use Php1C\ResponseTypes\GoodState;
use Php1C\ResponseTypes\ResponseConfirmOrder;
use Php1C\ResponseTypes\ResponseResetOrder;
use SoapClient;
use SoapFault;

/**
 * Class Client1C Клиент-обертка для SoapClient для взаимодействия с веб-сервисами 1С
 *
 * @package Php1C
 */
class Client1C implements Client1CInterface
{
    /**
     * Название метода для добавления заказа
     *
     * @var string
     */
    const METHOD_ADD_ORDER = 'AddOrder';

    /**
     * Название метода для добавления товара
     *
     * @var string
     */
    const METHOD_ADD_GOOD_TO_ORDER = 'AddGoodToOrder';

    /**
     * Название метода для добавления товаров
     *
     * @var string
     */
    const METHOD_ADD_GOODS_TO_ORDER = 'AddGoodsToOrder';

    /**
     * Название метода для подтверждения заказа
     *
     * @var string
     */
    const METHOD_CONFIRM_ORDER = 'ConfirmOrder';

    /**
     * Название метода для отмены заказа
     *
     * @var string
     */
    const METHOD_RESET_ORDER = 'ResetOrder';

    /**
     * @var SoapClient
     */
    private $soapClient;

    /**
     * Client1C constructor
     *
     * @param string $wsdl Путь к WSDL файлу для генерации SOAP клиента
     * @param string $userAgent
     */
    public function __construct($wsdl, $userAgent = 'PHP-SOAP-CLIENT')
    {
        $this->soapClient = new SoapClient($wsdl, [
            'exceptions'         => true,
            'soap_version'       => SOAP_1_1,
            'cache_wsdl'         => WSDL_CACHE_NONE,
            'connection_timeout' => 30, // sec
            'user_agent'         => $userAgent,
            'features'           => SOAP_SINGLE_ELEMENT_ARRAYS,
            'keep_alive'         => false,
            'classmap'           => [
                'AddGoodToOrderResponse'          => ResponseAddGoodToOrder::class,
                'AddGoodsToOrderResponse'         => ResponseAddGoodsToOrder::class,
                'AddOrderResponse'                => ResponseAddOrder::class,
                'ConfirmOrderResponse'            => ResponseConfirmOrder::class,
                'ResetOrderResponse'              => ResponseResetOrder::class,
                'AddGoodsToOrderResponseRowGoods' => GoodState::class,
                'AddGoodToOrderResponseRow'       => OrderItem::class,
                'AddGoodsToOrderResponseRowOrder' => OrderItem::class,
            ],
        ]);
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
            /** @var \Php1C\ResponseTypes\ResponseAddOrder $response */
            $response = $this->soapClient->__soapCall(self::METHOD_ADD_ORDER, [$request])->return;
            return $response->attachTimeNow()->attachRequest($request);
        } catch (SoapFault $e) {
            throw new MethodInvocationException(self::METHOD_ADD_ORDER, 0, $e);
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
            /** @var \Php1C\ResponseTypes\ResponseAddGoodToOrder $response */
            $response = $this->soapClient->__soapCall(self::METHOD_ADD_GOOD_TO_ORDER, [$request])->return;
            return $response->attachTimeNow()->attachRequest($request);
        } catch (SoapFault $e) {
            throw new MethodInvocationException(self::METHOD_ADD_GOOD_TO_ORDER, 0, $e);
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
            /** @var \Php1C\ResponseTypes\ResponseAddGoodsToOrder $response */
            $response = $this->soapClient->__soapCall(self::METHOD_ADD_GOODS_TO_ORDER, [$request])->return;
            return $response->attachTimeNow()->attachRequest($request);
        } catch (SoapFault $e) {
            throw new MethodInvocationException(self::METHOD_ADD_GOODS_TO_ORDER, 0, $e);
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
            /** @var \Php1C\ResponseTypes\ResponseConfirmOrder $response */
            $response = $this->soapClient->__soapCall(self::METHOD_CONFIRM_ORDER, [$request])->return;
            return $response->attachTimeNow()->attachRequest($request);
        } catch (SoapFault $e) {
            throw new MethodInvocationException(self::METHOD_CONFIRM_ORDER, 0, $e);
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
            /** @var \Php1C\ResponseTypes\ResponseResetOrder $response */
            $response = $this->soapClient->__soapCall(self::METHOD_RESET_ORDER, [$request])->return;
            return $response->attachTimeNow()->attachRequest($request);
        } catch (SoapFault $e) {
            throw new MethodInvocationException(self::METHOD_RESET_ORDER, 0, $e);
        }
    }
}
