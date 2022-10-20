<?php

namespace Josalba\RabbitMqApi\Request;

use Josalba\RabbitMqApi\Response\ResponseInterface;

interface RequestsInterface
{
    /**
     * @param string|null $vhost
     *
     * @return ResponseInterface[]
     */
    public function get(?string $vhost = null): array;
}