<?php

namespace PayusAPI\Http;

use GuzzleHttp\Client as GuzzleClient;
use Psr\Http\Message\ResponseInterface;
use PayusAPI\Exceptions\BadRequest;
use PayusAPI\Exceptions\InvalidArgument;

class Client
{
    /** @var string */
    public $access_token;
    /** @var bool */

    /** @var \GuzzleHttp\Client */
    public $client;

    /**
     * Guzzle allows options into its request method. Prepare for some defaults
     * @var array
     */
    protected $clientOptions = [];

    /**
     * if set to false, no Response object is created, but the one from Guzzle is directly returned
     * comes in handy own error handling
     *
     * @var bool
     */
    protected $wrapResponse = true;

    /** @var string */
    private $user_agent = "PayusAPI_PHP/1.0.0-rc.1 (https://github.com/rajvantchahal/payus-sdk-php)";

    /**
     * Make it, baby.
     *
     * @param  array $config Configuration array
     * @param  GuzzleClient $client The Http Client (Defaults to Guzzle)
     * @param array $clientOptions options to be passed to Guzzle upon each request
     * @param bool $wrapResponse wrap request response in own Response object
     */
    public function __construct($config = [], $client = null, $clientOptions = [], $wrapResponse = true)
    {
        $this->clientOptions = $clientOptions;
        $this->wrapResponse = $wrapResponse;

        $this->access_token = isset($config["access_token"]) ? $config["access_token"] : getenv("PayusAPI_ACCESS_TOKEN");
        if (empty($this->access_token)) {
            throw new InvalidArgument("You must provide a PayusAPI api access_token.");
        }

        $this->client = $client ?: new GuzzleClient();
    }

    /**
     * Send the request...
     *
     * @param  string $method The HTTP request verb
     * @param  string $endpoint The PayusAPI API endpoint
     * @param  array $options An array of options to send with the request
     * @param  string $query_string A query string to send with the request
     * @return \PayusAPI\Http\Response|ResponseInterface
     * @throws \PayusAPI\Exceptions\BadRequest
     */
    public function request($method, $endpoint, $options = [], $query_string = null)
    {
        $url = $this->generateUrl($endpoint, $query_string);

        $options = array_merge($this->clientOptions, $options);
        $options["headers"]["User-Agent"] = $this->user_agent;
        $options["headers"]["Content-type"] = 'application/json';
        $options["headers"]["x-auth-token"] = $this->access_token;

        try {
            if ($this->wrapResponse === false) {
                return $this->client->request($method, $url, $options);
            }
            return new Response($this->client->request($method, $url, $options));
        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            throw new BadRequest(\GuzzleHttp\Psr7\str($e->getResponse()), $e->getCode(), $e);
        } catch (\Exception $e) {
            throw new BadRequest($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * Generate the full endpoint url, including query string.
     *
     * @param  string  $endpoint      The PayusAPI API endpoint.
     * @param  string  $query_string  The query string to send to the endpoint.
     * @return string
     */
    protected function generateUrl($endpoint, $query_string = null)
    {
        $url = $query_string ? $endpoint."?" : $endpoint;

        return $url.$query_string;
    }
}
