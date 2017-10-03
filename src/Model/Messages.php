<?php
declare(strict_types=1);

namespace Mohrekopp\MailHogClient\Model;

use Closure;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Mohrekopp\MailHogClient\Model\Message\Message;

/**
 * Class Messages.
 *
 * @author Chinthujan Sehasothy <chinthu@madco.de>
 */
class Messages implements Collection
{
    /**
     * @var int
     */
    private $total;

    /**
     * @var int
     */
    private $count;

    /**
     * @var int
     */
    private $start;

    /**
     * @var Messages[]|ArrayCollection
     */
    private $messages;

    /**
     * Messages constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->total = $data['total'] ?? 0;
        $this->count = $data['count'] ?? 0;
        $this->start = $data['start'] ?? 0;
        $this->messages = new ArrayCollection();

        if (isset($data['items'])) {
            foreach ($data['items'] as $item) {
                $this->messages->add(new Message($item));
            }
        }
    }

    /**
     * @param string $json
     *
     * @return Messages
     */
    public static function fromJson(string $json): self
    {
        return new static(json_decode($json, true));
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @return int
     */
    public function getStart(): int
    {
        return $this->start;
    }

    /**
     * @return Messages[]|ArrayCollection
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /**
     * @return bool
     */
    public function hasMessages(): bool
    {
        return !empty($this->messages->isEmpty());
    }

    /**
     * {@inheritdoc}
     */
    public function offsetExists($offset)
    {
        return $this->messages->offsetExists($offset);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetGet($offset)
    {
        return $this->messages->offsetGet($offset);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetSet($offset, $value)
    {
        return $this->messages->offsetSet($offset, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetUnset($offset)
    {
        return $this->messages->offsetUnset($offset);
    }

    /**
     * {@inheritdoc}
     */
    public function add($element)
    {
        return $this->messages->add($element);
    }

    /**
     * {@inheritdoc}
     */
    public function clear()
    {
        return $this->messages->clear();
    }

    /**
     * {@inheritdoc}
     */
    public function contains($element)
    {
        return $this->messages->contains($element);
    }

    /**
     * {@inheritdoc}
     */
    public function isEmpty()
    {
        return $this->messages->isEmpty();
    }

    /**
     * {@inheritdoc}
     */
    public function remove($key)
    {
        return $this->messages->remove($key);
    }

    /**
     * {@inheritdoc}
     */
    public function removeElement($element)
    {
        return $this->messages->removeElement($element);
    }

    /**
     * {@inheritdoc}
     */
    public function containsKey($key)
    {
        return $this->messages->containsKey($key);
    }

    /**
     * {@inheritdoc}
     */
    public function get($key)
    {
        return $this->messages->get($key);
    }

    /**
     * {@inheritdoc}
     */
    public function getKeys()
    {
        return $this->messages->getKeys();
    }

    /**
     * {@inheritdoc}
     */
    public function getValues()
    {
        return $this->messages->getValues();
    }

    /**
     * {@inheritdoc}
     */
    public function set($key, $value)
    {
        return $this->messages->set($key, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return $this->messages->toArray();
    }

    /**
     * {@inheritdoc}
     */
    public function first()
    {
        return $this->messages->first();
    }

    /**
     * {@inheritdoc}
     */
    public function last()
    {
        return $this->messages->last();
    }

    /**
     * {@inheritdoc}
     */
    public function key()
    {
        return $this->messages->key();
    }

    /**
     * {@inheritdoc}
     */
    public function current()
    {
        return $this->messages->current();
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        return $this->messages->next();
    }

    /**
     * {@inheritdoc}
     */
    public function exists(Closure $p)
    {
        return $this->messages->exists($p);
    }

    /**
     * {@inheritdoc}
     */
    public function filter(Closure $p)
    {
        return $this->messages->filter($p);
    }

    /**
     * {@inheritdoc}
     */
    public function forAll(Closure $p)
    {
        return $this->messages->forAll($p);
    }

    /**
     * {@inheritdoc}
     */
    public function map(Closure $func)
    {
        return $this->messages->map($func);
    }

    /**
     * {@inheritdoc}
     */
    public function partition(Closure $p)
    {
        return $this->messages->partition($p);
    }

    /**
     * {@inheritdoc}
     */
    public function indexOf($element)
    {
        return $this->messages->indexOf($element);
    }

    /**
     * {@inheritdoc}
     */
    public function slice($offset, $length = null)
    {
        return $this->messages->slice($offset, $length);
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        return $this->messages->getIterator();
    }

    /**
     * {@inheritdoc}
     */
    public function count()
    {
        return $this->getCount();
    }
}
