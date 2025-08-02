<?php

namespace PDVMobi\dtos;

 

class PedidoExtraData extends BaseDTO
{
    public function __construct(
        public readonly string $CPF = '',
        public readonly string $Nome = '',
    ) {}
}
