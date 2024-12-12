<!doctype html>
<html class="no-js" lang="zxx">
   @include('includes.links')
       @yield("css")

<body>

   <!-- preloader -->
   <div id="preloader">
      <div class="preloader">
            <span></span>
            <span></span>
      </div>
   </div>
   <!-- preloader end  -->

   @include('includes.header')
   <!-- tp-offcanvus-area-start -->
      <div class="tp-offcanvas-area">
      <div class="tpoffcanvas">
         <div class="tpoffcanvas__close-btn">
            <button class="close-btn"><i class="fal fa-times"></i></button>
         </div>
         <div class="tpoffcanvas__logo pt-50">
            <a href="index.html">
               <img src="assets/img/logo/logo-white.png" alt="">
            </a>
         </div>
         <div class="tpoffcanvas__text">
            <p>Suspendisse interdum consectetur libero id. Fermentum leo vel orci porta non. Euismod viverra nibh cras pulvinar suspen.</p>
         </div>
         <div class="mobile-menu"></div>
         <div class="tpoffcanvas__info">
            <h3 class="offcanva-title">Get In Touch</h3>
            <div class="tp-info-wrapper mb-20 d-flex align-items-center">
               <div class="tpoffcanvas__info-icon">
                  <a href="#"><i class="fal fa-envelope"></i></a>
               </div>
               <div class="tpoffcanvas__info-address">
                  <span>Email</span>
                  <a href="maito:hello@yourmail.com"><span class="__cf_email__" data-cfemail="036b666f6f6c437a6c76716e626a6f2d606c6e">[email&#160;protected]</span></a>
               </div>
            </div>
            <div class="tp-info-wrapper mb-20 d-flex align-items-center">
               <div class="tpoffcanvas__info-icon">
                  <a href="#"><i class="fal fa-phone-alt"></i></a>
               </div>
               <div class="tpoffcanvas__info-address">
                  <span>Phone</span>
                  <a href="tel:(00)45611227890">(00) 456 1122 7890</a>
               </div>
            </div>
            <div class="tp-info-wrapper mb-20 d-flex align-items-center">
               <div class="tpoffcanvas__info-icon">
                  <a href="#"><i class="fas fa-map-marker-alt"></i></a>
               </div>
               <div class="tpoffcanvas__info-address">
                  <span>Location</span>
                  <a href="https://www.google.com/maps/@37.4801311,22.8928877,3z" target="_blank">Riverside 255, San Francisco, USA </a>
               </div>
            </div>
         </div>
         <div class="tpoffcanvas__social">
            <div class="social-icon">
               <a href="#"><i class="fab fa-twitter"></i></a>
               <a href="#"><i class="fab fa-instagram"></i></a>
               <a href="#"><i class="fab fa-facebook-square"></i></a>
               <a href="#"><i class="fab fa-dribbble"></i></a>
            </div>
         </div>
      </div>
      </div>

      <div class="body-overlay"></div>
   <!-- tp-offcanvus-area-end -->

   @yield('content')


   @include('includes.footer')
   @include('includes.scripts')



</body>

</html>
