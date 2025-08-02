<?php

namespace PDVMobi;

use PDVMobi\dtos\ProductsData;

class Products
{
    private $http;

    public function __construct(ApiConnection $connection)
    {
        $this->http = $connection;
    }

    public function list()
    {
        return $this->http->get('/v2/products');
    }

    public function save(ProductsData $productsData)
    {
        return $this->http->post('/v2/products', $productsData->toArray());
    }
}
