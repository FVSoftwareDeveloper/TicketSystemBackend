<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketTimesModel extends Model
{
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ticket_time';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'ticket_id','employee_id', 'ticket_time_from', 'ticket_time_to', 'description', 'created_at' , 'updated_at'];
}
