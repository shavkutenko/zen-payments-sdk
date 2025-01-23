<?php

declare(strict_types=1);

namespace Infrastructure\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Infrastructure\Config\ConfigManager;
use Infrastructure\Exceptions\ApiRequestException;

class ApiClient
{
    private Client $httpClient;
    private string $baseUrl;
    private string $apiKey;

    public function __construct(ConfigManager $configManager)
    {
        $this->httpClient = new Client();
        $this->baseUrl = $configManager->get('BASE_URL');
        $this->apiKey = $configManager->get('API_KEY');
    }

    /**
     * @throws ApiRequestException
     */
    public function request(string $method, string $endpoint, array $data = []): array
    {
        try {
            $response = $this->httpClient->request($method, $this->baseUrl . $endpoint, [
                'json' => $data,
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                ],
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            throw new ApiRequestException('API request failed: ' . $e->getMessage());
        }
    }
}
