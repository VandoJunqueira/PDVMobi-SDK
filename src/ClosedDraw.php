<?php

namespace PDVMobi;

class ClosedDraw
{
    private $http;

    public function __construct(ApiConnection $connection)
    {
        $this->http = $connection;
    }

    public function list(string $dateTimeStart, string $dataTimeEnd)
    {
        return $this->http->get('/v2/closedDraw', [
            'datetimeini' => $dateTimeStart,
            'datetimeend' => $dataTimeEnd
        ]);
    }
}
