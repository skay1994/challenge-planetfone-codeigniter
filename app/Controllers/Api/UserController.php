<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\ThirdParty\UserApi;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    private UserApi $api;

    public function __construct()
    {
        $this->api = new UserApi();
    }

    public function index(): ResponseInterface
    {
        $limit = $this->request->getGet('limit') ?? 5;
        return $this->response->setJSON($this->api->getAll($limit));
    }
}