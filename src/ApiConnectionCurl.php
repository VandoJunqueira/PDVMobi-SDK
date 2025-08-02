<?php

declare(strict_types=1);

namespace PDVMobi;

class ApiConnectionCurl
{
    protected string $baseUrl;
    protected ?string $token = null;
    protected ?string $subscriptionKey;

    public function __construct(string $baseUrl, ?string $subscriptionKey = null)
    {
        $this->baseUrl = rtrim($baseUrl, '/');
        $this->subscriptionKey = $subscriptionKey;
    }

    public function setAuthorization(string $token): void
    {
        $this->token = $token;
    }

    protected function getHeaders(): array
    {
        $headers = [
            'Accept: application/json',
        ];

        if ($this->subscriptionKey !== null) {
            $headers[] = 'Ocp-Apim-Subscription-Key: ' . $this->subscriptionKey;
        }

        if ($this->token !== null) {
            $headers[] = 'Authorization: Bearer ' . $this->token;
        }

        return $headers;
    }

    public function get(string $endpoint, array $queryParams = []): array
    {
        $url = $this->baseUrl . '/' . ltrim($endpoint, '/');

        if (!empty($queryParams)) {
            $url .= '?' . http_build_query($queryParams);
        }

        return $this->request('GET', $url);
    }

    public function post(string $endpoint, array $data = [], bool $asForm = false): array
    {
        $url = $this->baseUrl . '/' . ltrim($endpoint, '/');

        return $this->request('POST', $url, $data, $asForm);
    }

    protected function request(string $method, string $url, array $data = [], bool $asForm = false): array
    {
        $curl = curl_init();

        $headers = $this->getHeaders();

        if ($method === 'POST') {
            curl_setopt($curl, CURLOPT_POST, true);

            if ($asForm) {
                $headers[] = 'Content-Type: application/x-www-form-urlencoded';
                $postData = http_build_query($data);
            } else {
                $headers[] = 'Content-Type: application/json';
                $postData = json_encode($data);
            }

            curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
        }

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_FAILONERROR => false,
            CURLOPT_CUSTOMREQUEST => $method,
        ]);

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);

        if (curl_errno($curl)) {
            $errorMsg = curl_error($curl);
            curl_close($curl);

            return [
                'error' => true,
                'message' => $errorMsg,
                'status' => 0,
                'body' => null,
            ];
        }

        curl_close($curl);

        $decoded = json_decode($response, true);

        if ($httpCode >= 200 && $httpCode < 300) {
            return $decoded !== null ? $decoded : ['raw' => $response];
        }

        return [
            'error' => true,
            'message' => "HTTP Error: $httpCode",
            'status' => $httpCode,
            'body' => $decoded,
        ];
    }
}
