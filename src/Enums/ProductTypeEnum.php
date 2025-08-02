<?php

namespace PDVMobi\Enums;

enum ProductTypeEnum: string
{
    case FORNECIDO = '55550E77-10D1-40DA-A067-075CB2124577';
    case PRODUZIDO = '55550E77-10D1-40DA-A067-075CB2147DCA';

    public function label(): string
    {
        return match ($this) {
            self::FORNECIDO => 'Fornecido',
            self::PRODUZIDO => 'Produzido',
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
