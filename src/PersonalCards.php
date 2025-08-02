<?php

namespace PDVMobi;

use PDVMobi\dtos\PersonalCardsData;

class PersonalCards
{
    private $http;

    public function __construct(ApiConnection $connection)
    {
        $this->http = $connection;
    }

    public function list()
    {
        return $this->http->get('/v2/personalCardsfull');
    }

    public function save(PersonalCardsData $productsData)
    {
        return $this->http->post('/v2/personalCardsfull', $productsData->toArray());
    }
}
