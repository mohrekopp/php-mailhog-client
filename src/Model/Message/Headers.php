<?php
declare(strict_types=1);

namespace Mohrekopp\MailHogClient\Model\Message;

/**
 * Class Headers.
 *
 * @author Chinthujan Sehasothy <chinthu@madco.de>
 */
class Headers
{
    /**
     * @var string
     */
    private $contentTransferEncoding;

    /**
     * @var string
     */
    private $contentType;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var string
     */
    private $from;

    /**
     * @var string
     */
    private $mimeVersion;

    /**
     * @var string
     */
    private $messageId;

    /**
     * @var string
     */
    private $received;

    /**
     * @var string
     */
    private $returnPath;

    /**
     * @var string
     */
    private $subject;

    /**
     * @var string
     */
    private $to;

    /**
     * Constructor
     * @param mixed[] $data Associated array of property values initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->contentTransferEncoding = isset($data['Content-Transfer-Encoding']) ? $data['Content-Transfer-Encoding'][0] : null;
        $this->contentType = isset($data['Content-Type']) ? $data['Content-Type'][0] : null;
        $this->date = isset($data['Date']) ? \DateTime::createFromFormat(\DateTime::RFC822, $data['Date'][0]) : null;
        $this->from = isset($data['From']) ? $data['From'][0] : null;
        $this->mimeVersion = isset($data['MIME-Version']) ? $data['MIME-Version'][0] : null;
        $this->messageId = isset($data['Message-ID']) ? $data['Message-ID'][0] : null;
        $this->received = isset($data['Received']) ? $data['Received'][0] : null;
        $this->returnPath = isset($data['Return-Path']) ? $data['Return-Path'][0] : null;
        $this->subject = isset($data['Subject']) ? $data['Subject'][0] : null;
        $this->to = isset($data['To']) ? $data['To'][0] : null;
    }

    /**
     * @return string
     */
    public function getContentTransferEncoding(): string
    {
        return $this->contentTransferEncoding;
    }

    /**
     * @return string
     */
    public function getContentType(): string
    {
        return $this->contentType;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * @return string
     */
    public function getMimeVersion(): string
    {
        return $this->mimeVersion;
    }

    /**
     * @return string
     */
    public function getMessageId(): string
    {
        return $this->messageId;
    }

    /**
     * @return string
     */
    public function getReceived(): string
    {
        return $this->received;
    }

    /**
     * @return string
     */
    public function getReturnPath(): string
    {
        return $this->returnPath;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @return string
     */
    public function getTo(): string
    {
        return $this->to;
    }
}
