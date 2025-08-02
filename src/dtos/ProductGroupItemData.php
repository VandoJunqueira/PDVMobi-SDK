<?php

namespace PDVMobi\dtos;

 
use App\Services\PDVMobi\Enums\StatusTypeEnum;

class ProductGroupItemData extends BaseDTO
{
    public function __construct(
        public readonly string $Name,
        public readonly ?string $ImageGroupBase64 = null,
        public readonly ?string $ProductGroupID = '',
        public readonly StatusTypeEnum|string $StatusID = StatusTypeEnum::HABILITADO,
    ) {}
}
