<?php

namespace PDVMobi;

use PDVMobi\dtos\ProductGroupsData;

class ProductGroups
{
    private $http;

    public function __construct(ApiConnection $connection)
    {
        $this->http = $connection;
    }

    public function list()
    {
        return $this->http->get('/v2/productgroups');
    }

    public function save(ProductGroupsData $productGroupsData)
    {
        return $this->http->post('/v2/productgroups', $productGroupsData->toArray());
    }
}
