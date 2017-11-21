<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCat extends Model
{
	protected $table = 'sub_cats';
    public function Cat(){
		return $this->belongsTo('App\Cat');
	}
}
