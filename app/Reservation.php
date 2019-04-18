<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    protected $table="reservation";
    public $timestamps = false;
    public function getRoom()
    {
    	return $this->belongsTo('App\Room','idRoom','id');
    }
}
