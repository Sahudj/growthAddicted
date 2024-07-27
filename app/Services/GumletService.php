<?php 
namespace App\Services;

use GuzzleHttp\Client;

class GumletService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('GUMLET_API_KEY');
    }

    public function getAssetDetails($assetId)
    {
        $response = $this->client->request('GET', "https://api.gumlet.io/v1/assets/{$assetId}", [
            'headers' => [
                'Authorization' => "Bearer gumlet_a89bf0b76faf81d09cdc03692effc38f",
                'accept' => 'application/json',
            ],
        ]);

        return json_decode($response->getBody(), true);
    }
}

?>