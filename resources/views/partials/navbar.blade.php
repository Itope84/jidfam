  <!-- Off-Canvas Mobile Menu-->
      <div class="offcanvas-container active" id="mobile-menu">
        @auth
          <a class="account-link" href="account-orders.html">
          
            {{-- <div class="user-ava"><img src="img/account/user-ava-md.jpg" alt="Daniel Adams"> --}}
            </div>
            <div class="user-info">
              <h6 class="user-name">Daniel Adams</h6><span class="text-sm text-white opacity-60">290 Reward points</span>
            </div>
          </a>
        @endauth
        
          <nav class="offcanvas-menu">
            <ul class="menu">
              <li>
                <span>
                  <a href="index.html" class="site-logo w-100" style="
                      background-color: #fff;
                  "><img src="http://jidfam.local/img/jidfam-logo.png" alt="JIdfam Healthcare" style="
                      max-width: 120px;
                      margin-left: auto;
                      margin-right: auto;
                  "></a>
                </span>
              </li>
              <li class="active"><span><a href="#"><span>Home</span></a></span>
              </li>
              <li class=""><span><a href="{{ route('products') }}"><span>Shop</span></a><span class="sub-menu-toggle"></span></span>
                
              </li>

              <li class=""><span><a href="#"><span>Consultancy</span></a></span>
              </li>
              
              <li class="has-children"><span><a href="#"><span>Pages</span></a><span class="sub-menu-toggle"></span></span>
                <ul class="offcanvas-submenu">
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="mobile-app.html">Unishop Mobile App</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="contacts.html">Contacts</a></li>
                    <li><a href="faq.html">Help / FAQ</a></li>
                    <li><a href="order-tracking.html">Order Tracking</a></li>
                    <li><a href="search-results.html">Search Results</a></li>
                    <li><a href="404.html">404</a></li>
                    <li><a href="coming-soon.html">Coming Soon</a></li>
                  <li><a class="text-danger" href="docs/dev-setup.html">Documentation</a></li>
                </ul>
              </li>
              <li class="has-children"><span><a href="components/accordion.html"><span>Components</span></a><span class="sub-menu-toggle"></span></span>
                <ul class="offcanvas-submenu">
                    <li><a href="components/accordion.html">Accordion</a></li>
                    <li><a href="components/alerts.html">Alerts</a></li>
                    <li><a href="components/buttons.html">Buttons</a></li>
                    <li><a href="components/cards.html">Cards</a></li>
                    <li><a href="components/carousel.html">Carousel</a></li>
                    <li><a href="components/countdown.html">Countdown</a></li>
                    <li><a href="components/forms.html">Forms</a></li>
                    <li><a href="components/gallery.html">Gallery</a></li>
                    <li><a href="components/google-maps.html">Google Maps</a></li>
                    <li><a href="components/images.html">Images &amp; Figures</a></li>
                    <li><a href="components/list-group.html">List Group</a></li>
                    <li><a href="components/market-social-buttons.html">Market &amp; Social Buttons</a></li>
                    <li><a href="components/media.html">Media Object</a></li>
                    <li><a href="components/modal.html">Modal</a></li>
                    <li><a href="components/pagination.html">Pagination</a></li>
                    <li><a href="components/pills.html">Pills</a></li>
                    <li><a href="components/progress-bars.html">Progress Bars</a></li>
                    <li><a href="components/shop-items.html">Shop Items</a></li>
                    <li><a href="components/steps.html">Steps</a></li>
                    <li><a href="components/tables.html">Tables</a></li>
                    <li><a href="components/tabs.html">Tabs</a></li>
                    <li><a href="components/team.html">Team</a></li>
                    <li><a href="components/toasts.html">Toast Notifications</a></li>
                    <li><a href="components/tooltips-popovers.html">Tooltips &amp; Popovers</a></li>
                    <li><a href="components/typography.html">Typography</a></li>
                    <li><a href="components/video-player.html">Video Player</a></li>
                    <li><a href="components/widgets.html">Widgets</a></li>
                </ul>
              </li>
            </ul>
          </nav>
      </div>
      <!-- Topbar-->
      <div class="topbar">
        <div class="topbar-column">
          <a href="mailto:mail@jidfam.com"><i class="icon-envelope-o"></i>&nbsp; mail@jidfam.com</a>
          <a href="tel:00331697720"><i class="icon-phone"></i>&nbsp; 00 33 169 7720</a>
          
        </div>

        
      </div>
      <!-- Navbar-->
      <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
      <header class="navbar navbar-sticky" :class="{'navbar-stuck': navbarStuck}">
        <!-- Search-->
        <form class="site-search" method="get">
          <input type="text" name="site_search" placeholder="Type to search...">
          <div class="search-tools"><span class="clear-search">Clear</span><span class="close-search"><i class="icon-cross"></i></span></div>
        </form>
        <div class="site-branding">
          <div class="inner">
            <!-- Off-Canvas Toggle (#mobile-menu)-->
            {{-- <b-btn v-b-toggle="'offcanvas'" class="offcanvas-toggle menu-toggle"></b-btn> --}}
            <a class="menu-toggler d-table-cell d-xl-none" href="#" @click.prevent="showNav()">
              <span class=" icon-menu"></span>
            </a>
            <!-- Site Logo-->
            <a class="site-logo" href="index.html"><img src="{{ asset('img/jidfam-logo.png') }}" alt="Jidfam Healthcare"></a>
          </div>
        </div>
        <!-- Main Navigation-->
        <nav class="site-menu">
          <ul>

            <li class="@isset($active) @if($active == 'home') active @endif @else active @endisset"><a href="index.html"><span>Home</span></a>
              
            </li>
            <li><a href="{{ route('products') }}" class="@if(isset($active) && $active == 'products') active @endif"><span>Products</span></a>
            </li>
            
            <li><a href="blog-rs.html"><span>Consultancy</span></a>
              
            </li>

            <li><a href="account-orders.html"><span>Account</span></a>
              
            </li>

          </ul>
        </nav>
        <!-- Toolbar-->
        <div class="toolbar">
          <div class="inner">
            <div class="tools">
              <div class="search"><i class="icon-search"></i></div>
              <div class="account"><a href="account-orders.html"></a><i class="icon-person" style="margin-bottom: -.8rem; width: 1.5rem; height: 1.5rem;"></i>
                <ul class="toolbar-dropdown">
                  <li class="sub-menu-user">
                    <div class="user-ava"><img src="img/account/user-ava-sm.jpg" alt="Daniel Adams">
                    </div>
                    <div class="user-info">
                      <h6 class="user-name">Daniel Adams</h6><span class="text-xs text-muted">290 Reward points</span>
                    </div>
                  </li>
                    <li><a href="account-profile.html">My Profile</a></li>
                    <li><a href="account-orders.html">Orders List</a></li>
                    <li><a href="account-wishlist.html">Wishlist</a></li>
                  <li class="sub-menu-separator"></li>
                  <li><a href="#"> <i class="icon-unlock"></i>Logout</a></li>
                </ul>
              </div>
              <div class="cart cart-menu"><a class="" href="cart.html"></a><i class="icon-shopping-basket"></i><span class="count">3</span><span class="subtotal">$289.68</span>
                <div class="toolbar-dropdown">
                  <div class="dropdown-product-item"><span class="dropdown-product-remove"><i class="icon-cross"></i></span><a class="dropdown-product-thumb" href="shop-single.html"><img src="img/cart-dropdown/01.jpg" alt="Product"></a>
                    <div class="dropdown-product-info"><a class="dropdown-product-title" href="shop-single.html">Unionbay Park</a><span class="dropdown-product-details">1 x $43.90</span></div>
                  </div>
                  <div class="dropdown-product-item"><span class="dropdown-product-remove"><i class="icon-cross"></i></span><a class="dropdown-product-thumb" href="shop-single.html"><img src="img/cart-dropdown/02.jpg" alt="Product"></a>
                    <div class="dropdown-product-info"><a class="dropdown-product-title" href="shop-single.html">Daily Fabric Cap</a><span class="dropdown-product-details">2 x $24.89</span></div>
                  </div>
                  <div class="dropdown-product-item"><span class="dropdown-product-remove"><i class="icon-cross"></i></span><a class="dropdown-product-thumb" href="shop-single.html"><img src="img/cart-dropdown/03.jpg" alt="Product"></a>
                    <div class="dropdown-product-info"><a class="dropdown-product-title" href="shop-single.html">Haan Crossbody</a><span class="dropdown-product-details">1 x $200.00</span></div>
                  </div>
                  <div class="toolbar-dropdown-group">
                    <div class="column"><span class="text-lg">Total:</span></div>
                    <div class="column text-right"><span class="text-lg text-medium">$289.68&nbsp;</span></div>
                  </div>
                  <div class="toolbar-dropdown-group">
                    <div class="column"><a class="btn btn-sm btn-block btn-secondary" href="cart.html">View Cart</a></div>
                    <div class="column"><a class="btn btn-sm btn-block btn-success" href="checkout-address.html">Checkout</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>