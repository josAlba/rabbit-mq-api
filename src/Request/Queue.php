<?php

namespace Josalba\RabbitMqApi\Request;

use GuzzleHttp\Exception\GuzzleException;
use Josalba\RabbitMqApi\Response\Queue\Response;
use Josalba\RabbitMqApi\Response\ResponseInterface;

class Queue extends RequestsAbstract implements RequestsInterface
{
    private const ENDPOINT = '/api/queues';

    /**
     * @param string|null $vhost
     *
     * @return ResponseInterface[]
     * @throws GuzzleException
     */
    public function get(?string $vhost = null): array
    {
        $uri = self::ENDPOINT;

        if ($vhost !== null) {
            $uri = sprintf('/api/queues/%s', urlencode($vhost));
        }

        $content = $this->getResponse($uri);

        return $this->deserialize($content, 'array<'.Response::class.'>');
    }
}