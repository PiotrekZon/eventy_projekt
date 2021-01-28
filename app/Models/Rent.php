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
    
protected $table = 'rents';
    
    protected $fillable = [
        'id','event_id','price','payment_status','status','created_at','updated_at','place_num','user_id','user_name','event'
    ];
   
    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }
}