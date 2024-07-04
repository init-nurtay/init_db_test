<?php

namespace App\Services;

use App\Models\Address;
use App\Models\Client;

class ClientService
{
    private Client $client;

    public function __construct(Client $client) {
        $this->client = $client;
    }

    public static function store(array $serviceData)
    {
        $address = new Address();
        $address_id = $address->fill($serviceData);
        $serviceData['address_id'] = $address_id;

        Client::create($serviceData);
    }

    public function update(array $serviceData)
    {
        $address = $this->client->address;
        $address->fill($serviceData);
        $address->save();

        $this->client->fill($serviceData);
        $this->client->save();
    }
}
