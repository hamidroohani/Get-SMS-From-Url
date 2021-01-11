<?php


namespace HamidRoohani\ForwardToUrl\Http\Responses;

use Illuminate\Http\Response;

class UrlResponse
{
    public function blockedIp()
    {
        return response()->json(['err' => 'You are blocked.'], Response::HTTP_BAD_REQUEST);
    }

    public function validateParams($err)
    {
        return response()->json(['err' => $err], Response::HTTP_BAD_REQUEST);
    }
}
