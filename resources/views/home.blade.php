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
                    <div class="main-img"><b-img-lazy blank-src="{{asset('img/puff.svg')}}" src="{{$category->default_image}}" alt="Category"></div>
                    <div class="thumblist px-0">
                      @foreach($category['products'] as $product)
                        <div class="m-1">
                          <b-img-lazy blank-src="{{ asset('img/puff.svg') }}" src="{{$product->image}}" class="w-100" alt="Category">
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
                  <b-img-lazy blank-src="{{ asset('/img/puff.svg') }}" src="{{$product->image}}" alt="Product" />
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
        <!-- Site Footer-->
        <footer class="site-footer">
          <div class="container">
            <div class="row">
              <div class="col-lg-3 col-md-6">
                <!-- Contact Info-->
                <section class="widget widget-light-skin">
                  <h3 class="widget-title">Get In Touch With Us</h3>
                  <p class="text-white">Phone: 00 33 169 7720</p>
                  <ul class="list-unstyled text-sm text-white">
                    <li><span class="opacity-50">Monday-Friday:</span>9.00 am - 8.00 pm</li>
                    <li><span class="opacity-50">Saturday:</span>10.00 am - 6.00 pm</li>
                  </ul>
                  <p><a class="navi-link-light" href="#">support@unishop.com</a></p><a class="social-button shape-circle sb-facebook sb-light-skin" href="#"><i class="socicon-facebook"></i></a><a class="social-button shape-circle sb-twitter sb-light-skin" href="#"><i class="socicon-twitter"></i></a><a class="social-button shape-circle sb-instagram sb-light-skin" href="#"><i class="socicon-instagram"></i></a><a class="social-button shape-circle sb-google-plus sb-light-skin" href="#"><i class="socicon-googleplus"></i></a>
                </section>
              </div>
              <div class="col-lg-3 col-md-6">
                <!-- Mobile App Buttons-->
                <section class="widget widget-light-skin">
                  <h3 class="widget-title">Our Mobile App</h3><a class="market-button apple-button mb-light-skin" href="#"><span class="mb-subtitle">Download on the</span><span class="mb-title">App Store</span></a><a class="market-button google-button mb-light-skin" href="#"><span class="mb-subtitle">Download on the</span><span class="mb-title">Google Play</span></a><a class="market-button windows-button mb-light-skin" href="#"><span class="mb-subtitle">Download on the</span><span class="mb-title">Windows Store</span></a>
                </section>
              </div>
              <div class="col-lg-3 col-md-6">
                <!-- About Us-->
                <section class="widget widget-links widget-light-skin">
                  <h3 class="widget-title">About Us</h3>
                  <ul>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">About Unishop</a></li>
                    <li><a href="#">Our Story</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Our Blog</a></li>
                  </ul>
                </section>
              </div>
              <div class="col-lg-3 col-md-6">
                <!-- Account / Shipping Info-->
                <section class="widget widget-links widget-light-skin">
                  <h3 class="widget-title">Account &amp; Shipping Info</h3>
                  <ul>
                    <li><a href="#">Your Account</a></li>
                    <li><a href="#">Shipping Rates & Policies</a></li>
                    <li><a href="#">Refunds & Replacements</a></li>
                    <li><a href="#">Taxes</a></li>
                    <li><a href="#">Delivery Info</a></li>
                    <li><a href="#">Affiliate Program</a></li>
                  </ul>
                </section>
              </div>
            </div>
            <hr class="hr-light mt-2 margin-bottom-2x">
            <div class="row">
              <div class="col-md-7 padding-bottom-1x">
                <!-- Payment Methods-->
                <div class="margin-bottom-1x" style="max-width: 615px;"><img src="img/payment_methods.png" alt="Payment Methods">
                </div>
              </div>
              <div class="col-md-5 padding-bottom-1x">
                <div class="margin-top-1x hidden-md-up"></div>
                <!--Subscription-->
                <form class="subscribe-form" action="http://rokaux.us12.list-manage.com/subscribe/post?u=c7103e2c981361a6639545bd5&amp;amp;id=1194bb7544" method="post" target="_blank" novalidate>
                  <div class="clearfix">
                    <div class="input-group input-light">
                      <input class="form-control" type="email" name="EMAIL" placeholder="Your e-mail"><span class="input-group-addon"><i class="icon-mail"></i></span>
                    </div>
                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;" aria-hidden="true">
                      <input type="text" name="b_c7103e2c981361a6639545bd5_1194bb7544" tabindex="-1">
                    </div>
                    <button class="btn btn-primary" type="submit"><i class="icon-check"></i></button>
                  </div><span class="form-text text-sm text-white opacity-50">Subscribe to our Newsletter to receive early discount offers, latest news, sales and promo information.</span>
                </form>
              </div>
            </div>
            <!-- Copyright-->
            <p class="footer-copyright">© All rights reserved. Made with &nbsp;<i class="icon-heart text-danger"></i><a href="http://rokaux.com/" target="_blank"> &nbsp;by rokaux</a></p>
          </div>
        </footer>
@endsection