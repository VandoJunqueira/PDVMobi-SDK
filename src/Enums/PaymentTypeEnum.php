<?php

namespace PDVMobi\Enums;

enum PaymentTypeEnum: string
{
    case DINHEIRO       = '04473DA3-08DB-4699-A01F-65C6E4B3CF02';
    case CARTAO         = '8E7D9EE9-0FA8-47AB-8FE6-14EB3EE626EA';
    case CONTACTLESS    = '6E661A3D-FFF9-4354-8819-9D85915A70C9';
    case NFC            = 'A1502F2F-F18B-4B2E-80FE-638E67EC7EA8';
    case TEF            = 'D370A3DF-ECD2-499C-B61C-EA17912F7F2A';
    case CORTESIA       = '293F8DCB-CC35-4F55-A634-852A24B6BC8B';
    case TILLIT         = 'D1B509D7-DB81-465A-8B29-FD22E2ABDCA4';
    case RAPPI_PAY      = 'AE2BA302-C9E5-46AF-BFA6-F340E5248449';
    case DIGITADO       = '520AE2AA-2CEE-49D1-B1B4-F09E7D95656B';
    case AME_DIGITAL    = '40E7ED64-0472-4020-BAEB-93EBB6A46578';
    case FATURADO       = '33AF77E9-C2B5-421F-A923-7578AA6E3481';
    case FACIAL         = 'A8410DA8-7D6E-49CE-90B0-74BACBE5BD23';
    case OPEN_CASHBACK  = '064E472E-5C55-489E-B0FE-C0006DECF21A';
    case POS            = 'D5B807C6-FBE6-49C0-8331-AEB9F283CF74';
    case WSAPORE        = '6BE430C0-50DB-4C1E-BE4A-107AE5D39F00';
    case PIX            = 'DB3BB166-9CCC-4A89-A5A9-9529BCD70E61';
    case TECBAN         = '1180F380-C85F-4974-ADB4-B65BB86ECC98';

    public function label(): string
    {
        return match ($this) {
            self::DINHEIRO => 'Dinheiro',
            self::CARTAO => 'Cartao',
            self::CONTACTLESS => 'Contactless',
            self::NFC => 'NFC',
            self::TEF => 'TEF',
            self::CORTESIA => 'Cortesia',
            self::TILLIT => 'TiLLit',
            self::RAPPI_PAY => 'RAPPI PAY',
            self::DIGITADO => 'Digitado',
            self::AME_DIGITAL => 'AME Digital',
            self::FATURADO => 'Faturado',
            self::FACIAL => 'FACIAL',
            self::OPEN_CASHBACK => 'Open CashBack',
            self::POS => 'POS',
            self::WSAPORE => 'WSapore',
            self::PIX => 'PIX',
            self::TECBAN => 'TECBAN',
        };
    }

    public static function toArray(): array
    {
        return array_map(
            fn(self $enum) => [
                'label' => $enum->label(),
                'value' => $enum->value,
            ],
            self::cases()
        );
    }
}
