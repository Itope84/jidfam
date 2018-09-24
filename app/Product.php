<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
	use SoftDeletes;

	/**
	 * Product has many Orders.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */



    /**
     * @return string
     */
    public function getImagesUrl()
    {
        
		    $files = DB::table('media')->whereModelType('App\Product')->whereCollectionName('images')->whereModelId($this->id)->get();
		    foreach ($files as $file) {
		    	$file->url = asset('storage/'.$file->order_column.'/'.$file->file_name);
		    }
		    return $files;
		    
    }


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
