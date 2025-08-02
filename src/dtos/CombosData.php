<?php

namespace PDVMobi\dtos;

 

class CombosData extends BaseDTO
{
    /**
     * @var ComboProductData[]
     */
    public readonly array $ProductCombos;

    public function __construct(array $ProductCombos)
    {
        $this->ProductCombos = $ProductCombos;
    }

    public function toArray(): array
    {
        return [
            'ProductCombos' => array_map(
                fn(ComboProductData $combo) => $combo->toArray(),
                $this->ProductCombos
            )
        ];
    }

    public static function fromArray(array $data): self
    {
        $combos = [];

        foreach ($data['ProductCombos'] ?? [] as $combo) {
            $configs = [];

            foreach ($combo['ComboConfig'] ?? [] as $config) {
                $items = array_map(
                    fn($item) => new ComboItemData(
                        ProductID: $item['ProductID'] ?? null,
                        Price: $item['Price'] ?? null,
                    ),
                    $config['ComboItems'] ?? []
                );

                $configs[] = new ComboConfigData(
                    Description: $config['Description'] ?? '',
                    MinItens: $config['MinItens'] ?? null,
                    MaxItens: $config['MaxItens'] ?? null,
                    Addition: $config['Addition'] ?? null,
                    ComboItems: $items
                );
            }

            $combos[] = new ComboProductData(
                ProductID: $combo['ProductID'] ?? '',
                ProductName: $combo['ProductName'] ?? '',
                StatusCombo: $combo['StatusCombo'] ?? 0,
                ComboConfig: $configs
            );
        }

        return new self(ProductCombos: $combos);
    }
}
