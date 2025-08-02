<?php

namespace PDVMobi\dtos;

 

class PedidoData extends BaseDTO
{
    /**
     * @param PedidoItemData[] $Itens
     */
    public function __construct(
        public readonly string $NumSerialPOS,
        public readonly string $IDCobranca,
        public readonly string $IDPagamento, // 1 - Débito | 2 - Crédito | 3 - PIX
        public readonly array $Itens,
        public readonly string $QTParcelas = '1',
        public readonly ?PedidoExtraData $Extras = null,
        public readonly int $typeREQ = 1,
        public readonly ?string $action = null, // delete
    ) {}

    public static function fromArray(array $data): self
    {
        $extras = new PedidoExtraData(
            CPF: $data['Extras']['CPF'] ?? '',
            Nome: $data['Extras']['Nome'] ?? ''
        );

        $itens = array_map(
            fn(array $item) => new PedidoItemData(
                ProductID: $item['ProductID'] ?? '',
                Quantity: $item['Quantity'] ?? '0',
                price: $item['price'] ?? '0.00'
            ),
            $data['Itens'] ?? []
        );

        return new self(
            NumSerialPOS: $data['NumSerialPOS'] ?? '',
            IDCobranca: $data['IDCobranca'] ?? '',
            IDPagamento: $data['IDPagamento'] ?? '',
            QTParcelas: $data['QTParcelas'] ?? '1',
            Extras: $extras,
            Itens: $itens,
            typeREQ: $data['typeREQ'] ?? 1
        );
    }

    public function toArray(): array
    {
        return [
            'NumSerialPOS' => $this->NumSerialPOS,
            'IDCobranca' => $this->IDCobranca,
            'IDPagamento' => $this->IDPagamento,
            'QTParcelas' => $this->QTParcelas,
            'Extras' =>  $this->Extras ? $this->Extras->toArray() : null,
            'Itens' => array_map(fn(PedidoItemData $item) => $item->toArray(), $this->Itens),
            'typeREQ' => $this->typeREQ,
        ];
    }
}
