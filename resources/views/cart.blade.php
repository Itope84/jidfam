@extends('layouts.master')

@section('content')

<loading :active.sync="isLoading" :is-full-page="true"></loading>

    <b-modal id="displayClearCartWarning" v-model="displayClearCartWarning" title="You are about to clear your cart">
      Are you sure you want to do this?

      <div class="modal-footer" slot="modal-footer">
        <button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal" @click="displayClearCartWarning = false">Close</button>
        <button class="btn btn-danger btn-sm" type="button" @click="clearCart">I insist</button>
      </div>
    </b-modal>

  <!-- Page Title-->
      <div class="page-title">
        <div class="container">
          <div class="column">
            <h1>Cart</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="index.html">Home</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>Cart</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-1">
        
        <!-- Shopping Cart-->
        <div class="table-responsive shopping-cart">
          <table class="table">
            <thead>
              <tr>
                <th>Product</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">Price per unit</th>
                <th class="text-center">Subtotal</th>
                <th class="text-clearCart"><a class="btn btn-sm btn-outline-danger" href="#" @click="displayClearCartWarning = true">Clear Cart</a></th>
              </tr>
            </thead>
            <tbody>
              @if(!$cart || count($cart->items) == 0)
              <tr>
                <td>
                  <p>Sorry, there's nothing to show here. Why don't you check out an item in the catalog</p>
                </td>
              </tr>
              @else
              @foreach($cart->items as $product)
              <tr>
                <td>
                  <div class="product-item">
                    <a class="product-thumb" href="shop-single.html">
                  <b-img-lazy blank-src="{{ asset('/img/puff.svg') }}" src="{{$product->product->getImagesUrl()[0]->url}}" alt="{{$product->product->name}}" />
                      
                    </a>
                    <div class="product-info">
                      <h4 class="product-title"><a href="shop-single.html">{{$product->product->name}}</a></h4><span><em>Size:</em> 10.5</span><span><em>Color:</em> Dark Blue</span>
                    </div>
                  </div>
                </td>
                <td class="text-center">
                  <div class="count-input">
                    <select class="form-control">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                </td>
                <td class="text-center text-lg text-medium">&#8358;{{$product->product->price}}</td>
                <td class="text-center text-lg text-medium">&#8358;{{$product->product->price * $product->qty}}</td>
                <td class="text-center"><a class="remove-from-cart" href="#" data-toggle="tooltip" title="Remove item"><span class="close-search btn btn-light py-0 px-2 m-0 rounded-0"><i class="icon-close"></i></span></a></td>
              </tr>
              @endforeach
              @endif
            </tbody>
          </table>
        </div>
        <div class="shopping-cart-footer">
          
          <div class="column text-lg">Subtotal: <span class="text-medium">$289.68</span></div>
        </div>
        <div class="shopping-cart-footer">
          <div class="column"><a class="btn btn-outline-secondary" href="{{ route('products') }}"><i class="icon-arrow_back"></i>&nbsp;Back to Shopping</a></div>
          <div class="column"><a class="btn btn-primary" href="#" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Your cart" data-toast-message="is updated successfully!">Update Cart</a><a class="btn btn-success" href="checkout-address.html">Checkout</a></div>
        </div>
        <!-- Related Products Carousel-->
        <h3 class="text-center padding-top-2x mt-2 padding-bottom-1x">You May Also Like</h3>
        <!-- Carousel-->
        <product-carousel>
            @foreach($recent_products as $product)
            <slide>
              <product-card>
                
                <a class="product-thumb" href="shop-single.html">
                  <div class="dummy" style="
                    margin-top: 100%;
                "></div>
                  <b-img-lazy blank-src="{{ asset('/img/puff.svg') }}" src="{{$product->getImagesUrl()[0]->url}}" alt="Product" />
                </a>
                <h3 class="product-title"><a href="shop-single.html">{{$product->name}}</a></h3>
                <h4 class="product-price">
                  &#8358;{{$product->price}}
                </h4>
                  
                <div class="product-buttons">
                    <a href="{{ route('product.single', ['product'=>$product->id]) }}" class="btn btn-outline-primary btn-sm">View/Add to Cart</a>
                </div>
              </product-card>
            </slide>
            @endforeach
          </product-carousel>
      </div>

@endsection