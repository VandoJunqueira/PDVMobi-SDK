<?php

declare(strict_types=1);

namespace PDVMobi;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\Response;

class ApiConnection
{
    protected string $baseUrl;
    protected ?string $token = null;
    protected ?string $subscriptionKey;

    public function __construct()
    {
        $this->baseUrl = env('PDV_MOBI_BASE_URL');
        $this->subscriptionKey = env('PDV_MOBI_SUBSCRIPTION_KEY');
    }

    public function setAuthorization(string $token)
    {
        $this->token = $token;
    }

    protected function getHeaders(): array
    {
        $headers = [
            'Accept' => 'application/json',
            'Ocp-Apim-Subscription-Key' => $this->subscriptionKey,
        ];

        if (!is_null($this->token)) {
            $headers['Authorization'] = 'Bearer ' . $this->token;
        }

        return $headers;
    }

    public function get(string $endpoint, array $queryParams = []): Response|array
    {
        $url = rtrim($this->baseUrl, '/') . '/' . ltrim($endpoint, '/');

        try {
            $response = Http::withHeaders($this->getHeaders())
                ->get($url, $queryParams);

            $response->throw();

            return $response->json();
        } catch (RequestException $e) {
            return $this->handleException($e);
        }
    }

    public function post(string $endpoint, array $data = [], bool $asForm = false): Response|array
    {
        $url = rtrim($this->baseUrl, '/') . '/' . ltrim($endpoint, '/');

        try {
            $request = Http::withHeaders($this->getHeaders());


            $response = $asForm
                ? $request->asForm()->post($url, $data)
                : $request->post($url, $data);

            $response->throw();

            return $response->json();
        } catch (RequestException $e) {
            return $this->handleException($e);
        }
    }

    protected function handleException(RequestException $e): array
    {
        return [
            'error' => true,
            'message' => $e->getMessage(),
            'status' => $e->response ? $e->response->status() : 500,
            'body' => $e->response ? $e->response->json() : null,
        ];
    }
}
