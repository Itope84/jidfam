@extends('layouts.master')

@section('content')

<loading :active.sync="isLoading" 
                :is-full-page="true"></loading>

      <!-- Page Title-->
      <div class="page-title">
        <div class="container">
          <div class="column">
            <h1>{{$product->name}}</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="{{ route('home') }}">Home</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li><a href="{{ route('products') }}">Shop</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>{{$product->name}}</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-1">
        <div class="row">
          <!-- Poduct Gallery-->
          <div class="col-md-6">
            <div class="product-gallery">
              <carousel :per-page="1" :pagination-enabled="false">
                @foreach($product->getImagesUrl() as $image)
                <slide>
                  {{-- <img src="{{$image->url}}" alt="{{$product->name}}"> --}}
                  <b-img-lazy blank-src="{{asset('img/puff.svg')}}" src="{{$image->url}}" alt="{{$product->name}}">
                </slide>
                @endforeach
                
              </carousel>
              
              <ul class="product-thumbnails">
                @foreach($product->getImagesUrl() as $image)
                  <li><a href="#"><b-img-lazy blank-src="{{asset('img/puff.svg')}}" src="{{$image->url}}" alt="{{$product->name}}"></a></li>
                @endforeach
                
              </ul>
            </div>
          </div>
          <!-- Product Info-->
          <div class="col-md-6">
            <div class="padding-top-2x mt-2 hidden-md-up"></div>

            <h2 class="padding-top-1x text-normal">{{$product->name}}</h2>
            <span class="h2 d-block">&#8358;{{$product->price}}</span>

            <h5 class="description">Description:</h5>
            <p class="mb-2 p-3">{{$product->description}}</p>

            <div class="pt-1 mb-2"><span class="text-medium">Category:</span> {{$product->category->name}}</div>
            <div class="padding-bottom-1x mb-2"><span class="text-medium">Tags:&nbsp;</span>
              @foreach($product->tags as $tag)
              <a class="#" href="#">{{$tag->tag}}</a>
              @endforeach
            </div>
            <hr class="mb-3">

            @auth

            <div class="row margin-top-1x">
              <div class="col-sm-12 col-md-8 col-lg-6">
                <b class="mb-2">Select Quantity</b>

                <div class="d-flex my-2">

                    <input type="number" value="{{ Auth::user()->orders->where('is_paid', 0)->first()->items->where('product_id',$product->id)->take(1)[0] ? Auth::user()->orders->where('is_paid', 0)->first()->items->where('product_id',$product->id)->take(1)[0]->qty : 0 }}" v-on:change="validateQty({{$product->units}})" class="form-control col rounded-0 rounded-left" name="" v-model="productqty">
                    <span class="btn btn-secondary col m-0 rounded-0 rounded-right" style="">{{ucfirst(str_plural($product->unit))}}</span>

                </div>
                <p class="text-danger" v-text="qtyErr"></p>
              </div>
            </div>


            <hr class="mb-3">

            @endauth
            
            <div class="d-flex flex-wrap justify-content-between">
              

              <div class="sp-buttons mt-2 mb-2">

                @auth
                
                <button class="btn btn-primary" @click="addToCart({{$product->id}})" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!"><i class="icon-bag"></i> Add to Cart</button>

                @else

                <p class="text-danger">You need to be logged in to add this item to your cart. Please login below</p>

                <a href="{{ route('login') }}"><button class="btn btn-primary">Login</button></a>

                @endauth

              </div>
            </div>
          </div>
        </div>
        
        <!-- Related Products Carousel-->
        <h3 class="text-center padding-top-2x mt-2 padding-bottom-1x">Similar Products</h3>
        <!-- Carousel-->

        <product-carousel>
            @foreach($similar_products as $product)
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