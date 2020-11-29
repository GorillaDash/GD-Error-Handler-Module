<?php

namespace GorillaDash\ErrorHandler;

use GuzzleHttp\Client;

/**
 * Class Api
 *
 * @package GorillaDash\ErrorHandler
 */
class Api
{
    /**
     * @var \GuzzleHttp\Client
     */
    private $client;

    /**
     * @var string
     */
    private $token;

    /**
     * Api constructor.
     */
    public function __construct()
    {
        $this->token = config('gd-error-handler.token');
        $this->client = new Client([
            'base_uri' => 'https://monitor.gorilladash.com',
            'headers' => [
                'Authorization' => "Bearer {$this->token}"
            ],
        ]);
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return (bool)$this->token;
    }

    /**
     * @param $attributes
     *
     * @return bool
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request($attributes)
    {
        $response = $this->client->post('/api/errors/handler', [
           'json' => $attributes,
        ]);

        return $response->getStatusCode() >= 200 && $response->getStatusCode() <= 299;
    }

}
