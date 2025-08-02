<?php

namespace PDVMobi\dtos;

 

class NFCeResponseData extends BaseDTO
{
    public function __construct(
        public readonly string $SalePosCodeID,
        public readonly ?NFCeData $NFCe = null,
        public readonly ?NFCeCanceladaData $NFCeCancelada = null,
    ) {}

    public static function fromArray(array $data): self
    {
        $payload = $data['data'] ?? [];

        return new self(
            SalePosCodeID: $payload['SalePosCodeID'] ?? '',
            NFCe: isset($payload['NFCe']) ? new NFCeData(
                tipo_ambiente: $payload['NFCe']['tipo_ambiente'] ?? '',
                accesskey: $payload['NFCe']['accesskey'] ?? '',
                digval: $payload['NFCe']['digval'] ?? '',
                nprot: $payload['NFCe']['nprot'] ?? '',
                dhrecbto: $payload['NFCe']['dhrecbto'] ?? '',
                qrCode: $payload['NFCe']['qrCode'] ?? '',
                urlSefazConsumer: $payload['NFCe']['urlSefazConsumer'] ?? '',
                numnf: $payload['NFCe']['numnf'] ?? '',
                serienf: $payload['NFCe']['serienf'] ?? '',
                tributo: $payload['NFCe']['tributo'] ?? '',
                tributoEst: $payload['NFCe']['tributoEst'] ?? '',
                tributoFed: $payload['NFCe']['tributoFed'] ?? '',
                msgTributo: $payload['NFCe']['msgTributo'] ?? '',
                NFCE_ID: $payload['NFCe']['NFCE_ID'] ?? '',
                outros: $payload['NFCe']['outros'] ?? '',
            ) : null,
            NFCeCancelada: isset($payload['NFCeCancelada']) ? new NFCeCanceladaData(
                tipo_ambiente: $payload['NFCeCancelada']['tipo_ambiente'] ?? '',
                accesskey: $payload['NFCeCancelada']['accesskey'] ?? '',
                protCancelamento: $payload['NFCeCancelada']['protCancelamento'] ?? '',
                dhCancelamento: $payload['NFCeCancelada']['dhCancelamento'] ?? '',
                numnf: $payload['NFCeCancelada']['numnf'] ?? '',
                serienf: $payload['NFCeCancelada']['serienf'] ?? '',
            ) : null,
        );
    }

    public function toArray(): array
    {
        return [
            'SalePosCodeID' => $this->SalePosCodeID,
            'NFCe' => $this->NFCe?->toArray(),
            'NFCeCancelada' => $this->NFCeCancelada?->toArray(),
        ];
    }
}
