<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeStatusModel extends Model
{
    //

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employee_status';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'description','active', 'created_at' , 'updated_at'];

    /**
     * Get the employees associated with the state.
     */
    public function employees()
    {
        return $this->hasMany(EmployeesModel::class);
    }
}
