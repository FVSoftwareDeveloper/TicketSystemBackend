<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeesModel extends Model
{
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employee';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'firstname','lastname', 'email', 'employee_status_id', 'password', 'confirm_password', 'created_at' , 'updated_at'];


    /**
     * Get the status associated with the employee.
     */
    public function status()
    {
        return $this->hasOne(EmployeeStatusModel::class);
    }
}
