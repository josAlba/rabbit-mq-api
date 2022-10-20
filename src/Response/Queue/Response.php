<?php

namespace Josalba\RabbitMqApi\Response\Queue;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use Josalba\RabbitMqApi\Response\ResponseInterface;

class Response implements ResponseInterface
{
    /**
     * @Type("string")
     * @SerializedName("name")
     */
    private string $name;

    /**
     * @Type("string")
     * @SerializedName("vhost")
     */
    private string $vhost;

    /**
     * @Type("integer")
     * @SerializedName("consumers")
     */
    private int $consumers;

    /**
     * @Type("integer")
     * @SerializedName("messages")
     */
    private int $messages;

    public function getName(): string
    {
        return $this->name;
    }

    public function getVhost(): string
    {
        return $this->vhost;
    }

    public function getConsumers(): int
    {
        return $this->consumers;
    }

    public function getMessages(): int
    {
        return $this->messages;
    }
}