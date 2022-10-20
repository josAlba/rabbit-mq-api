<?php

namespace Josalba\RabbitMqApi;

use GuzzleHttp\Client;
use Josalba\RabbitMqApi\Request\Queue;

class RabbitApi
{
    private Client $client;

    public function __construct(string $host, string $user, string $password)
    {
        $encodedAuth = base64_encode($user.":".$password);

        $this->client = new Client(
            [
                'base_uri' => $host,
                'headers' => [
                    'Authorization' => 'Basic '.$encodedAuth,
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ],
            ]
        );
    }

    public function queue(): Queue
    {
        return new Queue($this->client);
    }
}