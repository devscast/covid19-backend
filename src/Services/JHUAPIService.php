<?php

namespace App\Services;

use Psr\Log\LoggerInterface;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * Class JHUApiService
 * @package App\Services
 * @author bernard-ng <ngandubernard@gmail.com>
 */
class JHUAPIService
{
    public static string $url = 'https://covid19.mathdro.id/api';

    public static array $endpoint = [
        'global' => '',
        'og' => '/og',
        'confirmed' => '/confirmed',
        'recovered' => '/recovered',
        'deaths' => '/deaths',
        'daily' => '/daily',
        'countries' => '/countries'
    ];

    private HttpClientInterface $client;
    private LoggerInterface $logger;

    /**
     * JHUAPIService constructor.
     * @param HttpClientInterface $client
     * @param LoggerInterface $logger
     */
    public function __construct(HttpClientInterface $client, LoggerInterface $logger)
    {
        $this->client = $client;
        $this->logger = $logger;
    }

    public function getGlobalSummary()
    {
        return $this->processRequest(function () {
            $response = $this->client->request('GET', $this->getUrl('global'));
            return $response->getContent();
        });
    }

    public function getOGImage()
    {
        return $this->processRequest(function () {
            $response = $this->client->request('GET', $this->getUrl('og'));
            return $response->getContent();
        });
    }

    /**
     * Generate resource url
     * @param string $string
     * @return string
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    private function getUrl(string $string): string
    {
        return self::$url . self::$endpoint[$string];
    }

    /**
     * @param callable $action
     * @return mixed
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    private function processRequest(callable $action)
    {
        try {
            return $action();
        } catch (TransportExceptionInterface |
        ClientExceptionInterface |
        RedirectionExceptionInterface |
        ServerExceptionInterface $e
        ) {
            $this->logger->error($e->getMessage(), $e->getTrace());
        }
    }
}
