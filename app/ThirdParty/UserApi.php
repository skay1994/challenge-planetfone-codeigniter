<?php

namespace App\ThirdParty;

use CodeIgniter\HTTP\CURLRequest;
use Config\Services;

final class UserApi
{
    protected CURLRequest $client;

    public function __construct()
    {
        $this->client = Services::curlrequest(['baseURI' => 'https://jsonplaceholder.typicode.com']);
    }
}