<?php
/**
 * User: marcus-campos
 * Date: 02/09/17
 * Time: 11:20
 */

namespace AnyBot\Link;

use AnyBot\Facebook\Constants\FacebookApiConstants;
use AnyBot\Facebook\Message\Text;
use PHPUnit\Framework\TestCase;

class SendApiTest extends TestCase
{
    /**
     * @expectedException \GuzzleHttp\Exception\ClientException
    */
    public function testMakeRequestFacebook()
    {
        $message = (new Text(1))->message('Oi');
        (new SendApi(FacebookApiConstants::URL, 'dsdasdasdas'))->make($message);
    }
}