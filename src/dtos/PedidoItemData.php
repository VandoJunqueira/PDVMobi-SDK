<?php

namespace PDVMobi\dtos;

 

class PedidoItemData extends BaseDTO
{
    public function __construct(
        public readonly string $ProductID,
        public readonly string $price,
        public readonly string $Quantity = '1',
    ) {}
}
