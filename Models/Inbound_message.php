<?php

namespace HamidRoohani\ForwardToUrl\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Inbound_message extends Model
{
    protected $connection = 'mongodb';
    protected $table = "inbound_messages";
}
