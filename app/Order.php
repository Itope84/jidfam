<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    
    public function items()
    {
        // not using manyToMany because we have to specify quantiti=y of each product ordered.
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = order_id, localKey = id)
    	return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
    	// belongsTo(RelatedModel, foreignKey = user_id, keyOnRelatedModel = id)
    	return $this->belongsTo(User::class);
    }

    /**
     * Order belongs to City.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        // belongsTo(RelatedModel, foreignKey = city_id, keyOnRelatedModel = id)
        return $this->belongsTo(City::class);
    }
}
