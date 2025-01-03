@extends('layouts.master')
@section('css')
   <style>
      .invalid-feedback{
         display:block !important;
      }
   </style>
@endsection
@section('title')
  Login
@endsection
@section('content')
<div id="page" class="page" style="margin-top:10%">
   <main id="content" class="main container-full py-0">
      <div class="overflow-hidden page type-page status-publish hentry entry">
         <div data-elementor-type="wp-page" data-elementor-id="5124" class="elementor elementor-5124">
            <section class="elementor-section elementor-top-section elementor-element elementor-element-2e50321 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="2e50321" data-element_type="section" id="login">
               <div class="elementor-container elementor-column-gap-default">
                  <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-dc148ee" data-id="dc148ee" data-element_type="column">
                     <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-d66bb63 elementor-widget elementor-widget-martex_login_form" data-id="d66bb63" data-element_type="widget" data-widget_type="martex_login_form.default">
                           <div class="elementor-widget-container">
                              <div class="row justify-content-center" >
                                 <!-- REGISTER PAGE WRAPPER -->
                                 <div class="col-lg-11">
                                    <div class="register-page-wrapper r-16 bg--fixed">
                                       <div class="row">
                                          <!-- LOGIN PAGE TEXT -->
                                          <div class="col-md-6">
                                             <div class="register-page-txt color--white">
                                                <!-- Logo -->
                                                <!-- <img decoding="async" class="img-fluid" src="images/logo-white.png" alt="logo-image">		 -->
                                                <a href="https://jthemes.net/themes/wp/martex">
                                                <img decoding="async" class="img-fluid" src="../wp-content/uploads/2023/08/logo-white.png" alt="Logo">
                                                </a>
                                                <!-- Title -->
                                                <h2 class="s-42 w-700">Welcome<br>back to Martex</h2>
                                                <!-- Text -->
                                                <p class="p-md mt-25">Integer congue sagittis and velna augue egestas magna suscipit purus aliquam</p>
                                                <!-- Copyright -->
                                                <div class="register-page-copyright">
                                                   <p class="p-sm">&copy; 2023 Martex &#8211; All Rights Reserved</p>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- END LOGIN PAGE TEXT -->
                                          <!-- LOGIN FORM -->
                                          <div class="col-md-6">
                                             <div class="register-page-form">
                                                <form class="rwmb-form mbup-form"  action="{{ route('login') }}" method="post" enctype="multipart/form-data" id="login-form">
                                                   @csrf  
                                                   <div class="ctrlbp-field ctrlbp-row ctrlbp-text-wrapper  required ctrlbp-field-has-label">
                                                      <div class="ctrlbp-label ctrlbp-col-12 ctrlbp-col-md-3">
                                                         <label for="user_login">Username or Email Address<span class="ctrlbp-required">*</span></label>
                                                      </div>
                                                      <div class="ctrlbp-input ctrlbp-col-12 ctrlbp-col-md-12">
                                                         <input  type="email" placeholder="Enter your mail" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="user_login" class="ctrlbp-text form-control">
                                                         @error('email')
                                                         <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $message }}</strong>
                                                         </span>
                                                         @enderror
                                                      </div>
                                                   </div>
                                                   <div class="ctrlbp-field ctrlbp-row ctrlbp-password-wrapper  required ctrlbp-field-has-label">
                                                      <div class="ctrlbp-label ctrlbp-col-12 ctrlbp-col-md-3">
                                                         <label for="user_pass">Password<span class="ctrlbp-required">*</span></label>
                                                      </div>
                                                      <div class="ctrlbp-input ctrlbp-col-12 ctrlbp-col-md-12"><input  type="password" required="1" id="user_pass" class="ctrlbp-password form-control  @error('password') is-invalid @enderror" name="password">
                                                         @error('password')
                                                         <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $message }}</strong>
                                                         </span>
                                                         @enderror
                                                      </div>
                                                   </div>
                                                   <div class="ctrlbp-field ctrlbp-row ctrlbp-checkbox-wrapper  ctrlbp-field-no-label">
                                                      <div class="ctrlbp-input ctrlbp-col-12 ctrlbp-col-md-12"><label id='remember_description' class='description'>
                                                         <input  value="1" type="checkbox" id="remember" class="ctrlbp-checkbox" name="remember" > Remember Me</label>
                                                      </div>
                                                   </div>
                                                   <div class="ctrlbp-field ctrlbp-row ctrlbp-button-wrapper  ctrlbp-field-no-label">
                                                      <div class="ctrlbp-input ctrlbp-col-12 ctrlbp-col-md-12"><button  type="submit" id="submit" class="ctrlbp-button btn btn--theme hover--theme submit button hide-if-no-js" name="rwmb_profile_submit_login" value="1">Log In</button></div>
                                                   </div>
                                                   <div class="ctrlbp-field ctrlbp-row ctrlbp-custom_html-wrapper  ctrlbp-field-no-label">
                                                      <div class="ctrlbp-input ctrlbp-col-12 ctrlbp-col-md-12">
                                                         <p class="create-account text-center mt-3 mb-0"><a href="indexd94d.html?rwmb-lost-password=true">Lost Password?</a></p>
                                                      </div>
                                                   </div>
                                             </div>
                                             </form>
                                             <p class="create-account text-center">Don't have an account? <a class="color--theme" href="../register/index.html">SignUp</a></p>
                                          </div>
                                       </div>
                                       <!-- END LOGIN FORM -->
                                    </div>
                                    <!-- End row -->
                                 </div>
                                 <!-- End register-page-wrapper -->
                              </div>
                              <!-- END REGISTER PAGE WRAPPER -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
         </div>
         </section>
      </div>
</div>
</main><!-- .container -->
</div>
@endsection
