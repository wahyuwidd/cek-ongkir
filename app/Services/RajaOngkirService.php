<?php

namespace App\Services;

use GuzzleHttp\Client;

class RajaOngkirService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => env('RAJAONGKIR_BASE_URL'),
            'headers' => [
                'key' => env('RAJAONGKIR_API_KEY'),
                'Content-Type' => 'application/json'
            ]
        ]);
    }

    public function getProvinces()
    {
        $response = $this->client->get('province');
        return json_decode($response->getBody()->getContents(), true);
    }

    public function getCities($provinceId)
    {
        $response = $this->client->get('city', [
            'query' => ['province' => $provinceId]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function checkOngkir($origin, $destination, $weight, $courier)
    {
        $response = $this->client->post('cost', [
            'form_params' => [
                'origin' => $origin,
                'destination' => $destination,
                'weight' => $weight,
                'courier' => $courier,
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }
}
