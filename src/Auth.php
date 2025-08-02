<?php

namespace PDVMobi;

class Auth
{
    private $http;

    public function __construct(ApiConnection $connection)
    {
        $this->http = $connection;
    }

    public function get(string $username, string $password)
    {
        return $this->http->post('/v2/auth/token', [
            'username' => $username,
            'password' => $password,
        ], true);
    }
}
