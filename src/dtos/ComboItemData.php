<?php

namespace PDVMobi\dtos;

class ComboItemData extends BaseDTO
{
    public function __construct(
        public readonly ?string $ProductID = null,
        public readonly float|string|null $Price = null,
    ) {}
}
