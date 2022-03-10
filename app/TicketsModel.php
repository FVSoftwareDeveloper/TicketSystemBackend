<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketsModel extends Model
{
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ticket';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'ticket_date','subject', 'ticket_status_id', 'employee_id', 'description', 'created_at' , 'updated_at'];


    /**
     * Get the status associated with the Ticket.
     */
    public function status()
    {
        return $this->hasOne(TicketStatusModel::class);
    }

    /**
     * Get the tickets associated with the ticket times.
     */
    public function ticketTimes()
    {
        return $this->hasMany(TicketTimesModel::class);
    }
}
