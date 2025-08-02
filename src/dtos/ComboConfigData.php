<?php

namespace PDVMobi\dtos;

class ComboConfigData extends BaseDTO
{
    /**
     * @param ComboItemData[] $ComboItems
     */
    public function __construct(
        public readonly string $Description,
        public readonly ?int $MinItens = null,
        public readonly ?int $MaxItens = null,
        public readonly ?int $Addition = null,
        public readonly array $ComboItems = [],
    ) {}
}
