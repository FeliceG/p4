<?php

namespace p4;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
	public function research() {
	   return $this->belongsTo('\p4\Research');
	}
}
