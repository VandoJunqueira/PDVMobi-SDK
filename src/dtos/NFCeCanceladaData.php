<?php

namespace PDVMobi\dtos;

 

class NFCeCanceladaData extends BaseDTO
{
    public function __construct(
        public readonly string $tipo_ambiente,
        public readonly string $accesskey,
        public readonly string $protCancelamento,
        public readonly string $dhCancelamento,
        public readonly string $numnf,
        public readonly string $serienf,
    ) {}

    public function toArray(): array
    {
        return [
            'tipo_ambiente' => $this->tipo_ambiente,
            'accesskey' => $this->accesskey,
            'protCancelamento' => $this->protCancelamento,
            'dhCancelamento' => $this->dhCancelamento,
            'numnf' => $this->numnf,
            'serienf' => $this->serienf,
        ];
    }
}
