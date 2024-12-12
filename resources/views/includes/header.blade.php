<header>
    <!-- tp-header-area-start -->
    <div id="header-sticky" class="tp-header-area header-pl-pr header-transparent header-border-bottom">
       <div class="container-fluid">
          <div class="row g-0 align-items-center">
             <div class="col-xl-2 col-lg-2 col-md-4 col-6">
                <div class="tp-logo tp-logo-border">
                   <a href="index.html">
                      <img src="assets/img/logo/logo.png" alt="">
                   </a>
                </div>
             </div>
             <div class="col-xl-10 col-lg-10 col-md-8 col-6 d-flex justify-content-end">
                <div class="tp-main-menu d-none d-xl-block">
                   <nav id="mobile-menu">
                      <ul>
                         <li><a href="index.html">Home</a>
                            <ul class="submenu">
                               <li><a href="index.html">Home 01</a></li>
                               <li><a href="index-2.html">Home 02</a></li>
                               <li><a href="index-3.html">Home 03</a></li>
                            </ul>
                         </li>
                         <li><a href="{{ route('contact') }}">Contact</a>
                         </li>
                         <li><a href="{{ route('about') }}">About</a>

                         </li>

                         @guest
                         @if (Route::has('login'))
                             <li class="nav-item">
                                 <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                             </li>
                         @endif

                         @if (Route::has('register'))
                             <li class="nav-item">
                                 <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                             </li>
                         @endif
                     @else
                     <li><a href="#">Pages</a></li>
                     @endguest
                      </ul>
                   </nav>
                </div>
                <div class="tp-header-right">
                   <ul>
                      <li class=" d-none d-md-inline-block search-wrapper">
                         <a class="tp-search-box" href="javascript:void(0)"><i class="tp-search-toggle fal fa-search"></i><i class="search-close  far fa-times"></i></a>
                         <div class="tp-search-form p-relative">
                            <form action="#">
                               <input type="text" placeholder="Search ...">
                               <button type="submit"><i class="far fa-search"></i></button>
                            </form>
                         </div>
                      </li>
                      <li class="d-none d-md-inline-block">
                         <a href="cart.html"><i class="fal fa-shopping-basket"></i><span>03</span></a>
                            <div class="minicart">
                               <div>
                                  <div class="cart-img">
                                     <a href="product-details.html">
                                        <img src="assets/img/shop//shop-2.jpg" alt="">
                                     </a>
                                  </div>
                                  <div class="cart-content">
                                     <h3>
                                        <a href="product-details.html">Mobile - phone</a>
                                     </h3>
                                     <div class="cart-price">
                                        <span class="new">$ 22.9</span>
                                        <span>
                                              <del>$39.9</del>
                                        </span>
                                     </div>
                                  </div>
                                  <div class="del-icon">
                                     <a href="#">
                                        <i class="far fa-trash-alt"></i>
                                     </a>
                                  </div>
                               </div>
                               <div>
                                  <div class="cart-img">
                                     <a href="product-details.html">
                                        <img src="assets/img/shop/shop-1.jpg" alt="">
                                     </a>
                                  </div>
                                  <div class="cart-content">
                                     <h3>
                                        <a href="product-details.html">Gothelf learn UX</a>
                                     </h3>
                                     <div class="cart-price">
                                        <span class="new">$ 22.9</span>
                                        <span>
                                              <del>$39.9</del>
                                        </span>
                                     </div>
                                  </div>
                                  <div class="del-icon">
                                     <a href="#">
                                        <i class="far fa-trash-alt"></i>
                                     </a>
                                  </div>
                               </div>
                               <div>
                                     <div class="total-price">
                                        <span class="f-left">Total:</span>
                                        <span class="f-right">$100.0</span>
                                     </div>
                               </div>
                               <div>
                                     <div class="checkout-link">
                                        <a class="tp-btn-orange-radius w-100" href="cart.html">Shopping Cart</a>
                                        <a class="tp-btn-radius-2 w-100" href="checkout.html">Checkout</a>
                                     </div>
                               </div>
                            </div>
                      </li>
                      <li><a class="tp-menu-bar" href="javascript:void(0)"><i class="fas fa-bars"></i></a></li>
                   </ul>
                </div>
             </div>
          </div>
       </div>
    </div>
    <!-- tp-header-area-end -->
 </header>
