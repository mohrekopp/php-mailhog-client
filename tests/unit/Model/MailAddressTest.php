<?php
declare(strict_types=1);

namespace Mohrekopp\MailHogClient\Tests\Unit\Model;

use Mohrekopp\MailHogClient\Model\MailAddress;
use PHPUnit\Framework\TestCase;

class MailAddressTest extends TestCase
{
    public function testConstruction()
    {
        $data = [
            'Mailbox' => 'foo',
            'Domain' => 'example.org',
            'params' => 'badParams',
        ];

        $mailAddress = new MailAddress($data);

        $this->assertEmpty($mailAddress->getRelays());
        $this->assertEmpty($mailAddress->getParams());
        $this->assertSame('foo', $mailAddress->getMailbox());
        $this->assertSame('example.org', $mailAddress->getDomain());
        $this->assertSame('foo@example.org', $mailAddress->getFullAddress());
        $this->assertSame('foo@example.org', strval($mailAddress));
    }
}
