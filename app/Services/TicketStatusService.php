<?php

namespace App\Services;

use App\TicketStatusModel;
use Exception;

class TicketStatusService{

    /**
     * 
     * Method to retrieve active ticket status information
     * 
     */
    public function getAllActive(){

        try{

            $ticket_status_list = TicketStatusModel::where('active', true)->get();

        } catch(Exception $e){

            return $e->getMessage();

        }        

        return response()->json( $ticket_status_list );

    }
    
}
