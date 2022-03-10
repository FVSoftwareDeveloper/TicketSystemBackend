<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    //class propierty to create service instance
    private $service;

    /**
     * 
     * Constructor to handle middleware for JWT and Service Instance
     * 
     */
    public function __construct(UserService $service)
    {
        $this->service = $service;
        $this->middleware('auth:api');
    }

     
}
