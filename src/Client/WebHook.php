<?php
/**
 * User: marcus-campos
 * Date: 02/09/17
 * Time: 14:20
 */

namespace AnyBot\Client;


class WebHook
{
    public function check(string $token)
    {
        $hubMode = filter_input(INPUT_GET, 'hub_mode');
        $hubVerifyToken = filter_input(INPUT_GET, 'hub_verify_token');
        if($hubMode === 'subscribe' and $hubVerifyToken === $token){
            return filter_input(INPUT_GET, 'hub_challenge');
        }
        return false;
    }
}