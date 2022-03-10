<?php

namespace App\Services;

use App\TicketTimesModel;
use Illuminate\Support\Facades\DB;
use Exception;
use DateTime;

class TicketTimesService{

    /**
     * Method to save ticket time information
     * 
     * @param info contains array with all form information
     */
    public function saveTicketTime($info){

        try{

            DB::beginTransaction();

                $add_employee = new TicketTimesModel();
                $add_employee->ticket_id = $info['tickeId'];
                $add_employee->employee_id = $info['employee'];
                $add_employee->ticket_time_from = $info['from'];
                $add_employee->ticket_time_to = $info['to'];
                $add_employee->description = $info['reason'];
                $add_employee->save();
            
            DB::commit();

        } catch(Exception $e){

            DB::rollBack();
            return $e->getMessage();

        }        

        return response()->json( 'OK' );

    }


    /**
     * Method to retrieve all ticket time information by Id
     * 
     * @param id_ticket contains ticket id specification
     */
    public function getTicketTimeByTicketId($id_ticket){

        try{

            $get_ticket = TicketTimesModel::
            select('ticket_time.id', DB::raw("CONCAT(employee.firstname, ' ' ,employee.lastname) as employee_name"),
            DB::raw("TO_CHAR(ticket_time.ticket_time_from :: DATE, 'mm/dd/yyyy') as ticket_time_from") ,
            DB::raw("TO_CHAR(ticket_time.ticket_time_to :: DATE, 'mm/dd/yyyy') as ticket_time_to") ,
            'ticket_time.description', 'employee.id as employee_id', 'ticket_time.ticket_id')
            ->join('employee', 'ticket_time.employee_id', '=', 'employee.id')
            ->where('ticket_id', $id_ticket)
            ->orderBy('ticket_time.id')->get();

        } catch(Exception $e){
            return $e->getMessage();
        }
        

        return response()->json( $get_ticket );

    }


    /**
     * Method to retrieve all employees with ticket time information
     * 
     * @param id_ticket contains ticket id specification
     */
    public function getTicketTimeEmployeesByTicketId($id_ticket){

        try{

            $get_ticket = TicketTimesModel::
            select('ticket_time.id', 'employee.firstname',  'employee.lastname', 'employee.email')
            ->join('employee', 'ticket_time.employee_id', '=', 'employee.id')
            ->where('ticket_id', $id_ticket)
            ->orderBy('ticket_time.id')->get();

        } catch(Exception $e){
            return $e->getMessage();
        }
        

        return response()->json( $get_ticket );

    }
    
    /**
     * Method to update ticket time information
     * 
     * @param idTicketTime contains ticket id specification
     * @param info contains array with all form information
     */
    public function updateTicketTime($idTicketTime, $info){

        try{

            DB::beginTransaction();

                $upd_employee = TicketTimesModel::where('id', $idTicketTime)
                ->update([
                    'employee_id' => $info['employee'],
                    'ticket_time_from' => $info['from'],
                    'ticket_time_to' => $info['to'],
                    'description' => $info['reason']
                ]);
            
            DB::commit();

        } catch(Exception $e){

            DB::rollBack();
            return $e->getMessage();

        }        

        return response()->json( 'OK' );

    }

    /**
     * Method to delete specific ticket time information information
     * 
     * @param idTicketTime contains ticket id specification
     */
    public function deleteTicketTimeById($idTicketTime){

        try{

            $del_employees = TicketTimesModel::where('id', $idTicketTime)->delete();            

        } catch(Exception $e){
            return $e->getMessage();
        }

        return response()->json( 'OK' );        

    }


    /**
     * Method to retrieve all ticket time information
     * 
     * @param info contains date range to filter information
     */
    public function getAllTicketTime($from, $to){

        
        try{

            $get_ticket = TicketTimesModel::
            select('ticket_time.id', DB::raw("CONCAT(employee.firstname, ' ' ,employee.lastname) as employee_name"),
            DB::raw("TO_CHAR(ticket_time.ticket_time_from :: DATE, 'mm/dd/yyyy') as ticket_time_from") ,
            DB::raw("TO_CHAR(ticket_time.ticket_time_to :: DATE, 'mm/dd/yyyy') as ticket_time_to") ,
            'ticket_time.description', 'employee.id as employee_id', 'ticket_time.ticket_id', 'ticket.subject',
            DB::raw("EXTRACT(EPOCH FROM (ticket_time_to - ticket_time_from)* interval '1 day') AS hours"))
            ->join('employee', 'ticket_time.employee_id', '=', 'employee.id')
            ->join('ticket', 'ticket.employee_id', '=', 'ticket_time.ticket_id')
            ->where('ticket_time.ticket_time_from', '>=', $from)
            ->where('ticket_time.ticket_time_to', '<=', $to)
            ->orderBy('ticket_time.id')->get();

        } catch(Exception $e){
            return $e->getMessage();
        }
        

        return response()->json( $get_ticket );

    }
}
