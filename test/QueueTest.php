<?php

use GuzzleHttp\Client;
use Josalba\RabbitMqApi\Request\Queue;
use Josalba\RabbitMqApi\Response\Queue\Response;
use PHPUnit\Framework\TestCase;

final class QueueTest extends TestCase
{
    public function testQueue(): void
    {
        $json = file_get_contents(__DIR__.'/Data/QueueResponse.json');

        $queue = $this->getMockBuilder(Queue::class)
            ->setConstructorArgs([new Client(),])
            ->enableOriginalConstructor()
            ->setMethodsExcept(['deserialize', 'get'])
            ->getMock();

        $queue->expects($this->once())
            ->method('getResponse')
            ->willReturn($json);

        /** @var Response[] $queueResponse */
        $queueResponse = $queue->get();

        $this->assertIsArray($queueResponse);

        $this->assertInstanceOf(Response::class, $queueResponse[0]);
        $this->assertEquals(0, $queueResponse[0]->getConsumers());
        $this->assertEquals(0, $queueResponse[0]->getMessages());
        $this->assertEquals('testQueue', $queueResponse[0]->getName());
        $this->assertEquals('testVhost', $queueResponse[0]->getVhost());
    }
}