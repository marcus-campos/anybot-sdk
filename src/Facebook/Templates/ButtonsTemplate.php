<?php
/**
 * User: marcus-campos
 * Date: 02/09/17
 * Time: 18:13
 */

namespace AnyBot\Facebook\Templates;


use AnyBot\Facebook\Elements\Interfaces\ElementInterface;
use AnyBot\Facebook\Messages\Interfaces\Message;

class ButtonsTemplate implements Message
{
    protected $buttons = [];

    protected $recipientId;

    /**
     * Message constructor.
     * @param string $recipientId
     */
    public function __construct(string $recipientId)
    {
        $this->recipientId = $recipientId;
    }

    public function add(ElementInterface $element)
    {
        $this->buttons[] = $element->get();
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
                    'type' => 'template',
                    'payload' => [
                        'template_type' => 'button',
                        'text' => $messageText,
                        'buttons' => $this->buttons
                    ]
                ],
                'metadata' => 'DEVELOPER_DEFINED_METADATA'
            ]
        ];
    }
}