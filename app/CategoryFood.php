<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryFood extends Model
{
    //
    protected $table="category_food";
    public function getFood()
    {
    	return $this->hasMany('App\Food','idCategory','id');
    }
}
