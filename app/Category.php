<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
  public function getBannerUrl() {
    $file = DB::table('media')->whereModelType('App\Category')->whereCollectionName('banner')->whereModelId($this->id)->get();
    return asset('storage/'.$file[0]->order_column.'/'.$file[0]->file_name);
  }

  public function getDefaultImageUrl() {
    $file = DB::table('media')->whereModelType('App\Category')->whereCollectionName('default_image')->whereModelId($this->id)->get();
    return asset('storage/'.$file[0]->order_column.'/'.$file[0]->file_name);
    
  }


    public function products()
    {
    	return $this->hasMany(Product::class);
    }
}
