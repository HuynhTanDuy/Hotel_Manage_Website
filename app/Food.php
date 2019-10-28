<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Food extends Model
{
    //
    protected $table="food";
    public $timestamps = false;

    public function GetById($id)
    {
    	$query="SELECT * FROM Food WHERE id=". $id;
    	$data=DB::select(DB::raw($query));
    	return $data;
    }
    
}
