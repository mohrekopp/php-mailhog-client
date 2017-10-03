<?php
declare(strict_types=1);

namespace Mohrekopp\MailHogClient\Model\Message;

/**
 * Class Content.
 *
 * @author Chinthujan Sehasothy <chinthu@madco.de>
 */
class Content
{
    /**
     * @var Headers
     */
    private $headers;

    /**
     * @var string
     */
    private $body;

    /**
     * @var int
     */
    private $size;

    /**
     * @var string
     */
    private $mime;

    public function __construct(array $data)
    {
        $this->headers = new Headers($data['Headers']);
        $this->body = $data['Body'];
        $this->size = intval($data['Size']);
        $this->mime = $data['MIME'];
    }

    /**
     * @return Headers
     */
    public function getHeaders(): Headers
    {
        return $this->headers;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @return string
     */
    public function getMime(): string
    {
        return $this->mime;
    }
}
