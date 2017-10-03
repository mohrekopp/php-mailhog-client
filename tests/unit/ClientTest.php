<?php
declare(strict_types=1);

namespace Mohrekopp\MailHogClient\Tests\Unit;

use Http\Discovery\MessageFactoryDiscovery;
use Http\Mock\Client as MockClient;
use Mohrekopp\MailHogClient\MailHogClient;
use Mohrekopp\MailHogClient\Model\Message\Message;
use Mohrekopp\MailHogClient\Model\Messages;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    public function testGetMessagesMock()
    {
        $responseData = file_get_contents(MAILHOG_CLIENT_TESTS_ROOT . '/unit/mock-response.json');
        $client = $this->createMockBasedClient($responseData);
        $messages = $client->getMessages();

        $this->assertInstanceOf(Messages::class, $messages);
        $this->assertCount(2, $messages);
        $this->assertContainsOnlyInstancesOf(Message::class, $messages);
    }

    /**
     * @param string $expectedResponseBody
     *
     * @return MailHogClient
     */
    private function createMockBasedClient(string $expectedResponseBody): MailHogClient
    {
        $mockClient = new MockClient();

        $messageFactory = MessageFactoryDiscovery::find();
        $response = $messageFactory->createResponse(
            200,
            null,
            [],
            $expectedResponseBody
        );

        $mockClient->addResponse($response);

        return new MailHogClient('http://localhost', $mockClient);
    }
}


