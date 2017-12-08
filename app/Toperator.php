<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toperator extends Model
{
	public $timestamps = false;

    public function tours()
    {
    	$this->hasMany('App\Tour');
    }
}
