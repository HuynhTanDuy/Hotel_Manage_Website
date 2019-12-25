<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CategoryRoom;

class Room extends Model
{
    //
    protected $table="room";
   
    public $timestamps = false;

    public function categoryRoom()
    {
    	return $this->belongsTo('App\CategoryRoom','idCategory');
    }
}
