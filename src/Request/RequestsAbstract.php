<?php

namespace Josalba\RabbitMqApi\Request;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use Josalba\RabbitMqApi\Response\Queue\Response;

abstract class RequestsAbstract
{
    private const JSON = 'json';

    protected Client $client;
    protected Serializer $serializer;

    public function __construct(Client $client)
    {
        $this->client = $client;

        $this->serializer = SerializerBuilder::create()->build();
    }

    /**
     * @param string $uri
     *
     * @return string
     * @throws GuzzleException
     */
    public function getResponse(string $uri): string
    {
        $response = $this->client->get($uri);

        return $response->getBody()->getContents();
    }

    final public function deserialize(string $content, string $class)
    {
        return $this->serializer->deserialize($content, $class, self::JSON);
    }
}