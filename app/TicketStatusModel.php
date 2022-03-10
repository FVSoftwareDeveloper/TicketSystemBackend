<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketStatusModel extends Model
{
    //

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ticket_status';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'description','active', 'created_at' , 'updated_at'];

    /**
     * Get the tickets associated with the state.
     */
    public function tickets()
    {
        return $this->hasMany(TicketsModel::class);
    }
}
