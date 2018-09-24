@extends('layouts.master')

@section('content')
	
      <!-- Page Title-->
      <div class="page-title">
        <div class="container">
          <div class="column">
            <h1>PRODUCT CATALOG</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="index.html">Home</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>Products</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-1">
        <div class="row">
          <!-- Products-->
          <div class="col-xl-9 col-lg-8 order-lg-2">
            <!-- Shop Toolbar-->
            <div class="shop-toolbar padding-bottom-1x mb-2">
              <div class="column">
                <div class="shop-sorting">
                  {{-- <label for="sorting">Sort by:</label>
                  <select class="form-control" id="sorting">
                    <option>Popularity</option>
                    <option>Low - High Price</option>
                    <option>High - Low Price</option>
                    <option>Avarage Rating</option>
                    <option>A - Z Order</option>
                    <option>Z - A Order</option>
                  </select> --}}
                  <span class="text-muted">Showing:&nbsp;</span><span>1 - 12 items</span>
                </div>
              </div>
            </div>
            <!-- Products Grid-->
            <div class="row mb-3">
             
              @foreach($products as $product)
              <div class="col-12 col-sm-6 col-md-4 mb-3">
                <product-card>
                  <a class="product-thumb" href="shop-single.html">
                  <div class="dummy" style="margin-top: 100%;"></div>
                    <b-img-lazy blank-src="{{ asset('/img/puff.svg') }}" src="{{$product->getImagesUrl()[0]->url}}" alt="{{$product->name}}" />
                  </a>
                  <h3 class="product-title"><a href="shop-single.html">{{$product->name}}</a></h3>
                  <h4 class="product-price">
                    &#8358;{{$product->price}}
                  </h4>
                  
                </product-card>
              </div>
              @endforeach
            </div>

            <!-- Pagination-->
            <nav class="pagination">
              <div class="column">
                {{$products->links()}}
              </div>
            </nav>
          </div>
          <!-- Sidebar          -->
          <div class="col-xl-3 col-lg-4 order-lg-1">
            <button class="sidebar-toggle position-left" data-toggle="modal" data-target="#modalShopFilters"><i class="icon-layout"></i>New Filter</button>
            <aside class="sidebar sidebar-offcanvas">
              <!-- Widget Categories-->
              <section class="widget widget-categories">
                <h3 class="widget-title">Product Categories</h3>
                <ul>
                  @foreach($categories as $category)
                  <li class="has-children"><a href="#">{{ucfirst($category->name)}}</a><span>({{$category->products->count()}})</span>
                    
                  </li>
                  @endforeach
                </ul>
              </section>
              

              {{-- <button class="btn btn-outline-primary btn-sm" type="submit">Apply Filters</button> --}}
              <!-- Promo Banner-->
              <section class="promo-box" style="background-image: url(img/banners/02.jpg);">
                <!-- Choose between .overlay-dark (#000) or .overlay-light (#fff) with default opacity of 50%. You can overrride default color and opacity values via 'style' attribute.--><span class="overlay-dark" style="opacity: .45;"></span>
                <div class="promo-box-content text-center padding-top-3x padding-bottom-2x">
                  <h4 class="text-light text-thin text-shadow">New Collection of</h4>
                  <h3 class="text-bold text-light text-shadow">Sunglassess</h3><a class="btn btn-sm btn-primary" href="#">Shop Now</a>
                </div>
              </section>
            </aside>
          </div>
        </div>
      </div>

@endsection

@section('javascripts')



@endsection