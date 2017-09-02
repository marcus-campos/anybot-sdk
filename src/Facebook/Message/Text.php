<?php
/**
 * User: marcus-campos
 * Date: 02/09/17
 * Time: 10:08
 */
namespace AnyBot\Facebook\Message;

class Text
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
                'id' => 1
            ],
            'message' => [
                'text' => $messageText,
                'metadata' => 'DEVELOPER_DEFINED_METADATA'
            ]
        ];
    }
}