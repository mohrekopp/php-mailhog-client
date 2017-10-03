<?php
declare(strict_types=1);

namespace Mohrekopp\MailHogClient;

use Http\Client\HttpClient;
use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\MessageFactoryDiscovery;
use Http\Discovery\UriFactoryDiscovery;
use Http\Message\MessageFactory;
use Http\Message\UriFactory;
use Mohrekopp\MailHogClient\Model\Messages;

/**
 * Class MailHogClient.
 *
 * @author Chinthujan Sehasothy <chinthu@madco.de>
 */
class MailHogClient
{
    /**
     * @var HttpClient
     */
    private $httpClient;

    /**
     * @var MessageFactory
     */
    private $messageFactory;

    /**
     * @var UriFactory
     */
    private $uriFactory;

    /**
     * @var string
     */
    private $baseUrl;

    public function __construct(
        string $baseUrl,
        HttpClient $httpClient = null,
        MessageFactory $messageFactory = null,
        UriFactory $uriFactory = null
    ) {
        $this->baseUrl = $baseUrl . '/api/v2';

        if (!$httpClient) {
            $httpClient = HttpClientDiscovery::find();
        }

        if (!$messageFactory) {
            $messageFactory = MessageFactoryDiscovery::find();
        }

        if (!$uriFactory) {
            $uriFactory = UriFactoryDiscovery::find();
        }

        $this->httpClient = $httpClient;
        $this->messageFactory = $messageFactory;
        $this->uriFactory = $uriFactory;
    }

    /**
     * Retrieve a list of messages
     *
     * @param int $start Start index
     * @param int $limit Number of messages
     *
     * @return Messages
     */
    public function getMessages(int $start = 0, int $limit = 0)
    {
        $uri = $this->uriFactory->createUri($this->baseUrl . '/messages')
            ->withQuery(http_build_query([
                'start' => $start,
                'limit' => $limit,
            ]))
        ;

        $request = $this->messageFactory->createRequest('GET', $uri);

        $response = $this->httpClient->sendRequest($request);

        return Messages::fromJson($response->getBody()->getContents());
    }

    /**
     * Search messages
     *
     * @param SearchCriteria $searchCriteria
     * @param int            $start Start index
     * @param int            $limit Number of messages
     *
     * @return Messages
     */
    public function searchMessages(SearchCriteria $searchCriteria, int $start = 0, int $limit = 0)
    {
        $uri = $this->uriFactory->createUri($this->baseUrl . '/search')
            ->withQuery(http_build_query([
                'kind' => $searchCriteria->getKind(),
                'query' => $searchCriteria->getQuery(),
                'start' => $start,
                'limit' => $limit,
            ]))
        ;

        $request = $this->messageFactory->createRequest('GET', $uri);

        $response = $this->httpClient->sendRequest($request);

        return Messages::fromJson($response->getBody()->getContents());
    }
}
