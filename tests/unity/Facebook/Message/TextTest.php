<?php
/**
 * User: marcus-campos
 * Date: 02/09/17
 * Time: 10:12
 */

namespace AnyBot\Facebook\Messages;

use PHPUnit\Framework\TestCase;

class TextTest extends TestCase
{
    public function testReturnsAnArray()
    {
        $actual = (new Text(1))->message('Oi');
        $expected = [
            'recipient' => [
                'id' => 1
            ],
            'message' => [
                'text' => 'Oi',
                'metadata' => 'DEVELOPER_DEFINED_METADATA'
            ]
        ];

        $this->assertEquals($actual, $expected);
    }
}