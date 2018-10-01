<?php

namespace App\Http\Controllers;

use Auth;
use App\Order;
use App\OrderItem;
use App\Product;
use App\Http\Resources\CartResource;
use Illuminate\Http\Request;

class CartController extends Controller
{

  public function __construct() {
    $this->middleware('auth');
  }

    public function index () {
      $cart = Auth::user()->orders->where('is_paid', 0)->first();
      CartResource::withoutWrapping();
      if ($cart == null) {
        return json_encode(null);
      }
      // dd($cart->with('items')->get());
      return new CartResource($cart);
    }

    public function show () {
      $cart = Auth::user()->orders->where('is_paid', 0)->first();
      $recent_products = Product::latest()->take(10)->get();
      return view('cart', compact('cart', 'recent_products'));
    }

    public function update (Request $request) {
      $cart = Auth::user()->orders->where('is_paid', 0)->first();

      if ($cart == null) {
        $cart = new Order;
        $prev = Order::latest()->first() ? Order::latest()->first()->id : 0;
        $cart->unique_id = substr(date('m'), 0, 1).date('d').'-'.str_pad($prev, 5, '0', STR_PAD_LEFT).'placeholder';
        $cart->is_paid = false;
        $cart->user_id = Auth::id();
        $cart->save();
        $cart->unique_id = substr(date('m'), 0, 1).date('d').'-'.str_pad($cart->id, 5, '0', STR_PAD_LEFT);
        $cart->save();
      }

        // check if this product already exists as part of the order
        $item = OrderItem::whereProductId($request->item)->whereOrderId($cart->id)->get();

        if(count($item)) {
          $item = $item[0];
          $item = OrderItem::findOrFail($item->id);
          $item->qty = $request->qty;
          $item->save();
          return response()->json(['status'=> 200, 'message'=> 'You have successfully updated your cart']);
        } else {
          $item = new OrderItem;
          $item->order_id = $cart->id;
          $item->product_id = $request->item;
          $item->qty = $request->qty;
          $item->save();
          return response()->json(['status'=> 200, 'message'=> 'You have successfully updated your cart']);
        }
          
     

    }

    public function clear()
    {
      $cart = Auth::user()->orders->where('is_paid', 0)->first();
      if (!$cart) {
        return response()->json(['status'=> 200, 'message'=> 'You have no items in your cart']);
      }
      $items = $cart->items;
      foreach ($items as $item) {
        $item->delete();
      }
      $cart->delete();
      return response()->json(['status'=> 200, 'message'=> 'You have successfully cleared your cart']);
    }
}
