<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
	protected $table = 'cats';
	
    public function products(){
		return $this->hasMany('App\Product');
	}
	
	public function SubCat(){
		return $this->hasMany('App\SubCat');
	}
}
