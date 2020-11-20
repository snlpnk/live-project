<?php

namespace Source\Models;

use Source\Core\Model;

class Live extends Model
{
    public function __construct()
    {
        parent::__construct("lives", ["id"], ["title", "uri", "description", "video"]);
    }

    public function findByUri(string $uri, string $columns = "*"): ?Live
    {
        $find = $this->find("uri = :uri", "uri={$uri}", $columns);
        return $find->fetch();
    }

}