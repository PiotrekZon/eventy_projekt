<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'start', 'end', 'renter', 'event_id','price','payment_status','status'
    ];
   
    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }
}