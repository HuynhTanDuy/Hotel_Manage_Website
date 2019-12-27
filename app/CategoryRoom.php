<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryRoom extends Model
{
    //
    protected $table="category_room";
    public $timestamps = false;
    public function getRoom()
    {
    	return $this->hasMany('App\Room','idCategory','id');
    }
}
