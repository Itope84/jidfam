<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return new ProductCollection(Product::select('name', 'description')->paginate(120));
        $products = Product::paginate(18);
        $categories = Category::all();
        $active = 'products';
        return view('products', compact('products', 'categories', 'active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // ProductResource::withoutWrapping();
        // return new ProductResource($product);
        
        $similar_products = [];
        
        foreach ($product->category->products as $prod) {
            if ($prod->id != $product->id) {
                $similar_products[$prod->id] = $prod;
            }
            
        }


        foreach ($product->tags as $tag) {
            foreach ($tag->products as $prod) {
                if ($prod->id != $product->id) {
                    $similar_products[$prod->id] = $prod;
                }
            }
        }
        
        // dd($similar_products);
        
        return view('products.single', compact('product', 'similar_products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
