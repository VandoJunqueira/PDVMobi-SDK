<?php

namespace PDVMobi;

class VrfTicket
{
    private $http;

    public function __construct(ApiConnection $connection)
    {
        $this->http = $connection;
    }

    public function getById(string $tktID)
    {
        return $this->http->get('/v2/vrfTicket', [
            'tktID' => $tktID
        ]);
    }

    public function getBySaleItemsID(string $SaleItemsID)
    {
        return $this->http->get('/v2/vrfTicketUpd', [
            'SaleItemsID' => $SaleItemsID
        ]);
    }
}
