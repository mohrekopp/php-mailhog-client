<?php
declare(strict_types=1);

namespace Mohrekopp\MailHogClient;

/**
 * SearchCriteria for searching via the Mailhog-API
 *
 * Usage:
 *
 *  - SearchCriteria::createSentByCriteria('sender@example.org')
 *  - SearchCriteria::createSentToCriteria('receiver@example.org')
 *  - SearchCriteria::createContainingCriteria('Subject-content')
 *  - SearchCriteria::createContainingCriteria('Message-content')
 *
 * @author Chinthujan Sehasothy <chinthu@madco.de>
 */
class SearchCriteria
{
    const KIND_FROM = 'from';

    const KIND_TO = 'to';

    const KIND_CONTAINING = 'containing';

    /**
     * @var string
     */
    private $kind;

    /**
     * @var string
     */
    private $query;

    /**
     * SearchCriteria constructor.
     *
     * @param string $kind
     * @param string $query
     */
    public function __construct(string $kind, string $query)
    {
        $this->kind = $kind;
        $this->query = $query;
    }

    public static function createSentByCriteria(string $term): self
    {
        return new static(static::KIND_FROM, $term);
    }

    public static function createSentToCriteria(string $term): self
    {
        return new static(static::KIND_TO, $term);
    }

    public static function createContainingCriteria(string $term): self
    {
        return new static(static::KIND_CONTAINING, $term);
    }

    /**
     * @return string
     */
    public function getKind(): string
    {
        return $this->kind;
    }

    /**
     * @return string
     */
    public function getQuery(): string
    {
        return $this->query;
    }
}
