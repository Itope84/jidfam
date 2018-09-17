<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	use SoftDeletes;

	/**
	 * Product has many Orders.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function orders()
	{
		// hasMany(RelatedModel, foreignKeyOnRelatedModel = product_id, localKey = id)
		return $this->hasMany(OrderItem::class);
	}

	public function tags()
	{
		return $this->belongsToMany(Tag::class, 'product_tags');
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	/**
	 * Product has many Images.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function images()
	{
		return $this->hasMany(ProductImage::class);
	}
    
}
