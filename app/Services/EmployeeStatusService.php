<?php

namespace App\Services;

use App\EmployeeStatusModel;
use Exception;

class EmployeeStatusService{

    /**
     * 
     * Method to retrieve employee status information
     * 
     */
    public function getAllActive(){

        try{

            $employee_status_list = EmployeeStatusModel::where('active', true)->get();

        } catch(Exception $e){

            return $e->getMessage();

        }        

        return response()->json( $employee_status_list );

    }
    
}
