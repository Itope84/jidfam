<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * City has many Users.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = city_id, localKey = id)
    	return $this->hasMany(User::class);
    }

    /**
     * City has many Orders.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = city_id, localKey = id)
    	return $this->hasMany(Order::class);
    }
}
