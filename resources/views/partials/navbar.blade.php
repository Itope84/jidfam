  <!-- Off-Canvas Mobile Menu-->
      <div class="offcanvas-container active" id="mobile-menu">
        @auth
          {{-- <a class="account-link" href="account-orders.html">
          
            <div class="user-ava"><img src="img/account/user-ava-md.jpg" alt="Daniel Adams">
            </div>
            <div class="user-info">
              <h6 class="user-name">Daniel Adams</h6><span class="text-sm text-white opacity-60">290 Reward points</span>
            </div>
          </a> --}}
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
              <li class="@isset($active) @if($active == 'home') active @endif @else active @endisset"><span><a href="{{ route('home') }}"><span>Home</span></a></span>
              </li>
              <li  class="@if(isset($active) && $active == 'products') active @endif"><span><a href="{{ route('products') }}"><span>Products</span></a><span class="sub-menu-toggle"></span></span>
                
              </li>

              <li class=""><span><a href="#"><span>Consultancy</span></a></span>
              </li>
              
              <li class=""><span><a href="#"><span>Account</span></a></span>
              </li>
              
            </ul>
          </nav>
      </div>
      <b-alert :show="dismissCountDown"
                :fade="true"
                 dismissible
                 :variant="alert.type"
                 @dismissed="dismissCountDown=0"
                 @dismiss-count-down="countDownChanged">
          <p>@{{alert.message}}</p>
          {{-- <b-progress variant="success"
                      :max="dismissSecs"
                      :value="dismissCountDown"
                      height="4px">
          </b-progress> --}}
      </b-alert>
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

        <form class="site-search" method="get" v-show="isSearchInputVisible">
          <input type="text" name="site_search" placeholder="Type to search...">
          <div class="search-tools px-2"><button class="clear-search btn btn-light p-0 m-0 rounded-0" type="reset">Clear</button>
            <span class="close-search btn btn-light py-0 px-2 m-0 rounded-0" @click="changeSearchBarVisibility">
              <i class="icon-close"></i>
            </span>
          </div>
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

            <li class="@isset($active) @if($active == 'home') active @endif @else active @endisset"><a href="{{ route('home') }}"><span>Home</span></a>
              
            </li>
            <li class="@if(isset($active) && $active == 'products') active @endif"><a href="{{ route('products') }}"><span>Products</span></a>
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
              <div class="search" @click="changeSearchBarVisibility"><i class="icon-search"></i></div>
               @auth
              <div class="account"><a href="account-orders.html"></a><i class="icon-person" style="margin-bottom: -.8rem; width: 1.5rem; height: 1.5rem;"></i>
                <ul class="toolbar-dropdown">
                  <li class="sub-menu-user">
                    <div class="user-ava">
                    </div>
                    <div class="user-info">
                      <h6 class="user-name">{{Auth::user()->name}}</h6>
                    </div>
                  </li>
                    <li><a href="account-profile.html">My Profile</a></li>
                    <li><a href="account-orders.html">Orders List</a></li>
                    <li><a href="account-wishlist.html">Wishlist</a></li>
                  <li class="sub-menu-separator"></li>
                  <li><a href="#"> <i class="icon-unlock"></i>Logout</a></li>
                </ul>
              </div>
              @else
              <div class="account"><a href="account-orders.html"></a><i class="icon-person" style="margin-bottom: -.8rem; width: 1.5rem; height: 1.5rem;"></i>
                <ul class="toolbar-dropdown">
                  
                  <li><a href="{{ route('login') }}"> <i class="icon-unlock"></i>Login</a></li>
                </ul>
              </div>
              @endauth 
              
              @auth
              <navbar-cart></navbar-cart>
              @endauth
            </div>
          </div>
        </div>
      </header>