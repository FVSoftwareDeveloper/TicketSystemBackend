<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TicketTimesService;

class TicketTimesController extends Controller
{
    //class propierty to create service instance
    private $service;

    /**
     * 
     * Constructor to handle middleware for JWT and Service Instance
     * 
     */
    public function __construct(TicketTimesService $service)
    {
        $this->service = $service;
        $this->middleware('auth:api');
    }

    /**
     * 
     * Method to call service that save Ticket Time
     * 
     */
    public function store(Request $request)
    {

        return $this->service->saveTicketTime($request->all());

    }

    /**
     * 
     * Method to call service that get specific Ticket Time by Id
     * 
     */
    public function show($id_ticket)
    {

        return $this->service->getTicketTimeByTicketId($id_ticket);

    }

    /**
     * 
     * Method to call service that get all Ticket Time Employees asigned by Ticket Id
     * 
     */
    public function getTicketTimeEmployeesByTicketId($id_ticket)
    {

        return $this->service->getTicketTimeEmployeesByTicketId($id_ticket);

    }

    /**
     * 
     * Method to call service that update Ticket Times Information
     * 
     */
    public function update($idTicketTime, Request $request)
    {

        return $this->service->updateTicketTime($idTicketTime, $request->all());

    }


    /**
     * 
     * Method to call service that delete Ticket Time Information
     * 
     */
    public function destroy($idTicketTime)
    {

        return $this->service->deleteTicketTimeById($idTicketTime);

    }


    /**
     * Method to call service that get all Ticket Times
     * 
     * @param request contains date range to filter report
     */
    public function getAll($from, $to)
    {

        return $this->service->getAllTicketTime($from, $to);

    }
}
