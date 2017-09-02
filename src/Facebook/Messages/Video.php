<?php
/**
 * User: marcus-campos
 * Date: 02/09/17
 * Time: 10:45
 */

namespace AnyBot\Facebook\Messages;


use AnyBot\Facebook\Messages\Interfaces\Message;

class Video implements Message
{
    /**
     * @var string
     */
    private $recipientId;

    /**
     * Message constructor.
     * @param string $recipientId
     */
    public function __construct(string $recipientId)
    {
        parent::__construct($recipientId);
        $this->recipientId = $recipientId;
    }

    /**
     * @param string $messageText
     * @return array
     */
    public function message(string $messageText): array
    {
        return [
            'recipient' => [
                'id' => $this->recipientId
            ],
            'message' => [
                'attachment' => [
                    'type' => 'video',
                    'payload' => [
                        'url' => $messageText
                    ]
                ],
                'metadata' => 'DEVELOPER_DEFINED_METADATA'
            ]
        ];
    }
}