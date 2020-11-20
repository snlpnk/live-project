<?php

namespace Source\Models;

use Source\Core\Model;

class Lead extends Model
{
    public function __construct()
    {
        parent::__construct("leads", ["id"], ["name", "email", "source"]);
    }

}