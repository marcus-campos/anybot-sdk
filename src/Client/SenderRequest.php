<?php
/**
 * User: marcus-campos
 * Date: 02/09/17
 * Time: 14:05
 */

namespace AnyBot\Client;


class SenderRequest
{
    private $event;

    /**
     * SenderRequest constructor.
     */
    public function __construct()
    {
        $event = file_get_contents('php://input');
        $event = json_decode($event, true, 512, JSON_BIGINT_AS_STRING);
        $this->event = $event['entry'][0]['messaging'][0];
    }

    /**
     * @return null
     */
    public function getSenderId()
    {
        return $this->event['sender']['id'] ?? null;
    }

    /**
     * @return null
     */
    public function getMessage()
    {
        return $this->event['message']['text'] ?? null;
    }

    /**
     * @return null
     */
    public function getPostBack()
    {
        if(empty($this->event['postback']))
            return null;

        if(is_array($this->event['postback']) and !empty($this->event['postback']['payload']))
            $this->event['postback']['payload'];

        return $this->event['postback'];
    }
}