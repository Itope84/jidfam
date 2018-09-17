<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->take(3)->get();
        foreach ($categories as $category) {
            $category['products'] = $category->products->sortByDesc('updated_at')->take(2)->values()->all();
        }
        $products = Product::latest()->take(9)->get();
        // dd($categories);
        return view('home', compact('categories', 'products'));
    }
}
