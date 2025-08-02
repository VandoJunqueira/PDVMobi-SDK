<?php

namespace PDVMobi;

use PDVMobi\dtos\UsersData;

class Users
{
    private $http;

    public function __construct(ApiConnection $connection)
    {
        $this->http = $connection;
    }

    public function list()
    {
        return $this->http->get('/v2/users');
    }

    public function save(UsersData $userData)
    {
        return $this->http->post('/v2/users', $userData->toArray());
    }
}
