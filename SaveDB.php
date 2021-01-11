<?php


namespace HamidRoohani\ForwardToUrl;

use HamidRoohani\ForwardToUrl\Models\Inbound_message;

class SaveDB
{
    public function save($request)
    {
        $source = $request->input('source');
        $from = $request->input('from');
        $to = $request->input('to');
        $body = $request->input('body');

        $record = new Inbound_message();
        $record->source = $source;
        $record->from = $from;
        $record->to = $to;
        $record->body = $body;
        $record->save();
    }
}
