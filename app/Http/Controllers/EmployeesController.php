<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EmployeesService;

class EmployeesController extends Controller
{
    //class propierty to create service instance
    private $service;

    /**
     * 
     * Constructor to handle middleware for JWT and Service Instance
     * 
     */
    public function __construct(EmployeesService $service)
    {
        $this->service = $service;
        $this->middleware('auth:api');
    }

    /**
     * 
     * Method to call service that save Employee Information
     * 
     */
    public function store(Request $request)
    {

        return $this->service->saveEmployee($request->all());

    }

    /**
     * 
     * Method to call service that get specific Employee by Id
     * 
     */
    public function show($id_employee)
    {

        return $this->service->getEmployeeById($id_employee);

    }

    /**
     * 
     * Method to call service that get all Employee active
     * 
     */
    public function getAllActive($id_employee = '')
    {

        return $this->service->getAllEmployees($id_employee = '');

    }

    /**
     * 
     * Method to call service that update Employee information
     * 
     */
    public function update($id_employee, Request $request)
    {

        return $this->service->updateEmployee($id_employee, $request->all());

    }


    /**
     * 
     * Method to call service that delete specific Employee by Id
     * 
     */
    public function destroy($id_employee)
    {

        return $this->service->deleteEmployeeById($id_employee);

    }
}
