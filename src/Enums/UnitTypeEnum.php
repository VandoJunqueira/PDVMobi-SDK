<?php

namespace PDVMobi\Enums;

enum UnitTypeEnum: string
{
    case UN = '55550E77-10D1-40DA-A067-075CB2124ACC';
    case KG = '55550E77-10D1-40DA-A067-075CB2ACCE25';
    case CX = '55550E77-10D1-40DA-A067-075CB2EDDD85';
    case L = '55550E77-10D1-40DA-A067-075CB2EEEA29';
    case IN = '70FC0030-56DC-4316-AAF5-5B4A106FBE93';
    case VR = '71F5C365-95D4-4B8C-B648-5CE0A2DA297E';
    case VQ = 'D46DAEDE-CDC7-4C2D-889F-66E2BB7CE170';
    case CB = 'F6EC57BA-BBE5-429A-B018-A2B4DF7B1A9E';
    case M3 = '34088DE9-2DE6-42B5-AAB1-CADB9AA226FB';
    case M2 = '78866486-AC5D-472A-9C2D-D9A8454FE79C';
    case PC = 'FB3BFE14-7D94-4043-BC76-F198D00BE34A';


    public function label(): string
    {
        return match ($this) {
            self::UN => 'Un',
            self::KG => 'Kg',
            self::CX => 'Cx',
            self::L => 'L',
            self::IN => 'In',
            self::VR => 'VR',
            self::VQ => 'Vq',
            self::CB => 'CB',
            self::M3 => 'M3',
            self::M2 => 'M2',
            self::PC => 'Pc',
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
