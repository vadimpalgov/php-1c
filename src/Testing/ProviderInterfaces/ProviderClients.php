<?php

namespace Php1C\Testing\ProviderInterfaces;

/**
 * Interface ProviderClients
 *
 * @package Php1C\Testing\ProviderInterfaces
 */
interface ProviderClients
{
    /**
     * @param string $clientUUID
     * @return ProviderClient
     * @throws \Php1C\Testing\Exceptions\InvalidUUIDException
     * @throws \Php1C\Testing\Exceptions\ClientNotFoundException
     */
    public function getClient($clientUUID);

    /**
     * @param string $inn
     * @return ProviderClient
     * @throws \Php1C\Testing\Exceptions\ReservedINNException
     */
    public function makeClient($inn): ProviderClient;

    /**
     * @param \Php1C\Testing\ProviderInterfaces\ProviderClient $client
     * @return \Php1C\Testing\ProviderInterfaces\ProviderClients
     */
    public function addClient(ProviderClient $client);
}
