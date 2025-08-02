<?php

namespace PDVMobi\dtos;

use PDVMobi\Enums\ProductTypeEnum;
use PDVMobi\Enums\StatusTypeEnum;
use PDVMobi\Enums\UnitTypeEnum;

class ProductItemData extends BaseDTO
{
    public function __construct(
        // Obrigatórios
        public readonly string $ProductGroupID,
        public readonly ProductTypeEnum|string $ProductTypeID,
        public readonly UnitTypeEnum|string $UnitTypeID,
        public readonly string $Name,
        public readonly string $SalePrice,

        // Opcionais
        public readonly ?string $ProductID = '',
        public readonly ?string $InternalCode = null,
        public readonly StatusTypeEnum|string|null $StatusID = StatusTypeEnum::HABILITADO,
        public readonly ?string $NameEng = null,
        public readonly ?string $BarCode = null,
        public readonly ?string $BarCodeJS = null,
        public readonly ?string $ImageBase64 = null,
        public readonly ?string $NFCeNCM = null,
        public readonly ?string $NFCeCFOP = null,
        public readonly ?string $NFCeCST = null,
        public readonly ?string $NFCeAliqICMS = null,
        public readonly ?string $NFCeCEST = null,
        public readonly ?string $NFCeCSTPIS = null,
        public readonly ?string $NFCeAliqPIS = null,
        public readonly ?string $NFCeCSTCOFINS = null,
        public readonly ?string $NFCeAliqCOFINS = null,
        public readonly ?string $NFCeCodANP = null,
        public readonly ?string $NFCeBaseRedICMS = null,
        public readonly ?string $NFCeCodBenef = null,
        public readonly ?string $NFCeMotBenef = null,
    ) {}
}
