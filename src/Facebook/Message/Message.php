<?php
/**
 * User: marcus-campos
 * Date: 02/09/17
 * Time: 10:08
 */
namespace AnyBot\Facebook\Message;

interface Message
{
    /**
     * Message constructor.
     * @param string $recipientId
     */
    public function __construct(string $recipientId);

    /**
     * @param string $messageText
     * @return array
     */
    public function message(string $messageText): array;
}
