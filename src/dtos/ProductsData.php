<?php

namespace PDVMobi\dtos;

 

class ProductsData extends BaseDTO
{
    /**
     * @var ProductItemData[]
     */
    public readonly array $products;

    public function __construct(array $products)
    {
        $this->products = $products;
    }

    // Sobrescreve o toArray para já devolver o array com chave 'Product' em cada item
    public function toArray(): array
    {
        return array_map(function (ProductItemData $product) {
            return ['Product' => $product->toArray()];
        }, $this->products);
    }

    public static function fromArray(array $data): self
    {
        $products = [];

        if (isset($data[0]) && is_array($data[0])) {
            foreach ($data as $item) {
                $prod = $item['Product'] ?? $item;

                $products[] = new ProductItemData(
                    ProductID: $prod['ProductID'] ?? null,
                    StatusID: $prod['StatusID'] ?? null,
                    ProductGroupID: $prod['ProductGroupID'] ?? null,
                    ProductTypeID: $prod['ProductTypeID'] ?? null,
                    UnitTypeID: $prod['UnitTypeID'] ?? null,
                    Name: $prod['Name'] ?? null,
                    NameEng: $prod['NameEng'] ?? null,
                    InternalCode: $prod['InternalCode'] ?? null,
                    BarCode: $prod['BarCode'] ?? null,
                    BarCodeJS: $prod['BarCodeJS'] ?? null,
                    ImageBase64: $prod['ImageBase64'] ?? null,
                    NFCeNCM: $prod['NFCeNCM'] ?? null,
                    NFCeCFOP: $prod['NFCeCFOP'] ?? null,
                    NFCeCST: $prod['NFCeCST'] ?? null,
                    NFCeAliqICMS: $prod['NFCeAliqICMS'] ?? null,
                    NFCeCEST: $prod['NFCeCEST'] ?? null,
                    NFCeCSTPIS: $prod['NFCeCSTPIS'] ?? null,
                    NFCeAliqPIS: $prod['NFCeAliqPIS'] ?? null,
                    NFCeCSTCOFINS: $prod['NFCeCSTCOFINS'] ?? null,
                    NFCeAliqCOFINS: $prod['NFCeAliqCOFINS'] ?? null,
                    NFCeCodANP: $prod['NFCeCodANP'] ?? null,
                    NFCeBaseRedICMS: $prod['NFCeBaseRedICMS'] ?? null,
                    NFCeCodBenef: $prod['NFCeCodBenef'] ?? null,
                    NFCeMotBenef: $prod['NFCeMotBenef'] ?? null,
                    SalePrice: $prod['SalePrice'] ?? null,
                );
            }
        } else {
            $prod = $data['Product'] ?? $data;

            $products[] = new ProductItemData(
                ProductID: $prod['ProductID'] ?? null,
                StatusID: $prod['StatusID'] ?? null,
                ProductGroupID: $prod['ProductGroupID'] ?? null,
                ProductTypeID: $prod['ProductTypeID'] ?? null,
                UnitTypeID: $prod['UnitTypeID'] ?? null,
                Name: $prod['Name'] ?? null,
                NameEng: $prod['NameEng'] ?? null,
                InternalCode: $prod['InternalCode'] ?? null,
                BarCode: $prod['BarCode'] ?? null,
                BarCodeJS: $prod['BarCodeJS'] ?? null,
                ImageBase64: $prod['ImageBase64'] ?? null,
                NFCeNCM: $prod['NFCeNCM'] ?? null,
                NFCeCFOP: $prod['NFCeCFOP'] ?? null,
                NFCeCST: $prod['NFCeCST'] ?? null,
                NFCeAliqICMS: $prod['NFCeAliqICMS'] ?? null,
                NFCeCEST: $prod['NFCeCEST'] ?? null,
                NFCeCSTPIS: $prod['NFCeCSTPIS'] ?? null,
                NFCeAliqPIS: $prod['NFCeAliqPIS'] ?? null,
                NFCeCSTCOFINS: $prod['NFCeCSTCOFINS'] ?? null,
                NFCeAliqCOFINS: $prod['NFCeAliqCOFINS'] ?? null,
                NFCeCodANP: $prod['NFCeCodANP'] ?? null,
                NFCeBaseRedICMS: $prod['NFCeBaseRedICMS'] ?? null,
                NFCeCodBenef: $prod['NFCeCodBenef'] ?? null,
                NFCeMotBenef: $prod['NFCeMotBenef'] ?? null,
                SalePrice: $prod['SalePrice'] ?? null,
            );
        }

        return new self(products: $products);
    }
}
