<?php

namespace Source\Models;

use Source\Core\Model;

class Chat extends Model
{
    public function __construct()
    {
        parent::__construct("chats", ["id"], ["live_id", "sender", "hash", "message"]);
    }

}