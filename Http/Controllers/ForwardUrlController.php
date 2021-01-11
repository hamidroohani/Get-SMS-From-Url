<?php


namespace HamidRoohani\ForwardToUrl\Http\Controllers;

use HamidRoohani\ForwardToUrl\Facades\ResponderFacade;
use HamidRoohani\ForwardToUrl\Facades\SaveDBFacade;
use HamidRoohani\ForwardToUrl\Facades\ValidateRequesterFacade;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ForwardUrlController extends Controller
{
    public function saveSms(Request $request)
    {
        // validate requester
        ValidateRequesterFacade::checkIp();

        // validate parameters
        $this->validateParams();

        // save to DB
        SaveDBFacade::save($request);
    }

    private function validateParams()
    {
        $validate = Validator::make(request()->all(), [
            'source' => 'required|in:farapayamak,rahyab',
            'to' => 'required',
            'from' => 'required',
            'body' => 'required',
        ]);
        if ($validate->fails()) {
            Log::channel('daily-forward-url-sms')->error($validate->errors() . \Request::fullUrl());
            ResponderFacade::validateParams($validate->errors())->throwResponse();
        }
    }
}
