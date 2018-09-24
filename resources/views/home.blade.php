@extends('layouts.master')

@section('content')
        <!-- Main Slider-->
        {{-- with css bg --}}
        {{-- <section class="hero-slider" style="background-image: linear-gradient(to right, #4facfe 0%, #00f2fe 100%);"> --}}
        <section class="hero-slider" style="background-image: url({{ asset('img/bg-health.jpg') }});">
          <home-carousel>
              <slide>
                  <div class="container padding-top-3x">
                    <div class="row justify-content-center align-items-center">
                      <div class="col-lg-5 col-md-6 padding-bottom-2x text-md-left text-center">
                        <div class="from-bottom">
                          <div class="h2 text-body text-normal mb-2 pt-1">Puma Backpacks Collection</div>
                          <div class="h2 text-body text-normal mb-4 pb-1">starting at <span class="text-bold">$37.99</span></div>
                        </div><a class="btn btn-primary scale-up delay-1" href="shop-grid-ls.html">View Offers</a>
                      </div>
                      <div class="col-md-6"><img class="d-block mx-auto" src="{{ asset('img/doctor.png') }}" alt="Puma Backpack"></div>
                    </div>
                  </div>
              </slide>

              <slide>
                  <div class="container padding-top-3x">
                    <div class="row justify-content-center align-items-center">
                      <div class="col-lg-5 col-md-6 padding-bottom-2x text-md-left text-center">
                        <div class="from-bottom">
                          <div class="h2 text-body text-normal mb-2 pt-1">Puma Backpacks Collection</div>
                          <div class="h2 text-body text-normal mb-4 pb-1">starting at <span class="text-bold">$37.99</span></div>
                        </div><a class="btn btn-primary scale-up delay-1" href="shop-grid-ls.html">View Offers</a>
                      </div>
                      <div class="col-md-6"><img class="d-block mx-auto" src="{{ asset('img/doctor.png') }}" alt="Puma Backpack"></div>
                    </div>
                  </div>
              </slide>


              <slide>
                  <div class="container padding-top-3x">
                    <div class="row justify-content-center align-items-center">
                      <div class="col-lg-5 col-md-6 padding-bottom-2x text-md-left text-center">
                        <div class="from-bottom">
                          <div class="h2 text-body text-normal mb-2 pt-1">
                            <h2>Free Consultancy</h2>
                          </div>
                          <div class="h2 text-body text-normal mb-4 pb-1">Take care of your health, consult with an expert today!</div>
                        </div><a class="btn btn-primary scale-up delay-1" href="shop-grid-ls.html">Start Now</a>
                      </div>
                      <div class="col-md-6"><img class="d-block mx-auto" src="{{ asset('img/smiling-woman.png') }}" alt="Puma Backpack"></div>
                    </div>
                  </div>
              </slide>
          </home-carousel>
        </section>


        <!-- Latest Categories-->
        <section class="container padding-top-3x">
          <h3 class="text-center mb-30">New Categories</h3>
          <div class="row">

            {{-- 3 featured categories from controller --}}
            @foreach($categories as $category)
            <div class="col-md-4 col-sm-6">
              <div class="card mb-30">
                <a class="card-img-tiles" href="shop-grid-ls.html">
                  <div class="inner">
                    <div class="main-img"><b-img-lazy blank-src="{{asset('img/puff.svg')}}" src="{{$category->getDefaultImageUrl()}}" alt="Category"></div>
                    <div class="thumblist px-0">
                      @foreach($category['products'] as $product)
                        <div class="m-1">
                          <b-img-lazy blank-src="{{ asset('img/puff.svg') }}" src="{{$product->getImagesUrl()[0]->url}}" class="w-100" alt="Category">
                        </div>
                      @endforeach
                    </div>
                  </div>
                </a>
                <div class="card-body text-center">
                  <h4 class="card-title">{{ucfirst($category->name)}}</h4>
                  <p class="text-muted">Starting from $49.99</p><a class="btn btn-outline-primary btn-sm" href="shop-grid-ls.html">View Products</a>
                </div>
              </div>
            </div>
            @endforeach

          </div>
          <div class="text-center"><a class="btn btn-outline-secondary margin-top-none" href="shop-categories.html">All Product Categories</a></div>
        </section>

        <!-- Consultancy-->
        <section class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12">
              <div class="fw-section rounded padding-top-4x padding-bottom-4x" style="background-image: url({{ asset('img/health-consult-2.jpg') }});"><span class="overlay rounded" style="opacity: .35;"></span>
                <div class="text-center">
                  <h3 class="display-4 text-normal text-white text-shadow mb-1">Register Now for our</h3>
                  <h2 class="display-2 text-bold text-white text-shadow">FREE CONSULTANCY!</h2>
                  <h4 class="d-inline-block h2 text-normal text-white text-shadow border-default border-left-0 border-right-0 mb-4">Get medical advice from top pharmacists in the latitude.</h4><br><a class="btn btn-primary margin-bottom-none" href="contacts.html">Register Now</a>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- Featured Products Carousel-->
        <section class="container padding-top-3x padding-bottom-3x product-carousel">
          <h3 class="text-center mb-30">Featured Products</h3>
          <product-carousel>
            @foreach($products as $product)
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
                  
              </product-card>
            </slide>
            @endforeach
          </product-carousel>
          
        </section>
        <!-- Product Widgets-->
        <section class="container padding-bottom-2x">
          <div class="row">
            <div class="col-md-4 col-sm-6">
              <div class="widget widget-featured-products">
                <h3 class="widget-title">Top Sellers</h3>
                <!-- Entry-->
                <div class="entry">
                  <div class="entry-thumb"><a href="shop-single.html"><img src="img/shop/widget/01.jpg" alt="Product"></a></div>
                  <div class="entry-content">
                    <h4 class="entry-title"><a href="shop-single.html">Oakley Kickback</a></h4><span class="entry-meta">$155.00</span>
                  </div>
                </div>
                <!-- Entry-->
                <div class="entry">
                  <div class="entry-thumb"><a href="shop-single.html"><img src="img/shop/widget/03.jpg" alt="Product"></a></div>
                  <div class="entry-content">
                    <h4 class="entry-title"><a href="shop-single.html">Vented Straw Fedora</a></h4><span class="entry-meta">$49.50</span>
                  </div>
                </div>
                <!-- Entry-->
                <div class="entry">
                  <div class="entry-thumb"><a href="shop-single.html"><img src="img/shop/widget/04.jpg" alt="Product"></a></div>
                  <div class="entry-content">
                    <h4 class="entry-title"><a href="shop-single.html">Big Wordmark Tote</a></h4><span class="entry-meta">$29.99</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
              <div class="widget widget-featured-products">
                <h3 class="widget-title">New Arrivals</h3>
                <!-- Entry-->
                <div class="entry">
                  <div class="entry-thumb"><a href="shop-single.html"><img src="img/shop/widget/05.jpg" alt="Product"></a></div>
                  <div class="entry-content">
                    <h4 class="entry-title"><a href="shop-single.html">Union Park</a></h4><span class="entry-meta">$49.99</span>
                  </div>
                </div>
                <!-- Entry-->
                <div class="entry">
                  <div class="entry-thumb"><a href="shop-single.html"><img src="img/shop/widget/06.jpg" alt="Product"></a></div>
                  <div class="entry-content">
                    <h4 class="entry-title"><a href="shop-single.html">Cole Haan Crossbody</a></h4><span class="entry-meta">$200.00</span>
                  </div>
                </div>
                <!-- Entry-->
                <div class="entry">
                  <div class="entry-thumb"><a href="shop-single.html"><img src="img/shop/widget/07.jpg" alt="Product"></a></div>
                  <div class="entry-content">
                    <h4 class="entry-title"><a href="shop-single.html">Skagen Holst Watch</a></h4><span class="entry-meta">$145.00</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
              <div class="widget widget-featured-products">
                <h3 class="widget-title">Best Rated</h3>
                <!-- Entry-->
                <div class="entry">
                  <div class="entry-thumb"><a href="shop-single.html"><img src="img/shop/widget/08.jpg" alt="Product"></a></div>
                  <div class="entry-content">
                    <h4 class="entry-title"><a href="shop-single.html">Jordan's City Hoodie</a></h4><span class="entry-meta">$65.00</span>
                  </div>
                </div>
                <!-- Entry-->
                <div class="entry">
                  <div class="entry-thumb"><a href="shop-single.html"><img src="img/shop/widget/09.jpg" alt="Product"></a></div>
                  <div class="entry-content">
                    <h4 class="entry-title"><a href="shop-single.html">Palace Shell Track Jacket</a></h4><span class="entry-meta">$36.99</span>
                  </div>
                </div>
                <!-- Entry-->
                <div class="entry">
                  <div class="entry-thumb"><a href="shop-single.html"><img src="img/shop/widget/10.jpg" alt="Product"></a></div>
                  <div class="entry-content">
                    <h4 class="entry-title"><a href="shop-single.html">Off the Shoulder Top</a></h4><span class="entry-meta">$128.00</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Popular Brands-->
        <section class="bg-faded padding-top-3x padding-bottom-3x">
          <div class="container">
            <h3 class="text-center mb-30 pb-2">Popular Brands</h3>
            <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: false, &quot;loop&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 4000, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:2}, &quot;470&quot;:{&quot;items&quot;:3},&quot;630&quot;:{&quot;items&quot;:4},&quot;991&quot;:{&quot;items&quot;:5},&quot;1200&quot;:{&quot;items&quot;:6}} }"><img class="d-block w-110 opacity-75 m-auto" src="img/brands/01.png" alt="Adidas"><img class="d-block w-110 opacity-75 m-auto" src="img/brands/02.png" alt="Brooks"><img class="d-block w-110 opacity-75 m-auto" src="img/brands/03.png" alt="Valentino"><img class="d-block w-110 opacity-75 m-auto" src="img/brands/04.png" alt="Nike"><img class="d-block w-110 opacity-75 m-auto" src="img/brands/05.png" alt="Puma"><img class="d-block w-110 opacity-75 m-auto" src="img/brands/06.png" alt="New Balance"><img class="d-block w-110 opacity-75 m-auto" src="img/brands/07.png" alt="Dior"></div>
          </div>
        </section>
        <!-- Services-->
        <section class="container padding-top-3x padding-bottom-2x">
          <div class="row">
            <div class="col-md-3 col-sm-6 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded-circle mx-auto mb-3" src="img/services/01.png" alt="Shipping">
              <h6>Free Worldwide Shipping</h6>
              <p class="text-muted margin-bottom-none">Free shipping for all orders over $100</p>
            </div>
            <div class="col-md-3 col-sm-6 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded-circle mx-auto mb-3" src="img/services/02.png" alt="Money Back">
              <h6>Money Back Guarantee</h6>
              <p class="text-muted margin-bottom-none">We return money within 30 days</p>
            </div>
            <div class="col-md-3 col-sm-6 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded-circle mx-auto mb-3" src="img/services/03.png" alt="Support">
              <h6>24/7 Customer Support</h6>
              <p class="text-muted margin-bottom-none">Friendly 24/7 customer support</p>
            </div>
            <div class="col-md-3 col-sm-6 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded-circle mx-auto mb-3" src="img/services/04.png" alt="Payment">
              <h6>Secure Online Payment</h6>
              <p class="text-muted margin-bottom-none">We posess SSL / Secure Certificate</p>
            </div>
          </div>
        </section>
        
@endsection