<?php

namespace PDVMobi\dtos;

 

class ProductGroupsData extends BaseDTO
{
    /**
     * @var ProductGroupItemData[]
     */
    public readonly array $productGroups;

    public function __construct(array $productGroups)
    {
        $this->productGroups = $productGroups;
    }

    public function toArray(): array
    {
        return [
            'ProductGroups' => array_map(fn(ProductGroupItemData $group) => $group->toArray(), $this->productGroups)
        ];
    }


    public static function fromArray(array $data): self
    {
        $groups = [];

        if (isset($data[0]) && is_array($data[0])) {
            foreach ($data as $item) {
                $grp = $item['ProductGroups'] ?? $item;
                $groups[] = new ProductGroupItemData(
                    ProductGroupID: $grp['ProductGroupID'] ?? null,
                    StatusID: $grp['StatusID'] ?? null,
                    Name: $grp['Name'] ?? null,
                    ImageGroupBase64: $grp['ImageGroupBase64'] ?? null,
                );
            }
        } else {
            $grp = $data['ProductGroups'] ?? $data;
            $groups[] = new ProductGroupItemData(
                ProductGroupID: $grp['ProductGroupID'] ?? null,
                StatusID: $grp['StatusID'] ?? null,
                Name: $grp['Name'] ?? null,
                ImageGroupBase64: $grp['ImageGroupBase64'] ?? null,
            );
        }

        return new self(productGroups: $groups);
    }
}
