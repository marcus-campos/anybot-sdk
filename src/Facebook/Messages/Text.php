<?php
/**
 * User: marcus-campos
 * Date: 02/09/17
 * Time: 10:08
 */
namespace AnyBot\Facebook\Messages;

use AnyBot\Facebook\Messages\Interfaces\Message;

class Text implements Message
{
    /**
     * @var string
     */
    private $recipientId;

    /**
     * Text constructor.
     * @param string $recipientId
     */
    public function __construct(string $recipientId)
    {
        $this->recipientId = $recipientId;
    }

    /**
     * @param string $messageText
     * @return array
     */
    public function message(string $messageText) :array
    {
        return [
            'recipient' => [
                'id' => $this->recipientId
            ],
            'message' => [
                'text' => $messageText,
                'metadata' => 'DEVELOPER_DEFINED_METADATA'
            ]
        ];
    }
}