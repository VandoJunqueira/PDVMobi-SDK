<?php

namespace PDVMobi\dtos;

 

class ComboProductData extends BaseDTO
{
    /**
     * @param ComboConfigData[] $ComboConfig
     */
    public function __construct(
        public readonly string $ProductName,
        public readonly array $ComboConfig = [],
        public readonly string $ProductID = '',
        public readonly int $StatusCombo = 1,
    ) {}
}
