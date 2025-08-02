<?php

namespace PDVMobi\dtos;

 

class PersonalCardsData extends BaseDTO
{
    /**
     * @var PersonalCardItemData[]
     */
    public readonly array $personalCards;

    public function __construct(array $personalCards)
    {
        $this->personalCards = $personalCards;
    }

    public function toArray(): array
    {
        return array_map(function (PersonalCardItemData $card) {
            return ['personalCards' => $card->toArray()];
        }, $this->personalCards);
    }

    public static function fromArray(array $data): self
    {
        $cards = [];

        if (isset($data[0]) && is_array($data[0])) {
            foreach ($data as $item) {
                $card = $item['personalCards'] ?? $item;
                $cards[] = new PersonalCardItemData(
                    personalCardsID: $card['personalCardsID'] ?? '',
                    cardNumber: $card['cardNumber'] ?? '',
                    tipoConsumo: $card['tipoConsumo'] ?? '0',
                    qtConsumo: $card['qtConsumo'] ?? '0',
                    valConsumoM: $card['valConsumoM'] ?? '0.00',
                    valConsumoU: $card['valConsumoU'] ?? '0.00',
                    namePerson: $card['namePerson'] ?? '',
                    cpfperson: $card['cpfperson'] ?? '',
                );
            }
        } else {
            $card = $data['personalCards'] ?? $data;
            $cards[] = new PersonalCardItemData(
                personalCardsID: $card['personalCardsID'] ?? '',
                cardNumber: $card['cardNumber'] ?? '',
                tipoConsumo: $card['tipoConsumo'] ?? '0',
                qtConsumo: $card['qtConsumo'] ?? '0',
                valConsumoM: $card['valConsumoM'] ?? '0.00',
                valConsumoU: $card['valConsumoU'] ?? '0.00',
                namePerson: $card['namePerson'] ?? '',
                cpfperson: $card['cpfperson'] ?? '',
            );
        }

        return new self(personalCards: $cards);
    }
}
