<?php
/**
 * User: marcus-campos
 * Date: 02/09/17
 * Time: 18:13
 */

namespace AnyBot\Facebook\Templates;


use AnyBot\Facebook\Elements\Button;
use AnyBot\Facebook\Templates\ButtonsTemplate;
use PHPUnit\Framework\TestCase;

class ButtonsTemplateTest extends TestCase
{
    public function testReturnWithTypePostBack()
    {
        $buttonsTemplate = new ButtonsTemplate(1234);
        $buttonsTemplate->add(new Button('postback', 'Que tal uma resposta do bot?!', 'resposta'));
        $actual = $buttonsTemplate->message('Olha um exemplo de template com botões');

        $expected = [
            'recipient' => [
                'id' => 1234
            ],
            'message' => [
                'attachment' => [
                    'type' => 'template',
                    'payload' => [
                        'template_type' => 'button',
                        'text' => 'Olha um exemplo de template com botões',
                        'buttons' => [
                            [
                                'type' => 'postback',
                                'title' => 'Que tal uma resposta do bot?!',
                                'payload' => 'resposta',
                            ]
                        ]
                    ]
                ],
                'metadata' => 'DEVELOPER_DEFINED_METADATA'
            ]
        ];

        $this->assertEquals($expected, $actual);
    }
}