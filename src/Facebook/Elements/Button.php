<?php
/**
 * User: marcus-campos
 * Date: 02/09/17
 * Time: 18:30
 */

namespace AnyBot\Facebook\Elements;


use AnyBot\Facebook\Elements\Interfaces\ElementInterface;

class Button implements ElementInterface
{
    private $title;
    private $type;
    private $value;
    private $config;

    /**
     * Button constructor.
     * @param string $type
     * @param null|string $title
     * @param null|string $value
     * @param array $config
     */
    public function __construct(string $type, ? string $title = null, ? string $value, array $config = [])
    {
        $this->type = $type;
        $this->title = $title;
        $this->value = $value;
        $this->config = $config;
    }

    public function get() :array
    {
        $data = [
            'type' => $this->type
        ];

        if($this->title !== null)
            $data['title'] = $this->title;

        if($this->type === 'web_url')
            $data['url'] = $this->value;

        if($this->type === 'postback' or $this->type === 'phone_number')
            $data['payload'] = $this->value;

        if($this->type === 'share_contents') {
            if ($this->value)
                $data['share_contents'] = $this->value;

            unset($this->title);
        }

        return array_merge($data, $this->config);
    }
}