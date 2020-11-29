<?php

namespace GorillaDash\ErrorHandler;

/**
 * Class Handler
 *
 * @package GorillaDash\ErrorHandler
 */
class Handler
{
    /**
     * @var \GorillaDash\ErrorHandler\Api
     */
    private $api;

    /**
     * Handler constructor.
     */
    public function __construct()
    {
        $this->api = new Api();
    }


    /**
     * @param $websiteUrl
     * @param $message
     * @param $context
     * @param $traceString
     *
     * @return bool
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function push($websiteUrl, $message, $context, $traceString)
    {
        if ($this->api->valid()) {
            return $this->api->request([
                'website_url' => $websiteUrl,
                'message' => $message,
                'context' => $context,
                'trace_string' => $traceString,
            ]);
        }

        return false;
    }
}
