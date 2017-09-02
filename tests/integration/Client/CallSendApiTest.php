<?php
/**
 * User: marcus-campos
 * Date: 02/09/17
 * Time: 11:20
 */

namespace AnyBot\Client;

use AnyBot\Facebook\Constants\FacebookApiConstants;
use AnyBot\Facebook\Messages\Text;
use PHPUnit\Framework\TestCase;

class CallSendApiTest extends TestCase
{
    /**
     * @expectedException \GuzzleHttp\Exception\ClientException
    */
    public function testMakeRequestFacebook()
    {
        $message = (new Text(1))->message('Oi');
        (new CallSendApi('dsdasdasdas'))->facebook()->make($message);
    }
}