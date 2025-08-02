<?php

namespace PDVMobi;

use PDVMobi\dtos\NFCeResponseData;

class NFCe
{
    private $http;

    public function __construct(ApiConnection $connection)
    {
        $this->http = $connection;
    }

    public function processed(NFCeResponseData $nFCeResponseData)
    {
        return $this->http->post('/v3/nfceExt/retNFCeProcessed', $nFCeResponseData->toArray());
    }

    public function cancelamento(NFCeResponseData $nFCeResponseData)
    {
        return $this->http->post('/v3/nfceExt/retNFCeProcessed', $nFCeResponseData->toArray());
    }
}
