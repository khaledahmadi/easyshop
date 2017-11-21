<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = 'products';
    public function orders(){
		return $this->belongsToMany('App\Order');
	}
	
	public function cats(){
		return $this->belongsTo('App\Cat');
	}
	public function brand(){
		return $this->belongsTo('App\Brand');
	}
	
}
