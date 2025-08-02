<?php

namespace PDVMobi\Enums;

enum StatusTypeEnum: string
{
    case DESABILITADO = 'ABCDEABC-ABCD-ABCD-ABCD-ABCED1457822';
    case HABILITADO = 'ABCDEABC-ABCD-ABCD-ABCD-ABCED1758966';

    public function label(): string
    {
        return match ($this) {
            self::DESABILITADO => 'Desabilitado',
            self::HABILITADO => 'Habilitado',
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
