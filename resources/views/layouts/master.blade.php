<!doctype html>
<html lang="en-US">
   @include('includes.links')
       @yield("css")
<body class="home page-template page-template-templates page-template-full-width page-template-templatesfull-width-php page page-id-118 wp-embed-responsive  theme--light theme-martex woocommerce-no-js no-js singular has-main-navigation has-sticky-navigation no-widgets no-sidebar is-light-theme essb-9.1 elementor-default elementor-kit-6 elementor-page elementor-page-118">
	
   <!-- PRELOADER SPINNER -->
<div id="loading" class="loading--theme">
   <div id="loading-center"><span class="loader"></span></div>
</div>

<a class="skip-link screen-reader-text" href="#content">Skip to content</a>

   @include('includes.header')
  
   <!-- tp-offcanvus-area-end -->

   @yield('content')


   @include('includes.footer')
   @include('includes.scripts')



</body>

</html>
