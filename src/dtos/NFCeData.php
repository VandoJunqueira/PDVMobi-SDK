<?php

namespace PDVMobi\dtos;

 

class NFCeData extends BaseDTO
{
    public function __construct(
        public readonly string $tipo_ambiente,
        public readonly string $accesskey,
        public readonly string $digval,
        public readonly string $nprot,
        public readonly string $dhrecbto,
        public readonly string $qrCode,
        public readonly string $urlSefazConsumer,
        public readonly string $numnf,
        public readonly string $serienf,
        public readonly string $tributo,
        public readonly string $tributoEst,
        public readonly string $tributoFed,
        public readonly string $msgTributo,
        public readonly string $NFCE_ID,
        public readonly string $outros,
    ) {}
}
