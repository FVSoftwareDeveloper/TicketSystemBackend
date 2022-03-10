<?php

namespace App\Http\Controllers;

use App\Services\EmployeeStatusService;

class EmployeeStatusController extends Controller
{
    //class propierty to create service instance
    private $service;

    /**
     * 
     * Constructor to handle middleware for JWT and Service Instance
     * 
     */
    public function __construct(EmployeeStatusService $service)
    {
        $this->service = $service;
        $this->middleware('auth:api');
    }

    /**
     * 
     * Method to call service that return All active Employee Status
     * 
     */
    public function getAllActive()
    {

        return $this->service->getAllActive();

    }
}
