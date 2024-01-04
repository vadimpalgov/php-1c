<?php

namespace Php1C\Testing\MemoryProviders;

/**
 * Interface ProviderGoodFactory
 *
 * @package Php1C\Testing\MemoryProviders
 */
interface ProviderGoodFactory
{
    /**
     * @param string|null $goodUUID
     * @return ProviderGood
     */
    public function create($goodUUID = null): ProviderGood;
}
