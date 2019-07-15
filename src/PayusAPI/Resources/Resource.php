<?php

namespace PayusAPI\Resources;

abstract class Resource
{
    /**
     * @var \PayusAPI\Http\Client
     */
    protected $client;

    /**
     * Makin' a good ole resource
     *
     * @param \PayusAPI\Http\Client $client
     */
    function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * Convert a time, DateTime, or string to a millisecond timestamp.
     *
     * @param \DateTime|int|null $time
     * @return int|null
     */
    protected function timestamp($time)
    {
        return ms_timestamp($time);
    }
}
