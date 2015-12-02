<?php

namespace p4;

use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    //

	public function user() {
		return $this->belongsTo('\p4\User');
	}

	public function author() {
	   return $this->hasMany('\p4\Author');
	}
}
