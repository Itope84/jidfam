<!DOCTYPE html>
<html lang="en">

  @include('partials.head')
  
  <body>
    <noscript>
      Please visit this site on a browser that has javascript enabled for optimum experience
    </noscript>

    <div id="app" :class="{'offcanvas-open': navIsOpen}">
      
      @include('partials.navbar')

      <!-- Off-Canvas Wrapper-->
      <div class="offcanvas-wrapper">
        <!-- Page Content-->
        
        @yield('content')
        
      </div>
      <!-- Back To Top Button-->
      <a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
      <!-- Backdrop-->
    <div class="site-backdrop" @click="showNav()"></div>

    </div>

     <script>
      window.addEventListener('DOMContentLoaded', function(){ 
        performance.navigation.type === 1 ? window.scrollTo(0, 0) : null;
      })
    </script>

    <script src="{{ asset('js/app.js') }}"></script>

  
  </body>

</html>