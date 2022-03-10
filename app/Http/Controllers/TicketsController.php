<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TicketsService;

class TicketsController extends Controller
{
    //class propierty to create service instance
    private $service;

    /**
     * 
     * Constructor to handle middleware for JWT and Service Instance
     * 
     */
    public function __construct(TicketsService $service)
    {
        $this->service = $service;
        $this->middleware('auth:api');
    }

    /**
     * 
     * Method to call service that save Ticket Information
     * 
     */
    public function store(Request $request)
    {

        return $this->service->saveTicket($request->all());

    }

    /**
     * 
     * Method to call service that get specific Ticket by Id
     * 
     */
    public function show($id_ticket)
    {

        return $this->service->getTicketbyId($id_ticket);

    }

    /**
     * 
     * Method to call service that get all Tickets
     * 
     */
    public function getAll()
    {

        return $this->service->getAllTickets();

    }

    /**
     * 
     * Method to call service that update Tickect Information
     * 
     */
    public function update($id_ticket, Request $request)
    {

        return $this->service->updateTicket($id_ticket, $request->all());

    }


    /**
     * 
     * Method to call service that delete specific Ticket information
     * 
     */
    public function destroy($id_ticket)
    {

        return $this->service->deleteTicketById($id_ticket);

    }
}
