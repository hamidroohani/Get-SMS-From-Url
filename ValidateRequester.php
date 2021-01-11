<?php


namespace HamidRoohani\ForwardToUrl;


use HamidRoohani\ForwardToUrl\Facades\ResponderFacade;

class ValidateRequester
{
    public function checkIp()
    {
        $valid_ips = env('FORWARD_URL_VALID_IPS');
        $valid_ips = explode(',',$valid_ips);
        if (!in_array($_SERVER['REMOTE_ADDR'],$valid_ips)){
            ResponderFacade::blockedIp()->throwResponse();
        }
    }
}
