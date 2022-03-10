<?php

namespace App\Http\Controllers;

use App\Services\TicketStatusService;

class TicketStatusController extends Controller
{
    //class propierty to create service instance
    private $service;

    /**
     * 
     * Constructor to handle middleware for JWT and Service Instance
     * 
     */
    public function __construct(TicketStatusService $service)
    {
        $this->service = $service;
        $this->middleware('auth:api');
    }

    /**
     * 
     * Method to call service that return All Active Ticket Status
     * 
     */
    public function getAllActive()
    {

        return $this->service->getAllActive();

    }
}
