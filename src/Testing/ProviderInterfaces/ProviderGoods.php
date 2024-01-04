<?php

namespace Php1C\Testing\ProviderInterfaces;

/**
 * Interface ProviderGoods
 *
 * @package Php1C\Testing\ProviderInterfaces
 */
interface ProviderGoods
{
    /**
     * @param string $goodUUID
     * @return ProviderGood
     * @throws \Php1C\Testing\Exceptions\InvalidUUIDException
     * @throws \Php1C\Testing\Exceptions\GoodNotFoundException
     */
    public function getGood($goodUUID);
}
