<?php

namespace PDVMobi;

use PDVMobi\dtos\CombosData;

class ProductCombos
{
    private $http;

    public function __construct(ApiConnection $connection)
    {
        $this->http = $connection;
    }

    public function list()
    {
        return $this->http->get('/v3/productcombos');
    }

    public function save(CombosData $combosData)
    {
        return $this->http->post('/v3/productcombos', $combosData->toArray());
    }
}
