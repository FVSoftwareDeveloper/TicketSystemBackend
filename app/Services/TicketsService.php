<?php

namespace App\Services;

use App\TicketsModel;

use Illuminate\Support\Facades\DB;
use Exception;

class TicketsService{

    /**
     * Method to save ticket information
     * 
     * @param info contains array with all form information to be inserted
     */
    public function saveTicket($info){

        try{

            DB::beginTransaction();

                $add_employee = new TicketsModel();
                $add_employee->ticket_date = $info['ticketDate'];
                $add_employee->subject = $info['subject'];
                $add_employee->ticket_status_id = $info['status'];
                $add_employee->employee_id = $info['employee'];
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
     * 
     * Method to retrieve all tickets information
     * 
     */
    public function getAllTickets(){

        try{

            $get_employees = TicketsModel::
            select('ticket.id', DB::raw("CONCAT(employee.firstname, ' ' ,employee.lastname) as employee_name"),
            DB::raw("TO_CHAR(ticket.ticket_date :: DATE, 'mm/dd/yyyy') as ticket_date") , 'ticket.subject', 
            'ticket.description', 'ticket_status.description as status', 'ticket.employee_id', 'ticket.ticket_status_id')
            ->join('ticket_status', 'ticket.ticket_status_id', '=', 'ticket_status.id')
            ->join('employee', 'ticket.employee_id', '=', 'employee.id')
            ->orderBy('ticket.id')->get();

        } catch(Exception $e){
            return $e->getMessage();
        }
        

        return response()->json( $get_employees );

    }

    /**
     * Method to update tickect information
     * 
     * @param id_ticket contains ticket id specification
     * @param info contains array with all form information
     */
    public function updateTicket($id_ticket, $info){

        try{

            DB::beginTransaction();

                $upd_employee = TicketsModel::where('id', $id_ticket)
                ->update([
                    'ticket_date' => $info['ticketDate'],
                    'subject' => $info['subject'],
                    'ticket_status_id' => $info['status'],
                    'employee_id' => $info['employee'],
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
     * Method to retrieve all tickect information by Id
     * 
     * @param id_ticket contains ticket id specification
     */
    public function getTicketbyId($id_ticket){

        try{

            $get_ticket = TicketsModel::
            select('ticket.id', DB::raw("TO_CHAR(ticket.ticket_date :: DATE, 'mm/dd/yyyy') as ticket_date") , 'ticket.subject', 
            'ticket.description', 'ticket_status.description as status', 'ticket.ticket_status_id')
            ->join('ticket_status', 'ticket.ticket_status_id', '=', 'ticket_status.id')
            ->where('ticket.id', $id_ticket)->first();

        } catch(Exception $e){
            return $e->getMessage();
        }
        

        return response()->json( $get_ticket );

    }


    /**
     * Method to delete ticket information by Id
     * 
     * @param id_ticket contains ticket id specification
     */
    public function deleteTicketById($id_ticket){

        try{

            $get_ticket = TicketsModel::where('id', $id_ticket)->delete();

        } catch(Exception $e){
            return $e->getMessage();
        }
        

        return response()->json( 'OK' );

    }
    
}
