<?php
declare(strict_types=1);

namespace Mohrekopp\MailHogClient\Model\Message;

/**
 * Class RawData.
 *
 * @author Chinthujan Sehasothy <chinthu@madco.de>
 */
class RawData
{
    /**
     * @var string
     */
    private $from;

    /**
     * @var string[]
     */
    private $to;

    /**
     * @var string
     */
    private $data;

    /**
     * @var string
     */
    private $helo;

    /**
     * RawData constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->from = $data['From'];
        foreach ($data['To'] as $to) {
            $this->to[] = $to;
        }

        $this->data = $data['Data'];
        $this->helo = $data['Helo'];
    }
}
