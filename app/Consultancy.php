<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consultancy extends Model
{
	use SoftDeletes;
    
    public function messages()
    {
    	
    	return $this->hasMany(Message::class);
    }

    // the user requesting a consultancy
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
