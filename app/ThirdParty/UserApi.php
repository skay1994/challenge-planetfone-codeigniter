<?php

namespace App\ThirdParty;

use CodeIgniter\HTTP\CURLRequest;
use Config\Services;
use Exception;

final class UserApi
{
    protected CURLRequest $client;

    public function __construct()
    {
        $this->client = Services::curlrequest(['baseURI' => 'https://jsonplaceholder.typicode.com']);
    }
    public function getAll($limit = 5): array
    {
        try {
            $response = $this->client->get('users', [
                'query' => [ '_limit' => $limit ]
            ]);
            $body = json_decode($response->getBody());
            usort($body, fn ($a, $b) => strcmp($a->name, $b->name));
            return array_map([$this, 'parseResult'], $body);
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    private function parseResult(object $item): array
    {
        return [
            'id' => $item->id,
            'name' => $item->name,
            'username' => $item->username,
            'email' => $item->email,
        ];
    }
}