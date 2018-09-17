<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
	use SoftDeletes;
    /**
     * OrderItem belongs to Order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
    	// belongsTo(RelatedModel, foreignKey = order_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Order::class);
    }

    /**
     * OrderItem belongs to Product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
    	return $this->belongsTo(Product::class);
    }

}
