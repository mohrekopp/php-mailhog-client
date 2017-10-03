<?php
declare(strict_types=1);

namespace Mohrekopp\MailHogClient\Model;

/**
 * Class MailAddress.
 *
 * @author Chinthujan Sehasothy <chinthu@madco.de>
 */
class MailAddress
{
    /**
     * @var string
     */
    private $relays;

    /**
     * @var string
     */
    private $mailbox;

    /**
     * @var string
     */
    private $domain;

    /**
     * @var string
     */
    private $params;

    /**
     * To constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->relays = $data['Relays'] ?? '';
        $this->mailbox = $data['Mailbox'] ?? '';
        $this->domain = $data['Domain'] ?? '';
        $this->params = $data['Params'] ?? '';
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getFullAddress();
    }

    /**
     * @return string
     */
    public function getRelays(): string
    {
        return $this->relays;
    }

    /**
     * @return string
     */
    public function getMailbox(): string
    {
        return $this->mailbox;
    }

    /**
     * @return string
     */
    public function getDomain(): string
    {
        return $this->domain;
    }

    /**
     * @return string
     */
    public function getParams(): string
    {
        return $this->params;
    }

    /**
     * @return string
     */
    public function getFullAddress(): string
    {
        return $this->getMailbox() . '@' . $this->getDomain();
    }
}
