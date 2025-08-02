<?php

namespace PDVMobi;

class Sales
{
    private $http;

    public function __construct(ApiConnection $connection)
    {
        $this->http = $connection;
    }

    public function list(string $dateTimeStart, string $dataTimeEnd)
    {
        return $this->http->get('/v2/sales', [
            'datetimeini' => $dateTimeStart,
            'datetimeend' => $dataTimeEnd
        ]);
    }

    public function byGroupProduct(string $dateStart, string $dataEnd)
    {
        return $this->http->get('/v2/SalesGroupProduct', [
            'dateini' => $dateStart,
            'dateend' => $dataEnd
        ]);
    }

    public function byDay(string $dateStart, string $dataEnd)
    {
        return $this->http->get('/v2/SalesDay', [
            'dateini' => $dateStart,
            'dateend' => $dataEnd
        ]);
    }

    public function bySpool(string $dateTimeStart, string $dataTimeEnd)
    {
        return $this->http->get('/v2/salesSpool', [
            'datetimeini' => $dateTimeStart,
            'datetimeend' => $dataTimeEnd
        ]);
    }

    public function byId(string $SalePosCodeID)
    {
        return $this->http->get('/v2/salebySaleID', [
            'SalePosCodeID' => $SalePosCodeID,
        ]);
    }

    public function canceled(string $dateTimeStart, string $dataTimeEnd)
    {
        return $this->http->get('/v2/canceledSales', [
            'datetimeini' => $dateTimeStart,
            'datetimeend' => $dataTimeEnd
        ]);
    }
}
