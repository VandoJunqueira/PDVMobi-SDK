<?php

namespace PDVMobi\dtos;

 

class PersonalCardItemData extends BaseDTO
{
    public function __construct(
        public readonly ?string $personalCardsID = '',
        public readonly string $cardNumber = '',
        public readonly string $tipoConsumo = '0',
        public readonly string $qtConsumo = '0',
        public readonly string $valConsumoM = '0.00',
        public readonly string $valConsumoU = '0.00',
        public readonly string $namePerson = '',
        public readonly string $cpfperson = '',
    ) {}
}
