<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\ThirdParty\UserApi;

class UserController extends BaseController
{
    private UserApi $api;

    public function __construct()
    {
        $this->api = new UserApi();
    }
}