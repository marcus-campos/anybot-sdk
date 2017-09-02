<?php
/**
 * Created by PhpStorm.
 * User: marcus
 * Date: 02/09/17
 * Time: 11:04
 */

namespace AnyBot\Client;

use AnyBot\Facebook\Constants\FacebookApiConstants;
use GuzzleHttp\Client;


class CallSendApi
{
    /**
     * @var string
     */
    private $url;
    /**
     * @var string
     */
    private $pageAccessToken;

    /**
     * SendApi constructor.
     * @param string $pageAccessToken
     * @internal param string $pageAcessToken
     */
    public function __construct(string $pageAccessToken)
    {
        $this->pageAccessToken = $pageAccessToken;
    }

    /**
     * @return $this
     */
    public function facebook()
    {
        $this->url = FacebookApiConstants::URL;
        return $this;
    }

    /**
     * @param array $message
     * @param string|null $url
     * @param string $method
     * @return string
     */
    public function make(array $message, string $url = null, $method = 'POST') :string
    {
        $client = new Client;
        $url = $url ?? $this->url;

        $response = $client->request($method, $url, [
            'json' => $message,
            'query' => ['access_token' => $this->pageAccessToken]
        ]);

        return (string)$response->getBody();
    }
}