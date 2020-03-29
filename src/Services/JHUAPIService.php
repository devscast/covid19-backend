<?php

namespace App\Services;

use Psr\Log\LoggerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * Class JHUApiService
 * @package App\Services
 * @author bernard-ng <ngandubernard@gmail.com>
 */
class JHUAPIService
{
    public static string $url = 'https://covid19.mathdro.id/api';
    private HttpClientInterface $client;
    private LoggerInterface $logger;

    /**
     * JHUAPIService constructor.
     * @param HttpClientInterface $client
     * @param LoggerInterface $logger
     */
    public function __construct(
        HttpClientInterface $client,
        LoggerInterface $logger
    )
    {
        $this->client = $client;
        $this->logger = $logger;
    }

    public function getGlobalSummary()
    {
        try {
            $response = $this->client->request('GET', self::$url);
            return $response->getContent();
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage(), $e->getTrace());
        }
    }
}
