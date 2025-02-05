<?php

namespace Php1C\Testing\MemoryProviders;

/**
 * Interface ProviderClientFactory
 *
 * @package Php1C\Testing\MemoryProviders
 */
interface ProviderClientFactory
{
    /**
     * @param string|null $clientUUID
     * @param string|null $INN
     * @return ProviderClient
     */
    public function create($clientUUID = null, $INN = null): ProviderClient;
}
