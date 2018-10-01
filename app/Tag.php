<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Tag
 *
 * @package App
 * @property string $tag
*/
class Tag extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['tag'];
    

    public static function storeValidation($request)
    {
        return [
            'tag' => 'max:191|required|unique:tags,tag',
            'products' => 'array|nullable',
            'products.*' => 'integer|exists:products,id|max:4294967295|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'tag' => 'max:191|required|unique:tags,tag,'.$request->route('tag'),
            'products' => 'array|nullable',
            'products.*' => 'integer|exists:products,id|max:4294967295|nullable'
        ];
    }

    

    
    
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_tag')->withTrashed();
    }
    
    
}
