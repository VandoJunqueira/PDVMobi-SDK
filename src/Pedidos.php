<?php

namespace PDVMobi;

use PDVMobi\dtos\PedidoData;

class Pedidos
{
    private $http;

    public function __construct(ApiConnection $connection)
    {
        $this->http = $connection;
    }

    public function last(string $comandaHDID)
    {
        return $this->http->post('/v3/pedidos/lstitem', [
            'comandaHDID' => $comandaHDID
        ]);
    }

    public function save(PedidoData $pedidoData)
    {
        return $this->http->post('/v3/pedidos/newitem', $pedidoData->toArray());
    }
}
