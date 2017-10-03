<?php
declare(strict_types=1);

namespace Mohrekopp\MailHogClient\Tests\Functional;

use Mohrekopp\MailHogClient\MailHogClient;
use Mohrekopp\MailHogClient\Model\Message\Message;
use Mohrekopp\MailHogClient\Model\Messages;
use Mohrekopp\MailHogClient\SearchCriteria;
use PHPUnit\Framework\TestCase;

/**
 * Class ClientTest.
 *
 * @author Chinthujan Sehasothy <chinthu@madco.de>
 */
class ClientTest extends TestCase
{
    public function testGetMessages()
    {
        $client = $this->createMailHogClient();
        $messages = $client->getMessages();
        $this->assertCount(2, $messages);
        $this->assertInstanceOf(Messages::class, $messages);
    }

    public function testSearchMessages()
    {
        $criteria = SearchCriteria::createSentByCriteria('foo@example.com');

        $client = $this->createMailHogClient();
        $messages = $client->searchMessages($criteria);
        $this->assertCount(1, $messages);
        /* @var $message Message */
        $message = $messages->first();

        $this->assertContains('Testmessage', $message->getBody());
        $receivers = $message->getTo();

        $this->assertSame('baz@domain.org', $receivers[0]->getFullAddress());
    }

    /**
     * @return \Mohrekopp\MailHogClient\MailHogClient
     */
    private function createMailHogClient()
    {
        $httpPort = getenv('MAILHOG_HTTP_PORT');
        $httpProto = getenv('MAILHOG_HTTP_PROTOCOL');
        $httpHost = getenv('MAILHOG_HOST');

        $client = new MailHogClient("{$httpProto}://{$httpHost}:{$httpPort}");

        return $client;
    }
}
