<?php

namespace App\Services;

use App\EmployeesModel;

use Illuminate\Support\Facades\DB;
use Exception;

class EmployeesService{

    /**
     * Method to save employee information
     * 
     * @param info contains array with all form information
     */
    public function saveEmployee($info){

        try{

            DB::beginTransaction();

                $add_employee = new EmployeesModel();
                $add_employee->firstname = $info['firstName'];
                $add_employee->lastname = $info['lastName'];
                $add_employee->email = $info['email'];
                $add_employee->employee_status_id = $info['status'];
                $add_employee->password = $info['password'];
                $add_employee->confirm_password = $info['password_confirm'];
                $add_employee->save();
            
            DB::commit();

        } catch(Exception $e){

            DB::rollBack();
            return $e->getMessage();

        }        

        return response()->json( 'OK' );

    }

    /**
     * Method to retrieve all employees information
     * 
     * @param id_employee contains employee id specification
     */
    public function getAllEmployees($id_employee = ''){

        try{

            $get_employees = EmployeesModel::
            select('employee.id', 'employee.firstname', 'employee.lastname', 'employee.email', 'employee_status.description as status'
            , 'employee.password', 'employee.confirm_password', 'employee.employee_status_id', 
            DB::raw("TO_CHAR(employee.created_at, 'mm/dd/yyyy') as created_at"))
            ->join('employee_status', 'employee.employee_status_id', '=', 'employee_status.id')
            ->orderBy('employee.id')->get();            

        } catch(Exception $e){
            return $e->getMessage();
        }

        return response()->json( $get_employees );        

    }

    /**
     * Method to update employee information
     * 
     * @param id_employee contains employee id specification
     * @param info contains array with all form information to be update
     */
    public function updateEmployee($id_employee, $info){

        try{

            DB::beginTransaction();

                $upd_employee = EmployeesModel::where('id', $id_employee)
                ->update([
                    'firstname' => $info['firstName'],
                    'lastname' => $info['lastName'],
                    'email' => $info['email'],
                    'employee_status_id' => $info['status'],
                    'password' => $info['password'],
                    'confirm_password' => $info['password_confirm']
                ]);
            
            DB::commit();

        } catch(Exception $e){

            DB::rollBack();
            return $e->getMessage();

        }        

        return response()->json( 'OK' );

    }


    /**
     * Method to retrieve employees information by Id
     * 
     * @param id_employee contains employee id specification
     */
    public function getEmployeeById($id_employee){

        try{

            $get_employees = EmployeesModel::where('id', $id_employee)->first();            

        } catch(Exception $e){
            return $e->getMessage();
        }

        return response()->json( $get_employees );        

    }


    /**
     * Method to delete specific employees information
     * 
     * @param id_employee contains employee id specification
     */
    public function deleteEmployeeById($id_employee){

        try{

            $del_employees = EmployeesModel::where('id', $id_employee)->delete();            

        } catch(Exception $e){
            return $e->getMessage();
        }

        return response()->json( 'OK' );        

    }
    
}
